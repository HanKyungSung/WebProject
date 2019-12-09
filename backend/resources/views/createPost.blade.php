@extends('layouts.app') @section('content')
<script src="{{ asset('js/createPost.js') }}" defer></script>

<div class="container">
    <div class="alert alert-danger alert-dismissible" id="image-size-exceed" role="alert" style="display:none">
        <strong>Check the image size!</strong> Image size can't be exceed 1MB.
        <button type="button" class="close" id="close-alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="POST" action="/create-post">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">New Post</label>
            <input type="text" name = "title" class="form-control" placeholder="Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="hidden" name="user_id" class="form-control" value="">
            <textarea name="content" placeholder = "Content" class="form-control mb-3" id="summernote" rows="3"></textarea>
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection