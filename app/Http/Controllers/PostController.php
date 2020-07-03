<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePost;
use App\Models\Post;
use App\Services\PostServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use phpDocumentor\Reflection\Location;

class PostController extends Controller
{
    private $PostServices;

    public function __construct(PostServices $PostServices)
    {
        return $this->PostServices = $PostServices;
    }

    public function index():View
    {
        $posts = Post::paginate(15);
        return view('posts', compact('posts'));
    }

    public function create()
    {


    }

    public function store(StorePost $request)
    {
            $this->PostServices->createPost(
            $request->validated(),
            $request->user(),
            $request->file('image')->store('uploads', 'public')
        );

        return redirect()->route('posts');

    }

    public function show($id)
    {
        return view('post', ['post' => Post::findOrFail($id)]);

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
