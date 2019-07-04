<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductKategori extends Model
{
    //
    protected $table = 'kategori_produk';
    protected $fillable = [
        'name'
    ];

    public function getKategori()
    {
        return $this->hasMany('App\Models\Product','id_kategori','id');
    }
}
