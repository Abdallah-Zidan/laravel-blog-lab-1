@extends ('layouts.app')
<link rel="stylesheet" href="css/show.css" />
@section('content')
<div class="container">
    <div class="card m-5 w-70">
        <div class="card-header">
            Post Info
        </div>
        @if ($post->post_image)
            <img src="{{$post->post_image}}" class="card-img-top " alt="image">
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
