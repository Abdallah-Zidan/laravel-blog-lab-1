@extends ("layouts.app");

@section('content')

<div class="container">
	<div class="row">
	    
	    <div class="col-sm-12">
	        
    		<h1>Edit Post</h1>
			@if ($errors->any())
    			<div class="alert alert-danger">
        			<ul>
            			@foreach ($errors->all() as $error)
                			<li>{{ $error }}</li>
           				 @endforeach
        			</ul>
    			</div>
			@endif
    		
    		<form method="POST"  enctype="multipart/form-data" action="{{route('posts.update' , ['post' => $post->id])}}">
            @csrf
            @method('PUT')
    		    <div class="form-group">
    		        <label for="title">Title </label>
    		        <input type="text" value="{{$post->title}}"
                         class="form-control" name="title" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea rows="5" class="form-control" name="description" >
                    {{$post->description}}
                    </textarea>
    		    </div>

    		      <div class="form-group mb-5">
                    <label
                        for="post_image"
                        class="col-md-4 col-form-label "
						
                        >
						@if ($post->post_image)
							<img src="{{  $post->post_image }}" width="200" 
							height="200" style="pointer-events: none "/>
						@else
							Post Image
						@endif
						</label
                    >
					<br>
                    <input
                        id="post_image"
                        type="file"
                        
                        name="post_image"
						value ="{{$post->post_image}}"
                    />
                </div>

                 <div class="form-group mb-5">
                    <label for="user_id">Post Creator</label>
                    <select name="user_id" class="form-control">
							@foreach($users as $user) 
							@if ($user->id == $post->user->id)
								<option value="{{$user->id}}" selected>{{$user->name}}</option>
							@else
                            	<option value="{{$user->id}}">{{$user->name}}</option>
							@endif 
                            @endforeach
                    </select>
                </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Update
    		        </button>
    		        <a class="btn btn-default" href="{{route('posts.index')}}">
    		            Cancel
    		        </a>
    		    </div>
    		    
    		</form>
		</div>
		
	</div>
</div>
@endsection