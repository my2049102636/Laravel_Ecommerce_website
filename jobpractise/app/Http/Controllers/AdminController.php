<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function edit_my_post(Request $request,$id){


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

    public function edit_my_post1($id){
        $data= Post::find($id);
    
        return view('home.update_post',compact('data'));
    }
    
    
}
