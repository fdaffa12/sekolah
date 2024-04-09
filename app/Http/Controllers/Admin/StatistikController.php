<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StatPekerjaan;
use App\StatPendidikan;
use App\StatPerkawinan;
use App\StatGoldarah;
use App\StatAgama;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function StatPekerjaan(){
        $pekerjaan = StatPekerjaan::orderBy('id', 'desc')->get();
        $pria = StatPekerjaan::sum('pria');
        $perempuan = StatPekerjaan::sum('perempuan');
        $total = StatPekerjaan::sum('jumlah');
        return view ('admin.statistik.pekerjaan.index', compact('pekerjaan', 'pria', 'perempuan', 'total'));
    }

    public function storePekerjaan (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatPekerjaan::insert($data);

    	return redirect()->back()->with('success', 'StatPekerjaan Added');
    }

    public function editPekerjaan ($pekerjaan_id){
        $data = StatPekerjaan::find($pekerjaan_id);

        return view ('admin.statistik.pekerjaan.edit', compact ('data'));
    }

    public function updatePekerjaan (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatPekerjaan::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'StatPekerjaan Updated');
    }

    public function destroyPekerjaan($pekerjaan_id){
		StatPekerjaan::find($pekerjaan_id)->delete();
		return redirect()->back()->with('warning','Data Pekerjaan Behasil Dihapus');
	}

    public function draftPekerjaan($pekerjaan_id){
        StatPekerjaan::findOrFail($pekerjaan_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishPekerjaan($pekerjaan_id){
        StatPekerjaan::findOrFail($pekerjaan_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }

    public function StatPendidikan(){
        $pendidikan = StatPendidikan::orderBy('id', 'desc')->get();
        $pria = StatPendidikan::sum('pria');
        $perempuan = StatPendidikan::sum('perempuan');
        $total = StatPendidikan::sum('jumlah');
        return view ('admin.statistik.pendidikan.index', compact('pendidikan', 'pria', 'perempuan', 'total'));
    }

    public function storePendidikan (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatPendidikan::insert($data);

    	return redirect()->back()->with('success', 'StatPendidikan Added');
    }

    public function editPendidikan ($pendidikan_id){
        $data = StatPendidikan::find($pendidikan_id);

        return view ('admin.statistik.pendidikan.edit', compact ('data'));
    }

    public function updatePendidikan (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatPendidikan::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'StatPendidikan Updated');
    }

    public function destroyPendidikan($pendidikan_id){
		StatPendidikan::find($pendidikan_id)->delete();
		return redirect()->back()->with('warning','Data Pendidikan Behasil Dihapus');
	}

    public function draftPendidikan($pendidikan_id){
        StatPendidikan::findOrFail($pendidikan_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishPendidikan($pendidikan_id){
        StatPendidikan::findOrFail($pendidikan_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }

    public function StatPerkawinan(){
        $perkawinan = StatPerkawinan::orderBy('id', 'desc')->get();
        $pria = StatPerkawinan::sum('pria');
        $perempuan = StatPerkawinan::sum('perempuan');
        $total = StatPerkawinan::sum('jumlah');
        return view ('admin.statistik.perkawinan.index', compact('perkawinan', 'pria', 'perempuan', 'total'));
    }

    public function storePerkawinan (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatPerkawinan::insert($data);

    	return redirect()->back()->with('success', 'StatPerkawinan Added');
    }

    public function editPerkawinan ($perkawinan_id){
        $data = StatPerkawinan::find($perkawinan_id);

        return view ('admin.statistik.perkawinan.edit', compact ('data'));
    }

    public function updatePerkawinan (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatPerkawinan::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'StatPerkawinan Updated');
    }

    public function destroyPerkawinan($perkawinan_id){
		StatPerkawinan::find($perkawinan_id)->delete();
		return redirect()->back()->with('warning','Data Perkawinan Behasil Dihapus');
	}

    public function draftPerkawinan($perkawinan_id){
        StatPerkawinan::findOrFail($perkawinan_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishPerkawinan($perkawinan_id){
        StatPerkawinan::findOrFail($perkawinan_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }

    public function StatGoldarah(){
        $goldarah = StatGoldarah::orderBy('id', 'desc')->get();
        $pria = StatGoldarah::sum('pria');
        $perempuan = StatGoldarah::sum('perempuan');
        $total = StatGoldarah::sum('jumlah');
        return view ('admin.statistik.goldarah.index', compact('goldarah', 'pria', 'perempuan', 'total'));
    }

    public function storeGoldarah (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatGoldarah::insert($data);

    	return redirect()->back()->with('success', 'StatPerkawinan Added');
    }

    public function editGoldarah ($goldarah_id){
        $data = StatGoldarah::find($goldarah_id);

        return view ('admin.statistik.goldarah.edit', compact ('data'));
    }

    public function updateGoldarah (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatGoldarah::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'StatPerkawinan Updated');
    }

    public function destroyGoldarah($goldarah_id){
		StatGoldarah::find($goldarah_id)->delete();
		return redirect()->back()->with('warning','Data Perkawinan Behasil Dihapus');
	}

    public function draftGoldarah($goldarah_id){
        StatGoldarah::findOrFail($goldarah_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishGoldarah($goldarah_id){
        StatGoldarah::findOrFail($goldarah_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }

    public function StatAgama(){
        $agama = StatAgama::orderBy('id', 'desc')->get();
        $pria = StatAgama::sum('pria');
        $perempuan = StatAgama::sum('perempuan');
        $total = StatAgama::sum('jumlah');
        return view ('admin.statistik.agama.index', compact('agama', 'pria', 'perempuan', 'total'));
    }

    public function storeAgama (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatAgama::insert($data);

    	return redirect()->back()->with('success', 'StatPerkawinan Added');
    }

    public function editAgama ($agama_id){
        $data = StatAgama::find($agama_id);

        return view ('admin.statistik.agama.edit', compact ('data'));
    }

    public function updateAgama (Request $request){
        $request->validate([
    		'statistik' => 'required|max:255',
    		'pria' => 'required',
            'perempuan' => 'required',
        ]);

    	$data['statistik'] = $request->statistik;
        $data['pria'] = $request->pria;
        $data['perempuan'] = $request->perempuan;
        $data['jumlah'] = $request->pria + $request->perempuan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatAgama::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'StatPerkawinan Updated');
    }

    public function destroyAgama($agama_id){
		StatAgama::find($agama_id)->delete();
		return redirect()->back()->with('warning','Data Perkawinan Behasil Dihapus');
	}

    public function draftAgama($agama_id){
        StatAgama::findOrFail($agama_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishAgama($agama_id){
        StatAgama::findOrFail($agama_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
}
