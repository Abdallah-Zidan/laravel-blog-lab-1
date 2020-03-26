<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
   function index()
    {
        $posts =[
            [
                "title"=>"first post",
                "created_at"=>"12-5-2020"
            ],
            [
                "title"=>"second post",
                "created_at"=>"13-5-2020"
            ],
            [
                "title"=>"third post",
                "created_at"=>"14-5-2020"
            ],
        ];

        return view('posts',[
            "posts"=>$posts
            ]);
    }
}
