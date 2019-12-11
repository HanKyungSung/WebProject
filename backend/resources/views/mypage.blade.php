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
                            <td><a href=post/{{ $post->id }}/show>{{ Str::limit($post->title,10) }}</a></td>                           
                            <td>{{ Str::limit($post->content,50) }}</td>
                            <td>{{ $post->created_at->format('Y/m/d') }}</td>
                        </tr>
                       @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection         