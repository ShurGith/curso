<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(PostRequest $request)
    {
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('images'), $fileName);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image_url = $fileName;
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $post): View
    {
        $post = Post::find($post);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
       $post =  Post::find($post->id);
       if($post->image_url){
        Storage::delete( $post->image_url);
       }
       $post->delete();
        return redirect()->route('post.index')
        ->with('success','Post deleted successfully');
    }
}
