<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyContoller extends Controller
{
   

public function upd_post(Request $request,$id){


    $data= Post::find($id);

    
    $data->title=$request->title;

    $data->description=$request->description;

    $img = $request->img;

    if ($img) {
        $imgName = time() . '.' . $img->getClientOriginalExtension();
    
        // The second parameter in the move method should be the destination path, not a string
        $img->move(public_path('postimg'), $imgName);
    
        $data->img = $imgName;

    }
    
        $data->save();

        return redirect()->back()->with('message','data updated successfully');
}


public function post_detail($id)
{
    $post=Post::find($id);
    return view('home.post_detail',compact('post'));
}


public function create_post(){


    return view('home.create_post');
}


public function add_user(Request $request){


    
$user=Auth()->user();

$userid=$user->id;
$name=$user->name;
$usertype=$user->usertype;


    $post= new Post;

    $post->title=$request->title;

    $post->description=$request->description;


    $post->user_id= $userid;

    $post->name= $name;
    
    $post->usertype= $usertype;

    $post->post_status='active';
    $img = $request->img;

    if ($img) {
        $imgName = time() . '.' . $img->getClientOriginalExtension();
    
        // The second parameter in the move method should be the destination path, not a string
        $img->move(public_path('postimg'), $imgName);
    
        $post->img = $imgName;
    }
    

    $post->save();
      
    alert()->success('SuccessAlert','YOU HAVE ADDED THE DATA SUCCESSFULLY.');
    return redirect()->back();
}


public function my_post(){
   $user=Auth::user();

   $userid=$user->id;

   $data=Post::where('user_id','=',$userid)->get();

      return view('home.my_post',compact('data'));

}


public function my_post_del($id){

$data=Post::find($id);

$data->delete();

return redirect()->back();

}
}
