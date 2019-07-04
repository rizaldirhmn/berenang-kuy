<?php

namespace App\Http\Controllers\CMS;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductKategori;
use App\Http\Requests\ProductRequest;
use File;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Product Control Panel - Dashboard";
        $product = Product::paginate(10);

        return view('dashboard.product.index', compact('title','product'));
    }

    public function cari(Request $req)
    {
        $title = "Product Control Panel - Dashboard";
        $user = Auth::user();
        $class = "news";

        $name = $req->input('name');
        $id_kategori = $req->input('id_kategori');

        $product = Product::where([
                            ['name','like','%'.$name.'%'],
                            ['id_kategori','like','%'.$id_kategori.'%']
                        ])->paginate(10);

        return view('dashboard.product.index', compact('user','title','class','product'));
    }

    public function create()
    {
        $title = "Product Control Panel - Dashboard";
        $kategori = ProductKategori::all();
        
        return view('dashboard.product.create', compact('title','kategori'));
    }

    public function store(ProductRequest $req)
    {
        $file = $req->file('image');
        $filename = 'product-'.str_random(7).'-'.$file->getClientOriginalName();

        $file->move(public_path('uploads/product'),$filename);

        Product::create([
            'name' => $req->name,
            'caption' => $req->caption,
            'id_kategori' => $req->id_kategori,
            'path' => $filename,
            'deskripsi' => $req->deskripsi,
            'video' => $req->video,
        ]);

        return redirect()->route('dashboard.product')->with('success','Berhasil Menambahkan Produk');
    }

    public function edit($slug)
    {
        $title = "Product Control Panel - Dashboard";
        $kategori = ProductKategori::all();
        $product = Product::where('slug', '=',$slug)->first();

        return view('dashboard.product.edit', compact('title','kategori','product'));
    }

    public function update(Request $req, $slug)
    {
        // dd($req->all());
        $product = Product::where('slug', '=', $slug)->first();

        if ( $req->has('image') ) {
            $file_path = public_path('uploads/product').'/'.$product->path;
            File::delete($file_path);
            
            $file = $req->file('image');
            $filename = 'product-'.str_random(7).'-'.$file->getClientOriginalName();
            
            $req->image->move(public_path('uploads/product/'), $filename);
            $product->update([
                'name' => $req->name,
                'caption' => $req->caption,
                'id_kategori' => $req->id_kategori,
                'deskripsi' => $req->deskripsi,
                'video' => $req->video,
                'path' => $filename,
            ]);
        }else{
            $product->update([
                'name' => $req->name,
                'caption' => $req->caption,
                'id_kategori' => $req->id_kategori,
                'deskripsi' => $req->deskripsi,
                'video' => $req->video,
            ]);
        }
        return redirect()->route('dashboard.product')->with('success','Berhasil mengubah berita');

    }

    public function delete($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        $file_path = public_path('uploads/product/'.$product->path);
        File::delete($file_path);

        $product->delete();

        return back()->with('error','Berhasil menghapus Produk');
    }
}
