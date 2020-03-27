<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
   function index()
    {
        $posts = Post::paginate(5);
    
        return view('posts.index',[
            "posts" => $posts
            ]);
    }

    public function show()
    {
        $request = request();
        $post_id = $request->post;

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

    public function edit()
    {
        $request = request();

        $post_id = $request->post;
        $post = Post::find($post_id);

        $users = User::all();

        return view("posts.edit",[
            "post"  => $post , 
            "users" => $users
            ]);
    }

    public function update()
    {
        $request = request();
        $post_id = $request->post;
        $post = [
            "title"       => $request->title,
            "description" => $request->description,
            "user_id"     => $request->user_id,
        ];

        Post::find($post_id)->update($post);

        return redirect()->route("posts.index");
    }

    public function store()
    {
        $request = request();

        $post = [
            "title"       => $request->title,
            "description" => $request->description,
            "user_id"     => $request->user_id,
            "created_at"  => Carbon::now(),
        ];

        Post::create($post);

        return redirect()->route("posts.index");
    }

    public function destroy()
    {
        $request = request();
        
        $post_id = $request->post;
        Post::destroy($post_id);

        return redirect()->route("posts.index");
    }

    
}

