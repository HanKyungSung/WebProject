@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="table_wrapper">
                <table class="table table-sm table-striped">
                    <thead>
                        <th width=10%>제목</th>
                        <th>요약</th>
                        <th width=10%>날짜</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>                            
<<<<<<< HEAD
                            <td><a href=post/{{ $post->id }}/show>{{ Str::limit($post->title,10) }}</a></td>                           
                            <td>{{ Str::limit($post->content,50) }}</td>
                            <td>{{ $post->created_at->format('Y/m/d') }}</td>
=======
                            <td><a href="post/{{ $post->id }}/show?page=mypage">{{ $post->title }}</a></td>                           
                            <td>{{ $post->created_at }}</td>
>>>>>>> e45869855a3b4593905b26e92ecc4a372aecb1a7
                        </tr>
                       @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection         