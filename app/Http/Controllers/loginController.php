<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    // login
    public function index(){
        return view('admin.login');
    }
    // postlogin
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        // return $request->password;
        $query = User::where('email','=',$request->email)->first();
        if($query){
            if(Hash::check($request->password, $query->password)){
                if($query->isadmin=='1'){
                    $request->session()->put('LoggedUser',$query->id);
                    return redirect('/adminindex');
                }else{
                    return redirect('/member');
                }
            }else{
                return back()->with('failed','Password salah!!');
            }
        }else{
            return back()->with('failed','Gagal Login!!');
        }
    }

    // register
    public function registerView(){
        return view('admin.register');
    }
    // post register
    // validasi register
    public function postRegister(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();
        
        if($query){
            return back()->with('success','Anda Berhasil Registrasi');
        }else{
            return back()->with('failed','Anda Gagal Melakukan Registrasi');
        }
    }
    // logged out
    public function logOut(){
        if(Session()->has('LoggedUser')){
            Session()->pull('LoggedUser');
            return redirect('/');

        }
    }
    // admin view
    public function admin(){
        $data_member = Member::all();
		return view('admin.home',['data_member' =>$data_member]);
    }
}
