@extends ('layouts.app')
<link rel="stylesheet" href="css/show.css" />
@section('content')
<div class="container">
    <div class="card m-5 w-70">
        <div class="card-header">
            Post Info
        </div>
        @if ($post->post_image)
        <img src="{{$post->post_image}}" class="card-img-top " alt="image" />
        @endif
        <div class="card-body">
            <h5 class="card-title">Title :- {{$post->title}}</h5>
            <h6>Description:-</h6>
            <p class="card-text">
                {{ $post->description}}
            </p>
            <h6>Created At:- {{$post->human_readable_date}}</h6>
        </div>
    </div>

    <h3>Comments</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <div class="form-group">
            <label for="body">Comment</label>
            <textarea rows="5" class="form-control" name="body"> </textarea>
        </div>
        <input type="hidden" name="post_id" value="{{$post->id}}" />
        <input type="submit" value="Send" name="send" />
    </form>

    @forelse ($post->comments as $comment)
        <p>@ {{$comment->created_at}}</p>
        <h5>{{ $comment->user->name }} </h5>
        <p>{{ $comment->body }}</p>
        <hr />
    @empty
    <p>This post has no comments</p>
    @endforelse

    <div class="card m-5">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h6>Name :- {{$post->user->name}}</h6>
            <h6>Email :- {{$post->user->email}}</h6>
            <h6>Created At :- {{$post->user->created_at}}</h6>
        </div>
    </div>
</div>
@endsection
