<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        $comment->user_id = \Auth::user()->id;
        $comment->save();
        
        $post = \App\Post::find($request->post_id);
        $comments = $post->comments;

        return redirect()->action('PostController@show', [
            'post' => $post,
            'page' => $request->input('page')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment, Request $request)
    {
        $post = $comment->post;

        return view('editComment', [
            'post' => $post,
            'comments' => $post->comments,
            'target_comment' => $comment,
            'page' => $request->input('page')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        $post = $comment->post;
        
        return redirect()->action('PostController@show', [
            'post' => $post,
            'page' => $request->input('page')
        ]);

        return view('post', [
            'post' => $post,
            'comments' => $post->comments,
            'page' => $request->input('page')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, Request $request)
    {
        $comment->update([
            'status' => 'deleted'
        ]);
        $post = $comment->post;

        return view('post', [
            'post' => $post,
            'comments' => $post->comments,
            'page' => $request->input('page')
        ]);
    }
}
