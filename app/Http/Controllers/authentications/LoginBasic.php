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
      // /return response()->json($user);
      session(['username' => $user->name]);
      if ($user->isUser()) {
        
          return redirect()->route('hoxase')->with('success', 'Login successful');
      } elseif ($user->isSAdmin()) {
        return 2;  
        return redirect()->route('sadmin.home')->with('success', 'Login successful');
      } else {
        return 3;  

          return redirect()->route('home')->with('success', 'Login successful');
      }
  }
  $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
  $verticalMenuData = json_decode($verticalMenuJson);
  $horizontalMenuJson = file_get_contents(base_path('resources/menu/horizontalMenu.json'));
  $horizontalMenuData = json_decode($horizontalMenuJson);

  // Share all menuData to all the views
  \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
  return 4;
  return back()->with('error', 'Email or password incorrect');
  }



  public function logout(){
    Session::flush();
    Auth::logout();
    return redirect('login');
}
}
