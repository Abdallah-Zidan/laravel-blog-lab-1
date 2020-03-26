<div
    class="modal fade"
    id="deleteModal{{ $post->id }}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Delete a post
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 style="color:red;">
                    are you sure you want to delete that post?
                </h3>
                <br />
                <p>note that it will be deleted permanently.</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                <form method="POST"
                            action="{{route('posts.destroy' , ['post' => $post->id])}}"
                        >
                        @csrf 
                        @method("DELETE")
                        
                        <input
                            type="submit"
                            value="Sure"
                            name="delete"
                            class="btn btn-danger "
                        />
                        
                        </form>
            </div>
        </div>
    </div>
</div>
