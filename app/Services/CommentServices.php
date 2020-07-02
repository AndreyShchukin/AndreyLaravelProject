<?php
namespace App\Services;


use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class CommentServices {

    public function createComment(array $data, User $user): Comment
    {
        $comment = new Comment();
        $comment->text = Arr::get($data, 'text');
        $comment->user_id = $user->id;
        $comment->save();
        return $comment;
    }


}
