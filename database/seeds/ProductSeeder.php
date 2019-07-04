<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
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
            DB::table('produk')->insert([
                'name' => $faker->name,
                'slug' => str_slug($faker->name, '-'),
                'deskripsi' => $faker->name,
                'caption' => 'Obat kuat seperti kuda',
                'video' => 'mw5VIEIvuMI',
                'path' => 'produk-image_2018-12-16_21-01-04.jpg',
                'id_kategori' => $faker->randomElement(array('1','2')),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
