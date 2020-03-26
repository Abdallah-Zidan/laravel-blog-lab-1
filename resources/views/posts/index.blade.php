@extends ('layouts.app')

<link rel="stylesheet" href="css/index.css" />

@section('content')
<div class="container">
    <div class="row col-sm-12  ">
        <table class="table table-striped custab">
            <thead>
                <a href="{{ route('posts.create') }}" class="btn btn-primary "
                    ><b>+</b> Add New Post</a
                >
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                    <th colspan="3" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user? $post->user->name : "unknown"}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                   
                    <td class="text-center">
                        <a
                            class="btn btn-info "
                            href="{{route('posts.show' , ['post' => $post->id])}}"
                        >
                            View</a
                        >
                    </td>

                    <td class="text-center">
                        <a
                            class="btn btn-info "
                            href="{{route('posts.edit' , ['post' => $post->id])}}"
                        >
                            Edit</a
                        >
                    </td>

                    <td class="text-center">
                        <form method="POST"
                            action="{{route('posts.destroy' , ['post' => $post->id])}}"
                        >
                        @csrf 
                        @method("DELETE")
                        
                        <input
                            type="submit"
                            value="Delete"
                            name="delete"
                            class="btn btn-danger "
                        />
                        
                        </form>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
