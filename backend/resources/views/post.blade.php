@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div id="post" class="col-12">
            @csrf
            <div class="card border-secondary mb-3">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="mr-auto">
                            {{ $post->title }}
                        </div>
                        @auth
                            @if(Auth::user()->id == $post->user->id || Auth::user()->auth_level <= 2)
                                <div class="px-2">
                                    <a href="/post/{{ $post->id }}/edit?page={{ $page }}">Edit</a>
                                </div>
                                <div class="px-2">
                                    <a href="/post/{{ $post->id }}/delete?page={{ $page }}">Delete</a>
                                </div>
                            @endif
                        @endAuth
                    </div>
                </div>
                <div class="card-header">{{ $post->user->full_name }}</div>
                <div class="card-body text-secondary">
                    <!-- <h6 class="card-title">{{ $post->user->full_name }}</h6> -->
                    <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
                </div>
            </div>
        </div>
        @foreach($comments as $comment)     
        <div class="col-12">
            <div class="card border-secondary mb-3">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="mr-auto">
                            {{ $comment->user->full_name }}
                        </div>
                        @auth
                            @if(Auth::user()->id == $comment->user_id || Auth::user()->auth_level <= 2)
                                <div class="px-2">
                                    <a href="/comment/{{ $comment->id }}/edit?page={{ $page }}">Edit</a>
                                </div>
                                <div class="px-2">
                                    <a href="/comment/{{ $comment->id }}/delete?page={{ $page }}">Delete</a>
                                </div>
                            @endif
                        @endAuth
                    </div>
                </div>
                <div class="card-body text-secondary">
                    <p class="card-text">{!! nl2br(e($comment->comment)) !!}</p>
                </div>
            </div>
        </div>
        @endforeach
        @auth
        <div class="col-12">
            <form method="POST" action="/create-comment?page={{ $page }}">
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