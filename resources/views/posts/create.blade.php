@extends ("layouts.app"); @section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Create Post</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form
                method="POST"
                enctype="multipart/form-data"
                action="{{ route('posts.store') }}"
            >
                @csrf

                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" class="form-control" name="title" />
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea
                        rows="5"
                        class="form-control"
                        name="description"
                    ></textarea>
                </div>

                <div class="form-group mb-5">
                    <label
                        for="post_image"
                        class="col-md-4 col-form-label text-md-right"
                        >Profile Image</label
                    >

                    <input
                        id="profile_image"
                        type="file"
                        class="form-control"
                        name="post_image"
                    />
                </div>

                <div class="form-group mb-5">
                    <label for="user_id">Post Creator</label>
                    <select name="user_id" class="form-control">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                    <a
                        class="btn btn-default"
                        href="{{ route('posts.index') }}"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
