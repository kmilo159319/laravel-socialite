<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class appController extends Controller
{

    function __construct()
    {
       $this->Middleware('auth');
    }

    public function editUser(){
        return view('frontend.edit_profile');
      }


    public function myArea(){
        return view('frontend.myarea');
    }

    public function uploadcurriculum(){

         $files= DB::table('resumes')
        ->select('resumes.*')
        ->where('user_id', Auth ::user()->id)
        ->orderBy('updated_at')->get();

        return view('frontend.uploadcurriculum')->with('files',$files);
    }
}
