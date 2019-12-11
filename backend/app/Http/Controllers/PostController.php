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
     * Resource:
     * https://www.findbestwebhosting.com/web-hosting-blog/index.php/how-to-use-summernote-wysiwyg-editor-with-laravel
     * https://stackoverflow.com/questions/8218230/php-domdocument-loadhtml-not-encoding-utf-8-correctly
     * Stack:
     * Summernote
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Code will be here to store post.
        if (!Auth::check()) 
            return redirect()->intended('home');

        // Get the currently authenticated user...
        $user = Auth::user();

        // Validate post data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $content = $request->input('content');
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // Initially save the content
        $post = Post::create([
            'content' => $content,
            'title' => $request->get('title'),
            'user_id' => $user->id
        ]);
        
        foreach($images as $k => $img)
        {
            $data = $img->getAttribute('src');
            // check if the picture is already store in our database.
            if(count($result = explode(';', $data)) > 1)
            {
                // Seperate the data type and actual data.
                list($type, $data) = $result;
                // Remove base64 before ','
                list(,$data)= explode(',' , $data);
                // Decode the data
                $data = base64_decode($data);
                $image_name = time().$k.'.png';
                $path = public_path()."/upload/".$image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', "/upload/".$image_name);

                \App\File::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'file_name' => $image_name
                ]);
            }
        }
        // Because of the utf-8 encoding problem, the following code has been added.
        $content = utf8_decode($dom->saveHTML($dom->documentElement));
        // Update the content of th post after.
        $post->update([
            'content' => $content
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

    /**
     * Update the specified resource in storage.
     * 
     * Resource:
     * https://www.findbestwebhosting.com/web-hosting-blog/index.php/how-to-use-summernote-wysiwyg-editor-with-laravel
     * https://stackoverflow.com/questions/8218230/php-domdocument-loadhtml-not-encoding-utf-8-correctly
     * Stack:
     * Summernote
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
        libxml_use_internal_errors(true);
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img)
        {
            $data = $img->getAttribute('src');
            // check if the picture is already store in our database.
            if(count($result = explode(';', $data)) > 1)
            {
                // Seperate the data type and actual data.
                list($type, $data) = $result;
                // Remove base64 before ','
                list(,$data)= explode(',' , $data);
                // Decode the data
                $data = base64_decode($data);
                $image_name = time().$k.'.png';
                $path = public_path()."/upload/".$image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', "/upload/".$image_name);

                \App\File::create([
                    'user_id' => $post->user->id,
                    'post_id' => $post->id,
                    'file_name' => $image_name
                ]);
            }
        }
        // Because of the utf-8 encoding problem, the following code has been added.
        $content = utf8_decode($dom->saveHTML($dom->documentElement));
        $post->update([
            'title' => $request->get('title'),
            'content' => $content
        ]);
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
