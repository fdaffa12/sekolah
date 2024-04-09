<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Galeri;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){
        $data = Galeri::orderBy('id', 'desc')->get();
        return view ('admin.galeri.index', compact('data'));
    }

    public function addGaleri(){
        return view ('admin.galeri.add');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
          ]);
      
          if($request->hasfile('image')) {
              foreach($request->file('image') as $file)
              {
                  $name = $file->getClientOriginalName();
                  $file->move(public_path().'/uploads/', $name);  
                  $imgData[] = $name;  
              }
      
              $fileModal = new Galeri();
              $fileModal->nama = $request->nama;
              $fileModal->image = json_encode($imgData);
              $fileModal->image_path = json_encode($imgData);
              
             
              $fileModal->save();
          }

    	return redirect()->back()->with('success', 'Galeri Added');
    }

    public function edit($galeri_id){
        $data = Galeri::orderBy('id', 'desc')->get();

        return view ('admin.galeri.edit', compact('data'));
    }
}
