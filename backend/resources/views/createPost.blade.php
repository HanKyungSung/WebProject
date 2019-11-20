@extends('layouts.app') @section('content')
<div class="container">
    <!-- Code will be here. -->

     <form method="POST" action="/create-post">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">New Post</label>
                    <input type="text" name = "title" class="form-control" placeholder="Title" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <input type="hidden" name="user_id" class="form-control" value="">
                    <textarea name="content" placeholder = "Content" class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>
</div>
@endsection