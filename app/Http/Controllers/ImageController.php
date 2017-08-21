<?php

namespace App\Http\Controllers;

use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Eventviva\ImageResize;
use App\Helpers\Utility;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    use Utility;
    /**
     * Данный метод обрабатывает запросы на случайное изображение
     * Размеры изображения определяются по умолчанию
     *
     * @param Request $request
     * @return void
     */

    public function random(Request $request)
    {

        $cats = Image::all();
        $number = rand(1,sizeof($cats));
        $url = $cats[$number-1]->url;

        $this->renderImage($url,env('DEFAULT_WIDTH'),env('DEFAULT_HEIGHT'),'crop',$request->ip());

    }

    /**
     * Данный метод обрабатывает запросы на случайное изображение с указанными размерами
     *
     * @param Request $request
     * @return void
     */

    public function randomWithSize(Request $request)
    {
        $cats = Image::all();
        $number = rand(1,sizeof($cats));
        $url = $cats[$number-1]->url;

        $dimensions = $this->parseDimensions($request->size);

        $this->processSizing($dimensions,$url,$request->ip());

    }

    /**
     * Данный метод обрабатывает запросы на изображение по ИД
     * Размеры изображения определяются по умолчанию
     *
     * @param Request $request
     * @return void
     */

    public function byId(Request $request)
    {
        $imageUrl = Image::findOrFail($request->id)->url;

        $this->renderImage($imageUrl,env('DEFAULT_WIDTH'),env('DEFAULT_HEIGHT'),'crop',$request->ip());

    }

    /**
     * Данный метод обрабатывает запросы на изображение по ИД
     * Данный метод обрабатывает запросы на случайное изображение с указанными размерами
     *
     * @param Request $request
     */


    public function byIdWithSize(Request $request)
    {
        $imageUrl = Image::findOrFail($request->id)->url;

        $dimensions = $this->parseDimensions($request->size);

        $this->processSizing($dimensions,$imageUrl,$request->ip());

    }


    /**
     * Данный метод принимает на вход размеры и адрес картинки
     * Происходит проверка наличия ширины или высоты
     * В зависимости от наличия ширины и высоты выбирается необходимый метод для работы с изображением
     * Результатом вычислений является вызов метода renderImage
     *
     * @param array $dimensions
     * @param string $url
     * @param string $ip
     * @return void
     */

    protected function processSizing($dimensions,$url,$ip)
    {
        $width = null;
        $height = null;

        if($dimensions['width'] >= 25 and $dimensions['width'] <= 1000)
        {
            $width = $dimensions['width'];
        }

        if($dimensions['height'] >= 25 and $dimensions['height'] <= 1000)
        {
            $height = $dimensions['height'];
        }

        if($height === null and $width !== null)
        {
            $this->renderImage($url,$width,null,'resizeToWidth',$ip);
        }

        if($width === null and $height !== null)
        {
            $this->renderImage($url,null,$height,'resizeToHeight',$ip);
        }

        if($height !== null and $width !== null)
        {
            $this->renderImage($url,$width,$height,'crop',$ip);
        }

        if($height === null and $width === null)
        {
            $this->renderImage($url,env('DEFAULT_WIDTH'),env('DEFAULT_HEIGHT'),'crop',$ip);
        }
    }


    /**
     * Данный метод выполняет всю обработку изображения
     * В данном методе реализована вся работа с кэшем
     * Результатом выполнения метода явяется вывод изображения пользователю
     *
     * @param string $url
     * @param integer $width
     * @param integer $height
     * @param string $action
     * @param string $ip
     * @return void
     */

    protected function renderImage($url,$width = null,$height = null,$action = 'crop',$ip = "0.0.0.0")
    {
        $cache = Cache::get("$url+$width+$height");

        if($cache)
        {
            $image = ImageResize::createFromString($cache);

            Log::info("$ip required cat from cache - $url+$width+$height");

            $image->output();
        }
        else
        {
            $image = ImageResize::createFromString(Storage::get($url));

            if($action === 'crop')
            {
                $image->crop($width,$height);
            }
            else if ($action === 'resizeToHeight')
            {
                $image->resizeToHeight($height);
            }
            else if ($action === 'resizeToWidth')
            {
                $image->resizeToWidth($width);
            }


            $expiresAt = Carbon::now()->addWeeks(2);

            Cache::put("$url+$width+$height", $image->getImageAsString(), $expiresAt);

            if(!$width)
            {
                $width = "auto";
            }

            if(!$height)
            {
                $height = "auto";
            }

            Log::info("$ip put in cache new pic of cat. URL: $url Width: $width Height: $height");

            $image->output();
        }
    }


}
