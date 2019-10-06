@extends('layouts.app') @section('content')
<div class="container">
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
</div>
@endsection