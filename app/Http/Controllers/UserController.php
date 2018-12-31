<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::where('id','!=',1)->get();
        return view('backend.contents.user-list', compact('user'));
    }

    public function add(){
        return view('backend.contents.user-tambah');
    }

    public function store(Request $request){
        $user = new User($request->only(
           'nama','username'
        ));
        $user->password = bcrypt($request->get('password'));
        $user->type = 'pegawai';
        $user->save();
        return redirect()->route('index_user');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function update(Request $request){

//        $this->validate($request, [
//            'username' => 'unique:connection.users,username'
//        ]);


        $role = 2;
        $user = User::findOrFail($request->user_id);

        $user->nama = $request['nama'];
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->update();

        $user->Role()->sync($role);
        return redirect('dashboard/user');
    }

    public  function apiDelete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['succes' => true],200 );
    }


}
