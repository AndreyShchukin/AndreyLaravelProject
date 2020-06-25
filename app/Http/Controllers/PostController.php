<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index():View
    {
        $posts = Post::paginate(5);
        return view('posts', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        $post->description->input('text');
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('posts');

    }

    public function store(Request $request)
    {

    }

    public function show(Post $post)
    {

    }

    public function edit(Post $post)
    {

    }

    public function update(Request $request, Post $post)
    {

    }

    public function destroy(Post $post)
    {

    }
}
