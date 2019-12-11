@extends('layouts.app') @section('content')
<script src="{{ asset('js/createPost.js') }}" defer></script>

<div class="container">
    <div class="alert alert-danger alert-dismissible" id="image-size-exceed" role="alert" style="display:none">
        <strong>Check the image size!</strong> Image size can't be exceed 3MB.
        <button type="button" class="close" id="close-alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="/post/{{ $post->id }}/update">
            @method('put')
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Edit Post</label>
                    <input type="hidden" name="user_id" class="form-control" value="{{ $post->user_id }}">
                    <input type="hidden" name="page" class="form-control" value="{{ $page }}">
                    <input type="text" name="title" class="form-control mb-2" placeholder="{{ $post->title }}" value="{{ $post->title }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <textarea name="content" placeholder="{{ $post->content }}" class="form-control mb-3" id="summernote" rows="3">{{ $post->content }}</textarea>
                    <div class="mt-2">
                        <input class="btn btn-primary" type="submit" value="Save Change">
                        <a href="/post/{{ $post->id }}/show?page={{ $page }}" class="btn btn-success" role="button">Cancel</a>
                    </div>
                </div>
                
            </form>
        </div>
        @foreach($comments as $comment)     
        <div class="col-12">
            <div class="card border-secondary mb-3">
                <div class="card-header">{{ $comment->user->full_name }}</div>
                <div class="card-body text-secondary">
                    <p class="card-text">{!! nl2br(e($comment->comment)) !!}</p>
                </div>
            </div>
        </div>
        @endforeach
        @auth
        <div class="col-12">
            <form method="POST" action="/create-comment">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <input type="hidden" name="post_id" class="form-control" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" class="form-control" value="{{ $post->user->id }}">
                    <textarea name="comment" class="form-control mb-3" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>
        </div>
        @endauth
        @guest
        <div class="col-12">
            <h5>Please login to make a comment</h5>
        </div>
        @endguest
    </div>
</div>
@endsection