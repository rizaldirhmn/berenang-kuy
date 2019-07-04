<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Artikel;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index()
    {
        $slider = Slider::all();
        $artikel = Artikel::paginate(10);

        return view('page.index', compact('slider','artikel'));
    }

    public function about()
    {
        return view('page.about');
    }

    public function product()
    {
        $product = Product::paginate(12);

        return view('page.product', compact('product'));
    }

    public function liputan()
    {
        $liputan = Artikel::where('kategori', '=', '4')->paginate(10);
        return view('page.liputan', compact('liputan'));
    }

    public function artikel()
    {
        $artikel = Artikel::where('kategori','!=','4')->paginate(10);
        return view('page.artikel',compact('artikel'));
    }

    public function department()
    {
        return view('page.department');
    }

    public function kantor_dpc()
    {
        return view('page.kantor');
    }

    public function gallery()
    {
        $gallery = Gallery::paginate(10);
        return view('page.gallery', compact('gallery'));
    }

    public function detailArtikel($slug)
    {
        // dd($slug);

        $getArtikel = Artikel::where('slug', $slug)->first();
        $relatedArtikel = Artikel::where('slug', '!=' , $slug)->paginate(5);

        return view('page.detail_artikel', compact('getArtikel','relatedArtikel'));
    }

    public function productDetail($slug)
    {
        $getProduct = Product::where('slug', $slug)->first();
        $relatedProduct = Product::where('slug', '!=' , $slug)->paginate(5);

        return view('page.product_detail', compact('getProduct','relatedProduct'));
    }
}
