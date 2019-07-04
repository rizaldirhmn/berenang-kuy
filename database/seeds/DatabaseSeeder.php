<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(ArtikelKategoriSeeder::class);
        $this->call(ArtikelSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(ProductKategoriSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
