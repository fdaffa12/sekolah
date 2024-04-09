<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Struktur;

class StrukturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $struktur = Struktur::orderBy('id', 'desc')->get();

        return view ('admin.struktur.index', compact('struktur'));
    }

    public function addStruktur (){
        return view ('admin.struktur.add');
    }

    public function storeStruktur (Request $request){
        $request->validate([
    		'nama' => 'required|max:255',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jabatan' => 'required',
        ]);

    	$data['nama'] = $request->nama;
        $data['nip'] = $request->nip;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['pendidikan'] = $request->pendidikan;
        $data['jabatan'] = $request->jabatan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Struktur::insert($data);

    	return redirect()->back()->with('success', 'Struktur Added');
    }

    public function editStruktur($struktur_id){
        $data = Struktur::find($struktur_id);

        return view ('admin.struktur.edit', compact ('data'));
    }

    public function update (Request $request){
        $request->validate([
    		'nama' => 'required|max:255',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jabatan' => 'required',
        ]);

    	$data['nama'] = $request->nama;
        $data['nip'] = $request->nip;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['pendidikan'] = $request->pendidikan;
        $data['jabatan'] = $request->jabatan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Struktur::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'Struktur Added');
    }

    public function destroyStruktur($struktur_id){
		Struktur::find($struktur_id)->delete();
		return redirect()->back()->with('warning','Struktur deleted');
	}

    public function draftStruktur($struktur_id){
        Struktur::findOrFail($struktur_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishStruktur($struktur_id){
        Struktur::findOrFail($struktur_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
}
