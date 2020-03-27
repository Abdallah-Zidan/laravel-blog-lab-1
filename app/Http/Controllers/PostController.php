<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   function index()
    {
        $posts = Post::paginate(5);
    
        return view('posts.index',[
            "posts" => $posts
            ]);
    }

    public function show($post_id)
    {
        $post = Post::find($post_id);
        
        return view('posts.show' , [
            "post" => $post
            ]);     
    }

    public function create()
    {
        $users = User::all();

        return view("posts.create" , [
            "users" => $users,
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::find($post_id);

        if($post){
            $users = User::all();
            return view("posts.edit",[
                "post"  => $post , 
                "users" => $users
                ]);
        }

        return abort(404);
        
    }

    public function update(PostRequest $request , $post_id)
    {

        $post = $request->only(["title","description","user_id"]);
     
        $image =$request->file('post_image'); 
        
        if($image){
            $post["post_image"] = $image;
        }

        Post::find($post_id)->update($post);

        return redirect()->route("posts.index");
    }

    public function store(PostRequest $request)
    {
      
       $post = $request->only(["title","description","user_id"]);
       
       $image = $request->file('post_image');
      
       if($image){
          $post["post_image"] = $image;
       }

        Post::create($post);

        return redirect()->route("posts.index");
    }

    public function destroy($post_id)
    {
        $image = Post::find($post_id)->post_image;
        Storage::disk('public')->delete("uploads/images/".basename($image));

        Post::destroy($post_id);

        return redirect()->route("posts.index");
    }

}

