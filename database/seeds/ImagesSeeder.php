<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
          'cats/cat-00001.jpg',
          'cats/cat-00002.jpg',
          'cats/cat-00003.jpg',
          'cats/cat-00004.jpg',
          'cats/cat-00005.jpg',
          'cats/cat-00006.jpg',
          'cats/cat-00007.jpg',
          'cats/cat-00008.jpg',
        ];

        foreach ($images as $image)
        {
            Image::create(['url'=>$image]);
        }


    }
}
