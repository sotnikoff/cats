<?php

use Illuminate\Database\Seeder;
use App\Image;
use Illuminate\Support\Facades\Storage;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $files = Storage::files('cats');

        foreach ($files as $file)
        {
            Image::create(['url'=>$file]);
        }


    }
}
