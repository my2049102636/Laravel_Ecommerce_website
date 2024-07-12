<?php

namespace App\Http\Controllers;
use App\Models\Post;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
      $post= Post::all();
      if(Auth::id()){
        $usertype=Auth()->user()->usertype;
        if($usertype=='user'){
            return view('home.homepage',compact('post'));
        }
        else if($usertype=='admin'){
            return view('admin.adminpage');
        }
        else{
            return redirect()->back();
        }
      }
    }


    public function homepage(){

      $post= Post::all();
      return view('home.homepage',compact('post'));
    }
}
