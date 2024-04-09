<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publikasi;
use App\Pages;
use App\Post;
use App\Desa;
use App\Potensi;
use App\Paten;
use App\Unduhan;
use App\Struktur;
use App\Category;
use App\CategoryItem;
use App\Video;
use App\Setting;
use App\agenda;
use App\StatPekerjaan;
use App\StatPendidikan;
use App\StatPerkawinan;
use App\StatGoldarah;
use App\StatAgama;
use App\Coment;
use App\Contact;


class FrontendController extends Controller
{
    public function __construct(){
		$publikasi = Publikasi::where('status','1')->get();
        $pages = Pages::Where('status', '1')->get();
        $desa = Desa::where('status', '1')->get();
        $potensi = Potensi::where('status', '1')->get();
        $paten = Paten::where('status', '1')->get();
        $setting = Setting::first();
        if($setting){
            $setting->social = explode(',', $setting->social);
            foreach ($setting->social as $social) {
                $icon = explode('.', $social);
                $icon = $icon[1];
                $icons[] = $icon;
            }
        }else{
            $icons = [];
        }
		view()->share(['publikasi' => $publikasi, 'pages' => $pages, 'desa'=> $desa, 'potensi'=> $potensi, 'paten'=> $paten, 'setting'=>$setting, 'icons' => $icons]);
	}

    public function index (){
        $struktur = Struktur::orderBy('id', 'desc')->get();
        $posts = Post::where('status', '1')->orderBy('id', 'desc')->paginate(5);
        $banners = Post::where('postcat_id','LIKE','%1%')->orderby('id','DESC')->get();
        $paten = Paten::where('status', '1')->orderBy('id', 'desc')->get();
        $unduhan = Unduhan::where('status', '1')->orderBy('id', 'desc')->get();
        $agenda = agenda::where('status', '1')->orderBy('id', 'desc')->get();
        return view ('frontend.index', compact('struktur', 'posts', 'banners', 'paten', 'unduhan', 'agenda'));
    }

    public function pages($title_slug){
        $data = Pages::where('title_slug', $title_slug)->first();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();
        
        return view ('frontend.pages', compact('data', 'publikasi', 'latest'));
    }

    public function publikasi ($nama){
        $data = Publikasi::where('nama', $nama)->first();
        $posts = Post::where('postcat_id','LIKE','%'.$data->id.'%')->orderby('id','DESC')->paginate(7);

        return view ('frontend.publikasi', compact('data', 'posts'));
    }

    public function post ($post_slug){
        $data = Post::with(['comments', 'comments.child'])->where('post_slug', $post_slug)->first();
        $views = $data->views;
        Post::where('post_slug',$post_slug)->update(['views'=>$views + 1]);
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.post', compact('data', 'latest', 'publikasi', 'views'));
    }

