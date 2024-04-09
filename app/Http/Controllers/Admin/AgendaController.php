<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\agenda;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){
        $agenda = agenda::orderBy('id', 'desc')->get();

        return view ('admin.agenda.index', compact ('agenda'));
    }

    public function add (){
        return view ('admin.agenda.add');
    }

    public function store (Request $request){
        $request->validate([
    		'nama' => 'required|max:255',
    		'agenda' => 'required',
            'tanggal' => 'required',
            'time' => 'required',
            'lokasi' => 'required',
        ]);

    	$data['nama'] = $request->nama;
        $data['agenda'] = $request->agenda;
        $data['tanggal'] = $request->tanggal;
        $data['time'] = $request->time;
        $data['lokasi'] = $request->lokasi;
        $data['slug'] = strtolower(str_replace(' ','-',$request->nama));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        agenda::insert($data);

    	return redirect()->back()->with('success', 'Agenda Added');
    }

    public function edit ($agenda_id){
        $data = agenda::find($agenda_id);

        return view ('admin.agenda.edit', compact('data'));
    }

    public function update (Request $request){
        $request->validate([
            'nama' => 'required|max:255',
            'agenda' => 'required',
            'tanggal' => 'required',
            'time' => 'required',
            'lokasi' => 'required',
        ]);

        $data['nama'] = $request->nama;
        $data['agenda'] = $request->agenda;
        $data['tanggal'] = $request->tanggal;
        $data['time'] = $request->time;
        $data['lokasi'] = $request->lokasi;
        $data['slug'] = strtolower(str_replace(' ','-',$request->nama));
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        agenda::where('id', $request->id)->update($data);

        return redirect()->back()->with('success', 'Upadete Added');
    }

    public function destroyAgenda($agenda_id){
		agenda::find($agenda_id)->delete();
		return redirect()->back()->with('warning','Category deleted');
	}

    public function draftAgenda($agenda_id){
        agenda::findOrFail($agenda_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishAgenda($agenda_id){
        agenda::findOrFail($agenda_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
}
