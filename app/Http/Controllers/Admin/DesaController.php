<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Desa;

class DesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Desa::orderBy('id', 'desc')->get();
        return view ('admin.desa.index', compact('data'));
    }

    public function addDesa(){
        return view ('admin.desa.add-desa');
    }

    public function store(Request $request){
        $request->validate([
    		'nama_desa' => 'required|max:255',
    		'description' => 'required',
        ]);

    	$data['nama_desa'] = $request->nama_desa;
        $data['description'] = $request->description;
        $data['nama_slug'] = strtolower(str_replace(' ','-',$request->nama_desa));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //cek poto
        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Desa::insert($data);

    	return redirect()->back()->with('success', 'Desa Added');
    }

    public function editDesa ($desa_id){
        $desa = Desa::find($desa_id);

        return view ('admin.desa.edit-desa', compact('desa'));
    }

    public function updateDesa(Request $request){
        $request->validate([
    		'nama_desa' => 'required|max:255',
    		'description' => 'required',
        ]);

    	$data['nama_desa'] = $request->nama_desa;
        $data['description'] = $request->description;
        $data['nama_slug'] = strtolower(str_replace(' ','-',$request->nama_desa));
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //cek poto
        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Desa::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function destroyDesa($desa_id){
		Desa::find($desa_id)->delete();
		return redirect()->back()->with('warning','Category deleted');
	}

    public function draftDesa($desa_id){
        Desa::findOrFail($desa_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishDesa($desa_id){
        Desa::findOrFail($desa_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
}
