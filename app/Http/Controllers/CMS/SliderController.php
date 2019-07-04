<?php

namespace App\Http\Controllers\CMS;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Crypt;
use File;

class SliderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Slider Control Panel - Dashboard";
        $slider = Slider::get();
        return view('dashboard.slider.index', compact('title','slider'));
    }

    public function create()
    {
        $title = "Slider Control Panel - Dashboard";
        return view('dashboard.slider.create', compact('title'));
    }

    public function store(SliderRequest $req)
    {
        $file = $req->file('image');
        $filename = 'slider-'.str_random(7).'-'.$file->getClientOriginalName();

        $file->move(public_path('uploads/slider'),$filename);

        Slider::create([
            'path' => 'uploads/slider/'.$filename,
            'deskripsi' => $req->deskripsi,
        ]);

        return redirect()->route('dashboard.slider')->with('success','Berhasil menambahkan slider');
    }

    public function delete($encrypt_id)
    {
        $id = Crypt::decrypt($encrypt_id);
        $slider = Slider::findOrFail($id);
        $file_path = public_path($slider->path);
        File::delete($file_path);

        $slider->delete();

        return back()->with('error','Berhasil menghapus slider');
    }
}
