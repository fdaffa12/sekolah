<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unduhan;

class UnduhanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){
        $unduhan = Unduhan::orderby('id', 'desc')->get();

        return view ('admin.unduhan.index', compact('unduhan'));
    }

    public function addUnduhan(){
        return view ('admin.unduhan.add-unduhan');
    }

    public function storeUnduhan (Request $request){
        $request->validate([
    		'judul' => 'required|max:255',
        ]);

    	$data['judul'] = $request->judul;
        $data['judul_slug'] = strtolower(str_replace(' ','-',$request->judul));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('file');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['file'] = 'uploads/'.$file->getClientOriginalName();
        }

        Unduhan::insert($data);

    	return redirect()->back()->with('success', 'Unduhan Added');
    }

    public function editUnduhan ($unduhan_id){
        $data = Unduhan::find($unduhan_id);

        return view ('admin.unduhan.edit-unduhan', compact('data'));
    }

    public function updateUnduhan (Request $request){
        $request->validate([
    		'judul' => 'required|max:255',
        ]);

    	$data['judul'] = $request->judul;
        $data['judul_slug'] = strtolower(str_replace(' ','-',$request->judul));
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('file');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['file'] = 'uploads/'.$file->getClientOriginalName();
        }

        Unduhan::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'Unduhan Updated');
    }

    public function destroyUnduhan($unduhan_id){
		Unduhan::find($unduhan_id)->delete();
		return redirect()->back()->with('warning','Category deleted');
	}

    public function draftUnduhan($unduhan_id){
        Unduhan::findOrFail($unduhan_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishUnduhan($unduhan_id){
        Unduhan::findOrFail($unduhan_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
}
