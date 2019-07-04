<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    //
    protected $table = 'produk';
    protected $fillable = [
        'name','id_kategori','path', 'deskripsi','slug','caption','video',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getKategori()
    {
        return $this->hasOne('App\Models\ProductKategori', 'id', 'id_kategori');
    }
}
