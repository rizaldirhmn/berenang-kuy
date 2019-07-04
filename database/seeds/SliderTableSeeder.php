<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('slider')->insert([
            [
                'path' => '/slider/banner1.jpg',
                'deskripsi' => 'Hallo, Selamat Datang',
            ],
            [
                'path' => '/slider/banner2.jpg',
                'deskripsi' => 'Hallo, Selamat Datang',
            ],
            [
                'path' => '/slider/banner3.jpg',
                'deskripsi' => 'Hallo, Selamat Datang',
            ]
        ]);
    }
}
