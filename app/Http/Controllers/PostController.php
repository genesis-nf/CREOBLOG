<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]); 
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $data['author_id'] = 1;

        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->title = $data['title'];
        $post->body = $data['body'];

        $post->author_id = 1;
        $post->save();

        return redirect()->route('posts.show', $post->id);
    }  

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }


}
