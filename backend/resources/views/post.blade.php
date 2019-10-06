@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card border-secondary mb-3">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body text-secondary">
                    <h6 class="card-title">{{ $post->user->full_name }}</h6>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        </div>
        @foreach($comments as $comment)     
        <div class="col-12">
            <div class="card border-secondary mb-3">
                <div class="card-header">{{ $comment->user->full_name }}</div>
                <div class="card-body text-secondary">
                    <p class="card-text">{{ $comment->comment }}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12">
            <form method="POST" action="/create-comment">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <input type="hidden" name="post_id" class="form-control" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" class="form-control" value="{{ $post->user->id }}">
                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection