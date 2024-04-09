<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $video = Video::orderBy('id','desc')->get();

        return view ('admin.video.index', compact('video'));
    }

    public function add(){
        return view ('admin.video.add');
    }

    public function store (Request $request){
        $request->validate([
    		'title' => 'required|max:255',
            'link' => 'required',
        ]);

    	$data['title'] = $request->title;
        $data['slug'] = strtolower(str_replace(' ','-',$request->title));
        $data['link'] = $request->link;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //cek poto
        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Video::insert($data);

    	return redirect()->back()->with('success', 'Video Added');
    }

    public function edit($video_id){
        $data = Video::find($video_id);

        return view ('admin.video.edit', compact('data'));
    }

    public function update (Request $request){
        $request->validate([
    		'title' => 'required|max:255',
            'link' => 'required',
        ]);

    	$data['title'] = $request->title;
        $data['slug'] = strtolower(str_replace(' ','-',$request->title));
        $data['link'] = $request->link;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //cek poto
        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Video::where('id', $request->id)->update($data);

    	return redirect()->back()->with('success', 'Video Added');
    }

    public function destroyPotensi($video_id){
		Video::find($video_id)->delete();
		return redirect()->back()->with('warning','Category deleted');
	}

    public function draftVideo($video_id){
        Video::findOrFail($video_id)->update(['status' => 0]);
        return redirect()->back()->withToastWarning('Berhasil Dimasukan Ke Dalam Draft');
    }

    public function publishVideo($video_id){
        Video::findOrFail($video_id)->update(['status' => 1]);
        return redirect()->back()->withToastInfo('Berhasil Dipublish');
    }
    
}
