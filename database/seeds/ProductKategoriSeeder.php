<?php

use Illuminate\Database\Seeder;

class ProductKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kategori_produk')->insert([
            [
                'name' => 'Kartu'
            ],
            [
                'name' => 'Obat Herbal'
            ],
        ]);
    }
}
