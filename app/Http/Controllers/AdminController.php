<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function test()
    {
        $users=User::select('position','role')->where('role','1')->get();
        return response()->json($users);
    }
}
