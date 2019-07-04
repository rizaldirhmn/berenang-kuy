<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelKategori extends Model
{
    //
    protected $table = 'kategori_artikel';
    protected $fillable = [
        'name'
    ];

    public function getKategori()
    {
        return $this->hasMany('App\Models\Artikel','kategori','id');
    }
}
