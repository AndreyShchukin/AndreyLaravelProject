<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
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


    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->text = $request->get('text');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

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