    public function comment(Request $request){
        //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'username' => 'required',
            'comment' => 'required'
        ]);

        Coment::create([
            'post_id' => $request->id,
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'username' => $request->username,
            'comment' => $request->comment
        ]);
        return redirect()->back()->with('success', 'Comment Added');
    }

    public function contact(){
        $data = Contact::whereNull('parent_id')->orderBy('id', 'desc')->get();
        return view ('frontend.contact', compact('data'));
    }

    public function contactPost(Request $request){
        //VALIDASI DATA YANG DITERIMA
        $request->validate([
            'nama' => 'required',
            'pekerjaan' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'comment' => 'required'
        ]);

        $data['nama'] = $request->nama;
        //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
        $data['parent_id'] = $request->parent_id != '' ? $request->parent_id:NULL;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['comment'] = $request->comment;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        //cek poto
        $file = $request->file('image');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
        }

        Contact::insert($data);

        return redirect()->back()->with('success', 'Comment Added');
    }

    public function desa ($nama_slug){
        $data = Desa::where('nama_slug', $nama_slug)->first();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.desa', compact ('data', 'publikasi', 'latest'));
    }

    public function potensi ($potensi_slug){
        $data = Potensi::where('potensi_slug', $potensi_slug)->first();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.potensi', compact ('data', 'publikasi', 'latest'));
    }

    public function paten ($judul_slug){
        $data = Paten::where('judul_slug', $judul_slug)->first();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.paten', compact ('data', 'publikasi', 'latest'));
    }

    public function unduhan (){
        $data = Unduhan::where('status', '1')->orderBy('id', 'desc')->get();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.unduhan', compact ('data', 'publikasi', 'latest'));
    }

    public function search(Request $request){
		$query = $request->input('query');
		$posts = Post::where('post_title', 'LIKE', "%$query%")->where('status', 1)->orderby('id','DESC')->paginate(10);
		return view('frontend.show', compact('posts'));
	}

    public function gallery(){
        $data = Category::orderBy('created_at', 'desc')->paginate(7);

        return view ('frontend.gallery', compact('data'));
    }

    public function galleryItem($id){
        $categoryitems = CategoryItem::where('category_id',$id)->orderBy('created_at', 'desc')->paginate(6);

        return view('frontend.gallery-item', compact ('categoryitems'));
    }

    public function video(){
        $video = Video::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.video', compact('video'));
    }

    public function videoDetail($slug){
        $data = Video::where('slug', $slug)->first();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.video-detail', compact('data','publikasi','latest'));
    }

    public function agendaDetail($slug){
        $data = agenda::where('slug', $slug)->first();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.agenda-detail', compact('data', 'publikasi', 'latest'));
    }

    public function agenda(){
        $data = agenda::where('status', '1')->orderBy('id', 'desc')->get();
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();

        return view ('frontend.agenda', compact ('data', 'publikasi', 'latest'));
    }

    public function pekerjaan(){
        $pekerjaan = StatPekerjaan::where('status', '1')->orderBy('id', 'desc')->get();
        $pria = StatPekerjaan::sum('pria');
        $perempuan = StatPekerjaan::sum('perempuan');
        $total = StatPekerjaan::sum('jumlah');
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();
        return view ('frontend.pekerjaan', compact('pekerjaan', 'pria', 'perempuan', 'total', 'publikasi', 'latest'));
    }

    public function pendidikan(){
        $pendidikan = StatPendidikan::where('status', '1')->orderBy('id', 'desc')->get();
        $pria = StatPendidikan::sum('pria');
        $perempuan = StatPendidikan::sum('perempuan');
        $total = StatPendidikan::sum('jumlah');
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();
        return view ('frontend.pendidikan', compact('pendidikan', 'pria', 'perempuan', 'total', 'publikasi', 'latest'));
    }

    public function perkawinan(){
        $perkawinan = StatPerkawinan::where('status', '1')->orderBy('id', 'desc')->get();
        $pria = StatPerkawinan::sum('pria');
        $perempuan = StatPerkawinan::sum('perempuan');
        $total = StatPerkawinan::sum('jumlah');
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();
        return view ('frontend.perkawinan', compact('perkawinan', 'pria', 'perempuan', 'total', 'publikasi', 'latest'));
    }

    public function goldarah(){
        $goldarah = StatGoldarah::where('status', '1')->orderBy('id', 'desc')->get();
        $pria = StatGoldarah::sum('pria');
        $perempuan = StatGoldarah::sum('perempuan');
        $total = StatGoldarah::sum('jumlah');
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();
        return view ('frontend.goldarah', compact('goldarah', 'pria', 'perempuan', 'total', 'publikasi', 'latest'));
    }

    public function agama(){
        $agama = StatAgama::where('status', '1')->orderBy('id', 'desc')->get();
        $pria = StatAgama::sum('pria');
        $perempuan = StatAgama::sum('perempuan');
        $total = StatAgama::sum('jumlah');
        $publikasi = Publikasi::where('status','1')->get();
        $latest = Post::where('status', '1')->orderBy('id', 'desc')->get();
        return view ('frontend.agama', compact('agama', 'pria', 'perempuan', 'total', 'publikasi', 'latest'));
    }
}
