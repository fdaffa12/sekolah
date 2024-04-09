<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StatPendidikan;
use Redirect,Response;

class StatPendidikanController extends Controller
{
    public function index(){
        $posts = StatPendidikan::all();

        return view('admin.statistik.pendidikan.index', ['posts' => $posts]);
    }

    public function store(Request $request){
        $request->validate([
          'statistik'       => 'required|max:255',
          'pria' => 'required',
          'perempuan' => 'required',
        ]);

        $post = StatPendidikan::updateOrCreate(['id' => $request->id], [
                  'statistik' => $request->statistik,
                  'pria' => $request->pria,
                  'perempuan' => $request->perempuan,
                ]);

        return response::json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);

    }

    public function show($id){
        $post = StatPendidikan::find($id);

        return response()->json($post);
    }

    public function destroy($id){
      $post = StatPendidikan::find($id)->delete();

      return response()->json(['success'=>'Post Deleted successfully']);
    }
}
