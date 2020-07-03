<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePost;
use App\Models\Post;
use App\Services\PostServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function index(Request $request):View
    {
//        $posts = Post::paginate(15);
//        return view('posts', compact('posts'));

        return view('posts', ['posts' => $this->PostServices->getPosts($request->user())]);
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

    public function like(int $postId, Request $request)
    {
        if (!($user = $request->user())) {
            return response()->json(['error' => true, 'message' => "Unauth!"], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['status' => $this->PostServices->setLike($postId, $user)]);
    }

}
