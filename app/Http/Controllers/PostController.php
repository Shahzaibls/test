<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        //
        return view('post');
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
        $validatedData = $request->validate([
         'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
         'title' => 'required',
         'body' => 'required',
        ]);

        $save = new Post;

        if($request->file('image')){

            $name = mt_rand(10000, 99999).$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->move(public_path('/images'),$name);
            $save->post_image = '/images/'.$name;

        }else{
            $save->post_image = '';
        }
 
        // $name = mt_rand(10000, 99999).$request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->move(public_path('/images'),$name);

        $title = $request->title;
        $body = $request->body;
 
        // $save = new Post;

        $save->user_id = Auth::id();
        $save->title = $title;
        $save->body = $body;
        // $save->post_image = '/images/'.$name;
 
        $save->save();
 
        return redirect('/home')->with('status', 'Post Has been uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view("edit_post", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
         'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
         'title' => 'required',
         'body' => 'required',
        ]);

        $post = Post::find($request->post_id);
        
        if($request->file('image')){
            $post_image = Post::find($request->post_id);
            $old_path = $post_image->post_image;
            if (isset($old_path) && !empty($old_path)) {
                unlink(public_path($old_path));  
            }

            $name = mt_rand(10000, 99999).$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->move(public_path('/images'),$name);
            $post->post_image = '/images/'.$name;

        }
        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->move(public_path('/images'),$name);


        $title = $request->title;
        $body = $request->body;
 
        // $post = new Post;

        $post->user_id = Auth::id();
        $post->title = $title;
        $post->body = $body;
        // $post->post_image = '/images/'.$name;
        // echo '<pre>'; 
        // print_r($post); 
        // echo '</pre>'; 
        // exit;

 
        $post->save();
 
        return redirect('/home')->with('status', 'Post Has been uploaded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $post = Post()->comments->find($id);

        $post = Post::find($id);
        $old_path = $post->post_image;
        if (isset($old_path) && !empty($old_path)) {
            unlink(public_path($old_path));  
        }
        $post->delete();
        return redirect('/home')->with('status', 'Post Has been deleted');

    }
}
