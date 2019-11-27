@extends('layouts.app') @section('content')
<div class="container">
    @auth
        @if(Auth::user()->id == $post->user->id)
        <div class="row mb-2">
            <div class="d-flex col-12 justify-content-end">
                <button type="button" class="btn btn-success">Edit</button>
            </div>
        </div>
        @endif
    @endAuth
    <div class="row">
        <div class="col-12">
            <div class="card border-secondary mb-3">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body text-secondary">
                    <h6 class="card-title">{{ $post->user->full_name }}</h6>
                    <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
                </div>
            </div>
        </div>
        @auth
            @if(Auth::user()->id == $post->user->id)
            <div class="d-flex col-12 justify-content-end mt-1 mb-1">
                <form action="/post/{{ $post->id }}/delete?page={{ $page }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </div>
            @endif
        @endAuth
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