<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('gallery')->insert([
            'name' => 'Gallery',
            'deskripsi' => 'Example gallery',
            'path' => '/uploads/gallery/5.jpg',
        ]);
    }
}
