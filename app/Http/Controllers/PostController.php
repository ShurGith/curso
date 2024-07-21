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
        $fileData="";
        if($request->hasFile('image_url')){
            $file= Storage::putFile('public/images', $request->image_url);
            $fileData = str_replace('public/images/',"",$file);
        }

        $entrada = new Post;
        $entrada->title = $request->title;
        $entrada->body = $request->body;
        $entrada->image_url = $fileData;
        $entrada->save();

        return redirect()->route('post.index')
        ->with('success','Post CREADO successfully');
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
        $fileData = $post->image_url ;
        if($request->hasFile('image_url')){
             if($post->image_url){
                 unlink('storage/images/' . $post->image_url);
             }
            $file= Storage::putFile('public/images', $request->image_url);
            $fileData = str_replace('public/images/',"",$file);
        }

        $post->update($request->all());
        $post->image_url = $fileData;
        $post->save();
        return redirect()->route('post.index')
        ->with('success','Post ACTUALIZADO successfully');
    }

    public function destroy(Post $post): RedirectResponse
    {
       $post =  Post::find($post->id);
       if($post->image_url){
         unlink(public_path('storage/images/'. $post->image_url));
       }
       $post->delete();
        return redirect()->route('post.index')
        ->with('borrado','Post BORRADO successfully');
    }
}
