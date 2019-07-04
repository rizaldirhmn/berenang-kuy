<?php

namespace App\Http\Controllers\CMS;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\GalleryCreateRequest;
use File;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $title = "Gallery Control Panel | Dashboard";
        $gallery = Gallery::paginate(10);
        // dd($gallery);
        return view('dashboard.gallery.index', compact('title','gallery'));
    }

    public function create()
    {
        $title = "Gallery Control Panel - Dashboard";
        return view('dashboard.gallery.create', compact('title'));
    }

    public function store(GalleryCreateRequest $req)
    {
        $file = $req->file('image');
        $filename = 'gallery-'.str_random(7).'-'.$file->getClientOriginalName();

        $file->move(public_path('uploads/gallery'),$filename);

        Gallery::create([
            'name' => $req->name,
            'path' => 'uploads/gallery/'.$filename,
            'deskripsi' => $req->deskripsi,
        ]);

        return redirect()->route('dashboard.gallery')->with('success','Berhasil menambahkan foto gallery');
    }

    public function delete($encrypt_id)
    {
        $id = Crypt::decrypt($encrypt_id);
        $gallery = Gallery::findOrFail($id);
        $file_path = public_path($gallery->path);
        File::delete($file_path);

        $gallery->delete();

        return back()->with('error','Berhasil menghapus foto gallery');
    }
}
