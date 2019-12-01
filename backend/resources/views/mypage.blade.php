@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="bg-white border border-black m-1">
            <div class="table_wrapper">
                <table class="table table-sm">
                <tr>
                    <td>ID</td>
                    <td>email</td>
                    <td>first name</td>
                    <td>last name</td>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
        <div class="bg-white border border-black m-1">
            <div class="table_wrapper">
                <table class="table table-sm">
                    <thead>                        
                        <th>제목</th>
                        <th>날짜</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>                            
                            <td><a href="post/{{ $post->id }}/show?page=mypage">{{ $post->title }}</a></td>                           
                            <td>{{ $post->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection            