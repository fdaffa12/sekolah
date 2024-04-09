<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Potensi;

class PotensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $potensi = Potensi::orderBy('id', 'desc')->get();
        return view ('admin.potensi.index', compact('potensi'));
    }

    public function addPotensi(){
        return view ('admin.potensi.add-potensi');
    }

    public function storePotensi(Request $request){
        $request->validate([
    		'potensi' => 'required|max:255',
    		'description' => 'required',
        ]);

    	$data['potensi'] = $request->potensi;
        $data['description'] = $request->description;
        $data['potensi_slug'] = strtolower(str_replace(' ','-',$request->potensi));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //cek poto
        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Potensi::insert($data);

    	return redirect()->back()->with('success', 'Potensi Added');
    }

    public function editPotensi($potensi_id){
        $potensi = Potensi::find($potensi_id);

        return view ('admin.potensi.edit-potensi', compact('potensi'));
    }

    public function updatePotensi (Request $request){
        $request->validate([
    		'potensi' => 'required|max:255',
    		'description' => 'required',
        ]);

    	$data['potensi'] = $request->potensi;
        $data['description'] = $request->description;
        $data['potensi_slug'] = strtolower(str_replace(' ','-',$request->potensi));
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //cek poto
        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Potensi::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'Potensi Updated');
    }

    public function destroyPotensi($potensi_id){
		Potensi::find($potensi_id)->delete();
		return redirect()->back()->with('warning','Category deleted');
	}

    public function draftPotensi($potensi_id){
        Potensi::findOrFail($potensi_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishPotensi($potensi_id){
        Potensi::findOrFail($potensi_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
}
