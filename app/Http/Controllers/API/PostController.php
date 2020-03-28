<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(
            Post::with('user')->paginate(5)
        );
    }

    public function show($post)
    {
        $post =  Post::find($post);

        if($post)
            return new PostResource($post);

        return ["error"=>"resource not found"];
    }

    public function store(PostRequest $request){
        $post = $request->only(["title","description"]);

        $post["user_id"]=Auth::id();
        
        $tags = explode(",",$request->tags);
        
        
        $image = $request->file('post_image');
       
        if($image){
           $post["post_image"] = $image;
        }
 
        $post = Post::create($post)->attachTags($tags);
        if($post) 
            return ["data"=>"success","error"=>""];
        return ["data"=>"" , "error"=>"couldn't create the post"];
    }
}
