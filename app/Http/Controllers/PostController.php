<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();        
        return view('posts.index', ['posts' => $posts])->with('success', 'Posts recuperados exitosamente.');
    
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'body' => 'required',
            'image_data' => 'nullable|image|max:2048',
        ]);

        $data['author_id'] = 1;

        if ($request->hasFile('image_data')) {
            $imagePath = $request->file('image_data')->store('public/images');
            $data['image_data'] = $imagePath;
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Publicación creada exitosamente.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }    

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post, 'subtitle' => $post->subtitle]);
    }       

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'body' => 'required',
            'image_data' => 'nullable|image|max:2048',
        ]);

        $post->title = $data['title'];
        $post->subtitle = $data['subtitle'];
        $post->body = $data['body'];

        
        if ($request->hasFile('image_data')) {
            Storage::delete($post->image_data);
            $imagePath = $request->file('image_data')->store('public/images');
            $post->image_data = $imagePath;
        }  

        $post->author_id = 1;
        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Publicación actualizada exitosamente.');
    }  

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Publicación eliminada exitosamente.');
    }


}
