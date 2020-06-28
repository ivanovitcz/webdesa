<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function index() {
    if(isset(auth() -> user() -> status)) {
      if(auth() -> user() -> status == 'RT') {
        return redirect('/admin');
      } else {
        return redirect('/user');
      }
    }
    $data_desa = \App\Desa::find(1);
    return view('login.index', ['data_desa' => $data_desa]);
  }

  public function postlogin(request $request) {
    if(Auth::attempt($request -> only('username','password'))) {
      $username = $request -> username;
      $data_user = \App\User::all() -> where('username', $username);
      foreach($data_user as $datas) {
        if($datas -> status == 'RT') {
          return redirect('/admin');
        } else {
          return redirect('/user');
        }
      }
    }
    return redirect('/login') -> with('error', 'Username/Password Salah!');
  }

  public function logout() {
    Auth::logout();
    return redirect('/login');
  }
}
