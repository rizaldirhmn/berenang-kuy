<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artikel extends Model
{
    use Sluggable;
    //
    protected $table = 'artikel';
    protected $fillable = [
        'judul','kategori','path', 'deskripsi','slug','caption',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function getKategori()
    {
        return $this->hasOne('App\Models\ArtikelKategori', 'id', 'kategori');
    }
}
