<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return view('posts-index', ['posts' => $posts ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-blog-post-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('add-blog-post-form')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function storecomment(Request $request)
    {
        /*
        $comment = new Comment(['comment' => $request->comment]);
        $post = Post::find($request->postid);
        $post->comments()->save($comment);
        */
        $post = Post::find($request->postid);
        $post->comments()->create([
            'comment' => $request->comment,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
