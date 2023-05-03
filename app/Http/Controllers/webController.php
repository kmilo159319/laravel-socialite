<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    public function login(){
        return view('frontend.homepage');
      }

    public function index(){
        return view('frontend.index');
      }

      public function laravel(){
          return view('frontend.laravelwebside');
      }

      public function symfony(){
          return view('frontend.symfonyweb');
      }
      public function phpreact(){
        return view('frontend.phpreactweb');
      }
      public function Swoole(){
        return view('frontend.swooleweb');
      }
}
