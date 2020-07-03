<?php
namespace App\Services;


use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class CommentServices {

    public function createComment(array $data): Comment
    {
        $comment = new Comment();
        $comment->text = Arr::get($data, 'text');
        $comment->save();
        return $comment;
    }


}
