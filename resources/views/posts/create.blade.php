@extends ("layouts.app");

@section('content')

<div class="container">
	<div class="row">
	    
	    <div class="col-sm-12">
	        
    		<h1>Create post</h1>
    		
    		<form method="POST" action="{{route('posts.store')}}">
            @csrf

    		    <div class="form-group">
    		        <label for="title">Title </label>
    		        <input type="text" class="form-control" name="title" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea rows="5" class="form-control" name="description" ></textarea>
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
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div>
    		    
    		</form>
		</div>
		
	</div>
</div>
@endsection