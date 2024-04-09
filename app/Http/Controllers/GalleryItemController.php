<?php

namespace App\Http\Controllers;

use App\CategoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {

        $categoryitems = CategoryItem::where('category_id',$id)->orderBy('created_at', 'desc')->paginate(6);

        return view('admin.gallery.view.images')->with([
                'categoryitems'=>$categoryitems,
                'id'=>$id
                ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        $category_id = $request->id;
        $image = new CategoryItem;
        
        // Saving a file
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
        
            // Get filename with extension
            $fileNameWithExt = $file->getClientOriginalName();
        
            // Get file name only
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        
            // Get extension of file
            $extension = $file->getClientOriginalExtension();
        
            // File name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        
            // Upload image to specified directory
            $file->move('uploads/gallery/', $fileNameToStore);
        
            // Set cover_image attribute of the model
            $image->cover_image = 'uploads/gallery/' . $fileNameToStore;
        }
        
        // Set category_id attribute of the model
        $image->category_id = $category_id;
        
        // Save the model to database
        $image->save();
        
        return back();
    }

    public function update(Request $request)
    {

        $this->validate($request,[
            'id'=>'required',
            'cover_image'=>'image|nullable|max:1999'
            ]);

        $id = $request->id;
        $image = CategoryItem::find($id);

        //saving a file
            if($request->hasFile('cover_image'))
            {

                //get filename with extension
                $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
                //get file name only

                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //get extension of file
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //file name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;

                //upload image
                $path = $request->cover_image->move(public_path().'/uploads/gallery/', $fileNameToStore);
                $image->cover_image= $fileNameToStore;
                $image->update();
            }

        return back();
    }

    //delete category item images
    public function delete($id)
    {
        try {
            CategoryItem::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back()->with('success','Sukses Menghapus');
    }
}
