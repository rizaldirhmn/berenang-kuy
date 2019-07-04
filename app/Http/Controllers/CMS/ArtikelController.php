<?php

namespace App\Http\Controllers\CMS;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArtikelRequest;
use App\Models\ArtikelKategori;
use App\Http\Requests\ArtikelRequestEdit;
use File;

class ArtikelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Artikel Control Panel - Dashboard";
        $artikel = Artikel::paginate(10);
        // dd($artikel);
        return view('dashboard.artikel.index', compact('title','artikel'));
    }

    public function cari(Request $req)
    {
        $title = "Artikel Control Panel - Dashboard";
        $user = Auth::user();
        $class = "news";

        $judul = $req->input('judul');
        $kategori = $req->input('kategori');

        $artikel = Artikel::where([
                            ['judul','like','%'.$judul.'%'],
                            ['kategori','like','%'.$kategori.'%']
                        ])->paginate(10);

        return view('dashboard.artikel.index', compact('user','title','class','artikel'));
    }

    public function create()
    {
        $title = "Artikel Control Panel - Dashboard";
        $kategori = ArtikelKategori::all();
        
        return view('dashboard.artikel.create', compact('title','kategori'));
    }

    public function store(ArtikelRequest $req)
    {
        // dd($req->all());
        $file = $req->file('image');
        $filename = 'artikel-'.str_random(7).'-'.$file->getClientOriginalName();

        $file->move(public_path('uploads/artikel'),$filename);

        Artikel::create([
            'judul' => $req->judul,
            'caption' => $req->caption,
            'kategori' => $req->id_kategori,
            'path' => $filename,
            'deskripsi' => $req->deskripsi,
            'video' => $req->video,
        ]);

        return redirect()->route('dashboard.artikel')->with('success','Berhasil menambahkan slider');
    }

    public function edit($slug)
    {
        $title = "Artikel Control Panel - Dashboard";
        $kategori = ArtikelKategori::all();
        $artikel = Artikel::where('slug', '=',$slug)->first();

        return view('dashboard.artikel.edit', compact('title','kategori','artikel'));
    }

    public function update(ArtikelRequestEdit $req, $slug)
    {
        // dd($req->all());
        $artikel = Artikel::where('slug', '=', $slug)->first();

        if ( $req->has('image') ) {
            
            $file_path = public_path('uploads/artikel/').'/'.$artikel->path;
            File::delete($file_path);

            $file = $req->file('image');
            $filename = 'artikel-'.str_random(7).'-'.$file->getClientOriginalName();
            
            $req->image->move(public_path('uploads/artikel/'), $filename);
            $artikel->update([
                'judul' => $req->judul,
                'caption' => $req->caption,
                'kategori' => $req->id_kategori,
                'deskripsi' => $req->deskripsi,
                'video' => $req->video,
                'path' => $filename,
            ]);
        }else{
            $artikel->update([
                'judul' => $req->judul,
                'caption' => $req->caption,
                'kategori' => $req->id_kategori,
                'deskripsi' => $req->deskripsi,
                'video' => $req->video,
            ]);
        }
        return back()->with('success','Berhasil mengubah berita');

    }

    public function delete($slug)
    {
        $artikel = Artikel::where('slug', '=', $slug)->first();
        $file_path = public_path('uploads/artikel/'.$artikel->path);
        File::delete($file_path);

        $artikel->delete();

        return back()->with('error','Berhasil menghapus artikel');
    }
}
