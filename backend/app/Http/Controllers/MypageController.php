<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
    
class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Code will be here to store post.
        if (!Auth::check()) 
        return redirect()->intended('home');
        // Get the currently authenticated user...
        $user = Auth::user();
        // Get the currently authenticated user's ID...
        $id = Auth::id();

        //$users = DB::select('select * from users where id = :id', ['id' => $id]);
 
        //$post = \App\Post::where('user_id = ?', $id);
        //return dd($post);
        // $post = \App\Post::find(1);
        $post = $user->posts()->get();//DB::select('select * from posts where user_id = :id', ['id' => $id]);
        // $comments = $post->comments;

        // return view('post')->with([
        //     'post' => $post,
        //     'comments' => $comments
        //     ]);

        return view('mypage')->with([
            'posts' => $post,
            'user' => $user
            ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
