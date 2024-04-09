<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\CategoryItem;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){

        if (!empty($request->search)){
            $search = $request->search;
            $categories = Category::where('title','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->orderBy('created_at','desc')->paginate(7);
            return view('admin.gallery.index')->with('categories', $categories);
        }

        $categories = Category::orderBy('created_at', 'desc')->paginate(7);
        
        return view('admin.gallery.index')->with('categories', $categories);
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'image'=> 'required',
            'cover_image'=>'required'
        ]);
        

        $category = new Category;
        $file = $request->file('image');
        if($file){
            $file->move('uploads/gallery',$file->getClientOriginalName());
            $category['image'] = 'uploads/gallery/'.$file->getClientOriginalName();
        }
        $category->title = $request->input('title');
        $category->description = $request->input('body');
        $category->save();

        //stores data in public/cover_image/original
        foreach ($request->cover_image as $photo){
            $fileNameWithExt = $photo->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        
            // Pindahkan file ke direktori uploads/gallery/
            $photo->move('uploads/gallery', $fileNameToStore);
        
            // Simpan data file ke database
            CategoryItem::create([
                'category_id' => $category->id,
                'cover_image' => 'uploads/gallery/'.$fileNameToStore // Simpan path file dengan direktori
            ]);
        }
        

        //below code stores images inside storage/app/cover_image/image which is not accessable publicly
        /*foreach ($request->cover_image as $photo) {
            $filename = $photo->store('cover_image/original');
            $newfilename=str_replace('/','',$filename);
            CategoryItem::create([
                'category_id' => $category->id,
                'cover_image' => $newfilename
            ]);
        }*/


        return back();
    }

    public function getByID($id)
    {
        $data = Category::find($id);

        return view ('admin.gallery.edit', compact ('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
    		'title' => 'required|max:255',
    		'description' => 'required',
        ]);

    	$data['title'] = $request->title;
        $data['description'] = $request->description;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('image');
        if($file){
            $file->move('uploads/gallery',$file->getClientOriginalName());
            $data['image'] = 'uploads/gallery/'.$file->getClientOriginalName();
        }

        Category::where('id', $request->id)->update($data);

        return redirect()->back()->with('success', 'Category Updated');
    }

    public function delete($id)
    {
        
        try {
            Category::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back()->with('success','Sukses Menghapus');
    }
}
