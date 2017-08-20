<?php

namespace App\Http\Controllers;

use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Eventviva\ImageResize;

class ImageController extends Controller
{

    /**
     * @return void
     */

    public function random()
    {

        $cats = Image::all();
        $number = rand(1,sizeof($cats));
        $url = $cats[$number-1]->url;

        $this->renderImage($url,400,400);

    }

    public function randomWithSize()
    {
        return 'Random with size';
    }

    public function byId(Request $request)
    {
        return 'By Id';
    }

    public function byIdWithSize(Request $request)
    {
        return 'By Id with size';
    }


    protected function renderImage($url,$width,$height)
    {
        $cache = Cache::get("$url+$width+$height");

        if($cache)
        {
            $image = ImageResize::createFromString($cache);
            $image->output();
        }
        else
        {
            $image = ImageResize::createFromString(Storage::get($url));
            $image->crop($width,$height);

            $expiresAt = Carbon::now()->addWeeks(2);

            Cache::put("$url+$width+$height", $image->getImageAsString(), $expiresAt);

            $image->output();
        }
    }


}
