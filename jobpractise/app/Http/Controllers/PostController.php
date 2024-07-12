<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function  add_post(){
        return view('admin.post');
    }

public function post_page( Request $request){

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
      

    return redirect()->back()->with('message','Data added successfully');
}




public function show_post(){
    $post = Post::all();
    return view ('admin.show_post',compact('post'));
}




public  function delete_post($id){
     $post=Post ::find($id);

     $post->delete();

     return redirect()->back()->with('message','post deleted succcessfully');
}


public function edit_post($id){
    $post= Post::find($id);

    return view('admin.update',compact('post'));
}


}
