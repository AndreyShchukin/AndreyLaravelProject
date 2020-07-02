<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
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
        $comments = Comment::paginate(15);
        return view('posts/{id}', compact('comments'));
    }


    public function create()
    {
        //
    }


    public function store(StoreComment $request)
    {
        {
            $this->CommentServices->createComment(
                $request->validated(),
                $request->user()
            );

            return redirect()->route('posts');

        }
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
