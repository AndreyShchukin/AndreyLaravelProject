<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\CommentServices;
use App\Http\Requests\Comment\StoreComment;


class CommentController extends Controller
{
    private $CommentServices;

    public function __construct(CommentServices $CommentServices)
    {
        return $this->CommentServices = $CommentServices;
    }

    public function index():View
    {
        return view('posts/{id}', ['comments' => $this->CommentServices->getComments()]);

    }


    public function create()
    {

    }


    public function store(StoreComment $request)
    {
        $this->CommentServices->createComment(
            $request->validated(),
            $post = Post::find($request->get('post_id'))
        );

        return back();
    }

    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        //
    }
}
