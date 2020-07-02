<?php
namespace App\Services;


use App\Models\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class PostServices {

    public function createPost(array $data, User $user): Post
    {
        $post = new Post();
        $post->description = Arr::get($data, 'description');
        $post->user_id = $user->id;
        $post->save();
        return $post;
    }


}
