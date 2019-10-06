@extends('layouts.app') @section('content')
<div class="container d-flex flex-column">
    <div class="row-container d-flex">
        <div class="bg-white border border-black m-1">
            <div class="table_wrapper">
                <table class="table table-sm">
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
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
        <div class="bg-white border border-black m-1">
            <div class="table_wrapper">
                <table class="table table-sm">
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
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
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