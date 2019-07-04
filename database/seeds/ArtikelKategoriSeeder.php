<?php

use Illuminate\Database\Seeder;

class ArtikelKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kategori_artikel')->insert([
            [
                'name' => 'Kebudayaan'
            ],
            [
                'name' => 'Pariwisata'
            ],
            [
                'name' => 'Pertanian'
            ],
        ]);
    }
}
