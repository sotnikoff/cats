<?php

namespace App\Helpers;


trait Utility
{
    public function parseDimensions($size)
    {
        $width = null;
        $height = null;

        preg_match('/w(\d+)/',$size,$widthMatches);

        if(array_key_exists(1,$widthMatches)){
            $width = (int) $widthMatches[1];

            if($width > 1000)
            {
                $width = 1000;
            }
        }

        preg_match('/h(\d+)/',$size,$heightMatches);

        if(array_key_exists(1,$heightMatches)){
            $height = (int) $heightMatches[1];

            if($height > 1000)
            {
                $height = 1000;
            }

        }

        return ['width'=>$width,'height'=>$height];
    }

}