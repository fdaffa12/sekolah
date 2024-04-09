<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add (){
        return view ('admin.pages.add');
    }

    public function store (Request $request){
        $request->validate([
    		'judul' => 'required|max:255',
    		'description' => 'required',
    	]);

    	Pages::insert([
    		'judul' => $request->judul,
    		'title_slug' => strtolower(str_replace(' ','-',$request->judul)),
    		'description' => $request->description,
    		'created_at' => Carbon::now()
    	]);

    	return redirect()->back()->withSuccess('Created Successfully!');
    }

    public function index (){
        $pages = Pages::latest()->get();
        return view ('admin.pages.index', compact('pages'));
    }

    public function edit ($id){
        $pages = Pages::find($id);
        return view ('admin.pages.edit', compact('pages'));
    }

    public function update (Request $request){
        $pages_id = $request->id;

        Pages::find($pages_id)->update([
            'judul' => $request->judul,
            'title_slug' => strtolower(str_replace(' ','-',$request->judul)),
    		'description' => $request->description,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Data Updated');
    }

    public function destroy($pages_id){
		Pages::find($pages_id)->delete();
		return redirect()->back()->with('warning','Category deleted');
	}

    public function draft($pages_id){
        Pages::findOrFail($pages_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publish($pages_id){
        Pages::findOrFail($pages_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
}
