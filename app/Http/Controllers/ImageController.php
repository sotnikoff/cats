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
        $catUrl = $cats[$number-1]->url;

        $cache = Cache::get("$catUrl+400+400");

        if($cache)
        {
            $image = ImageResize::createFromString($cache);
            $image->output();
        }
        else
        {
            $image = ImageResize::createFromString(Storage::get($catUrl));
            $image->crop(400,400);

            $expiresAt = Carbon::now()->addWeeks(2);

            Cache::put("$catUrl+400+400", $image->getImageAsString(), $expiresAt);

            $image->output();
        }

    }

    public function randomWithSize()
    {

    }

}
