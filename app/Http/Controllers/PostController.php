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
        if($request->hasFile('file')){
            $file= Storage::putFile('public/images', $request->file);
            $fileData = str_replace('public/',"",$file);
        }

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image_url = $fileData;
        $post->save();

        return redirect()->route('post.index');
    }

    public function show( $post): View
    {
        $post = Post::find($post);
        return view('post.show', compact('post'));
    }

    public function edit($post): View
    {
        $post = Post::find($post);
        return view('post.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post = Post::find($post->id);
        $fileName = $post->image_url;
        if($request->hasFile('file')){
            unlink('storage/' . $post->image_url);
            $file= Storage::putFile('public/images', $request->file);
            $fileData = str_replace('public/',"",$file);
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image_url = $fileData;
        //$post->update($request->all());
        $post->save();
        return redirect()->route('post.index');
        //return dd($post);
    }

    public function destroy(Post $post): RedirectResponse
    {
       $post =  Post::find($post->id);
       if($post->image_url){
         unlink(public_path('images/'. $post->image_url));
       }
       $post->delete();
        return redirect()->route('post.index')
        ->with('success','Post deleted successfully');
    }
}
