<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function store(CommentRequest $request)
    {
        $post = Post::find($request->post_id);
        $comment = $request->only('body','post_id');
        $comment["user_id"] =Auth::id();
        Comment::create($comment);
        return redirect()->route('posts.show', $post->id);
    }

    
}
