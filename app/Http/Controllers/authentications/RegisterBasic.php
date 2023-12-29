<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RegisterBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-register-basic', ['pageConfigs' => $pageConfigs]);
  }

  public function register(Request $request){
    try {

      User::factory()->create([
        'name' => $request->name, // Set the admin's name
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
  
      return redirect()->route("login")->with('success', 'registered');
  } catch (\Exception $e) {
      return back()->with('error', 'Mail already taken');
  }
  
  }
}
