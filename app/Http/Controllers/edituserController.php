<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class edituserController extends Controller
{
    function __construct()
    {
       $this->Middleware('auth');
    }

    public function editUser(Request $request){

        $user=User::find(auth()->user()->id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return back();
      }


}
