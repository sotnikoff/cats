<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Helpers\Utility;

class ListController extends Controller
{
    use Utility;

    /**
     * Данный метод возвращает ссылки на изображения в формате JSON
     * Количество изображений определяется исходя из настроек окружения .env
     *
     * @return array
     */

    public function random()
    {
        $images = Image::inRandomOrder()->take(env('DEFAULT_LIST_SIZE'))->select(['id','url'])->get();

        $resImages = [];

        foreach ($images as $image)
        {

            $url = env('APP_URL')."/api/v1/img/".$image->id;

            $res = [
                'id'    =>  $image->id,
                'url'   =>  $url,
                'html'   =>  '<img src="'.$url.'" width="400" height="400" alt="Awesome cat #'.$image->id.'" />'
            ];

            $resImages[] = $res;
        }

        return [
            'status'    =>  'ok',
            'data'      =>  [
                'amount'    =>  env('DEFAULT_LIST_SIZE'),
                'width'     =>  400,
                'height'    =>  400,
                'images'    =>  $resImages
            ]
        ];
        
    }

    /**
     * Данный метод возвращает ссылки на изображения в формате JSON
     * Пользователь может указать желаемый размер изображений
     * Количество изображение определяется исходя из настроек окружения .env
     *
     * @param Request $request
     * @return array
     */

    public function randomWithSize(Request $request)
    {

        $dimensions = $this->parseDimensions($request->size);

        $images = Image::inRandomOrder()->take(env('DEFAULT_LIST_SIZE'))->select(['id','url'])->get();

        $resImages = [];

        foreach ($images as $image)
        {

            $url = env('APP_URL')."/api/v1/img/".$image->id."/w".
                $dimensions['width']."h".$dimensions['height'];

            $res = [
                'id'    =>  $image->id,
                'url'   =>  $url,
                'html'   =>  '<img src="'.$url.'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" alt="Awesome cat #'.$image->id.'" />'
            ];

            $resImages[] = $res;
        }

        return [
            'status'    =>  'ok',
            'data'      =>  [
                'amount'    =>  env('DEFAULT_LIST_SIZE'),
                'width'     =>  $dimensions['width'],
                'height'    =>  $dimensions['height'],
                'images'    =>  $resImages
            ]
        ];


    }


    /**
     * Данный метод возвращает ссылки на изображения в формате JSON
     * Пользователь может указать желаемое количество изображений
     * Количество изображений не может превышать указанных в настройках окружения .env значений
     * Размер изображений определяется по умолчанию
     *
     * @param Request $request
     * @return array
     */

    public function amount(Request $request)
    {
        $amount = (int) $request->amount;

        if($amount > env('MAX_LIST_SIZE'))
        {
            $amount = env('MAX_LIST_SIZE');
        }

        if($amount < 1)
        {
            $amount = 1;
        }

        $images = Image::inRandomOrder()->take($amount)->select(['id','url'])->get();

        $resImages = [];

        foreach ($images as $image)
        {

            $url = env('APP_URL')."/api/v1/img/".$image->id;

            $res = [
                'id'    =>  $image->id,
                'url'   =>  $url,
                'html'   =>  '<img src="'.$url.'" width="400" height="400" alt="Awesome cat #'.$image->id.'" />'
            ];

            $resImages[] = $res;
        }

        return [
            'status'    =>  'ok',
            'data'      =>  [
                'amount'    =>  $amount,
                'width'     =>  400,
                'height'    =>  400,
                'images'    =>  $resImages
            ]
        ];

    }

    /**
     * Данный метод возвращает ссылки на изображения в формате JSON
     * Пользователь может указать желаемое количество изображений
     * Пользователь может указать желаемый размер изображений
     *
     * @param Request $request
     * @return array
     */

    public function amountWithSize(Request $request)
    {
        $amount = (int) $request->amount;

        if($amount > env('MAX_LIST_SIZE'))
        {
            $amount = env('MAX_LIST_SIZE');
        }

        if($amount < 1)
        {
            $amount = 1;
        }

        $dimensions = $this->parseDimensions($request->size);

        $images = Image::inRandomOrder()->take($amount)->select(['id','url'])->get();

        $resImages = [];

        foreach ($images as $image)
        {

            $url = env('APP_URL')."/api/v1/img/".$image->id."/w".
                $dimensions['width']."h".$dimensions['height'];

            $res = [
                'id'    =>  $image->id,
                'url'   =>  $url,
                'html'   =>  '<img src="'.$url.'" width="'.$dimensions['width'].'" height="'.$dimensions['height'].'" alt="Awesome cat #'.$image->id.'" />'
            ];

            $resImages[] = $res;
        }

        return [
            'status'    =>  'ok',
            'data'      =>  [
                'amount'    =>  $amount,
                'width'     =>  $dimensions['width'],
                'height'    =>  $dimensions['height'],
                'images'    =>  $resImages
            ]
        ];
    }
}
