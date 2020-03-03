<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['categories', 'user'])->get();
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = sprintf('thumnail_%s.jpg', random_int(1, 1000));
        if ($request->hasFile('thumbnail')) {
            $filename = $request->file('thumbnail')->storeAs('posts', $filename, 'public');
        } else {
            $filename = null;
        }

        $post = [
            'user_id' => 1,
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $filename,
            'slug' => $request->title,
        ];

        $post = Post::create($post);
        $post->categories()->attach($request->categories);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $filename = sprintf('thumnail_%s.jpg', random_int(1, 1000));
        if ($request->hasFile('thumbnail')) {
            $filename = $request->file('thumbnail')->storeAs('posts', $filename, 'public');
        } else {
            $filename = $post->thumbnail;
        }

        $post->user_id = 1;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumbnail = $filename;
        $post->slug = $request->title;
        if($post->save()) {
            $post->categories()->sync($request->categories);
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
