@extends('layouts.app') @section('content')
<div class="container">
    <div class="d-flex justify-content-end">
        @auth
        <a href="/create-post-form" class="btn btn-primary mb-2" role="button">Create Post</a>
        @endauth
        @guest
        <a data-toggle="modal" data-target="#askLoginModel" class="btn btn-primary mb-2" role="button">Create Post</a>
        @endguest
    </div>
    <div class="row">
        <div class="col">
            <div class="table_wrapper">
                <table class="table table-sm table-striped">
                    <thead>
                        <th>#</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>날짜</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><a href="/post/{{ $post->id }}/show">{{ $post->title }}</a></td>
                            <td>{{ $post->user->full_name }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="askLoginModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forgot to login?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please login to create a post!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection