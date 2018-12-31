<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $pesan  = Message::all();
        return view('backend.contents.messsage',compact('pesan'));
    }

    public function store(Request $request){
        $message = new Message($request->only(
            'nama','email','no_telp','message'
        ));
        $message->save();

        return redirect()->back();
    }

    public function destroy($id){
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back();
    }
}
