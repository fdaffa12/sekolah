<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paten;

class PatenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){
        $paten = Paten::orderBy('id', 'desc')->get();

        return view ('admin.paten.index', compact('paten'));
    }

    public function addPaten(){
        return view ('admin.paten.add-paten');
    }

    public function storePaten (Request $request){
        $request->validate([
    		'judul' => 'required|max:255',
    		'description' => 'required',
        ]);

    	$data['judul'] = $request->judul;
        $data['description'] = $request->description;
        $data['judul_slug'] = strtolower(str_replace(' ','-',$request->judul));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Paten::insert($data);

    	return redirect()->back()->with('success', 'Paten Added');
    }

    public function editPaten ($paten_id){
        $paten = Paten::find($paten_id);

        return view ('admin.paten.edit-paten', compact ('paten'));
    }

    public function updatePaten (Request $request){
        $request->validate([
    		'judul' => 'required|max:255',
    		'description' => 'required',
        ]);

    	$data['judul'] = $request->judul;
        $data['description'] = $request->description;
        $data['judul_slug'] = strtolower(str_replace(' ','-',$request->judul));
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Paten::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'Paten Updated');
    }

    public function destroyPaten($paten_id){
		Paten::find($paten_id)->delete();
		return redirect()->back()->with('warning','Category deleted');
	}

    public function draftPaten($paten_id){
        Paten::findOrFail($paten_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishPaten($paten_id){
        Paten::findOrFail($paten_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }

}
