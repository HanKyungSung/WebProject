<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', '=', 'active')->paginate(15);
        return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Code will be here to store post.
        if (!Auth::check()) 
            return redirect()->intended('home');

        // Validate post data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        
        // Get the currently authenticated user...
        $user = Auth::user();

        // Get the currently authenticated user's ID...
        $id = Auth::id();

        Post::create([
            'content' => $request->content,
            'title' => $request->title,
            'user_id' => $id,
        ]);
        
        return redirect()->intended('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Request $request)
    {
        return view('post')->with([
            'post' => $post,
            'comments' => $post->comments,
            'page' => $request->input('page')
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
        $this->authorize('update', $post);
        
        return view('editPost')->with([
            'post' => $post,
            'comments' => $post->comments,
            'page' => $request->input('page')
            ]);
    }
    // Resource
    // https://www.findbestwebhosting.com/web-hosting-blog/index.php/how-to-use-summernote-wysiwyg-editor-with-laravel
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $content = $request->input('content');
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img)
        {
            $data = $img->getAttribute('src');
        dd($k, $data);
            list($data)= explode(',' , $data);
        dd($data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
dd($request->all(), $images);
        $post->update($request->all());
        $page = $request->input('page');

        return redirect("/post/$post->id/show?page=$page");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);

        $post->update([
            'status' => 'deleted'
        ]);

        if($request->input('page') == 'posts')
        {
            return redirect()->action('HomeController@index');
        }
        else if($request->input('page') == 'mypage')
        {
            return redirect()->action('MypageController@index');
        }
    }
}
