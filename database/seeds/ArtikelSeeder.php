<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('artikel')->insert([
                'judul' => $faker->name,
                'slug' => str_slug($faker->name, '-'),
                'deskripsi' => $faker->name,
                'caption' => 'Seorang pemuda menjadi pengusaha',
                'video' => 'https://www.youtube.com/watch?v=mw5VIEIvuMI',
                'path' => 'artikel-image_2018-12-16_21-01-04.jpg',
                'kategori' => $faker->randomElement(array('1','2','3')),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
