<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Contact::orderBy('id', 'desc')->get();

        return view('admin.contact.index', compact('data'));
    }

    public function replyMessage($message_id){
        $messages = contact::find($message_id);

        return view ('admin.contact.reply', compact('messages'));
    }

    public function storeReply(Request $request){
        //VALIDASI DATA YANG DITERIMA
        $request->validate([
            'nama' => 'required',
            'comment' => 'required'
        ]);

        $data['nama'] = $request->nama;
        //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
        $data['parent_id'] = $request->parent_id != '' ? $request->parent_id:NULL;
        $data['comment'] = $request->comment;
        $data['pekerjaan'] = '-';
        $data['phone'] = '-';
        $data['email'] = '-';
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Contact::insert($data);

        return redirect()->back()->with('success', 'Comment Added');
    }
}
