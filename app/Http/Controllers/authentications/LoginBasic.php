<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginBasic extends Controller
{ 
  public function index()
  { 
  
    if(Auth::user()!=null){
      $role=Auth::user()->role;
      return redirect()->route('home')->with('success', 'Login successful');
    }
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login-basic', ['pageConfigs' => $pageConfigs]);
  }

  public function login(Request $request)
  {
    $credentials = [
      'email' => $request->email,
      'password' => $request->password,
  ];
  if (Auth::attempt($credentials)) {
      $user = Auth::user();
      session(['username' => $user->name]);
      if ($user->isUser()) {
          return redirect()->route('home')->with('success', 'Login successful');
      } elseif ($user->isMachinist()) {
        return redirect()->route('home')->with('success', 'Login successful');
      } else {
          return redirect()->route('home')->with('success', 'Login successful');
      }
  }
  return redirect()->back()->withErrors(['msg' => 'User not valid']);
  }

  public function logout(){
    Session::flush();
    Auth::logout();
    return redirect('/');
}
}
