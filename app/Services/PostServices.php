<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\Post\StorePost;
use App\Models\Comment;
use App\Models\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostServices {


    public function createPost($data, User $user, $request): Post
    {
        $post = new Post();
        $post->text = Arr::get($data, 'text');
        $post->user_id = $user->id;
        $path = $request->file('image')->store('uploads', 'public');
        $post->image = $path;
        $post->save();
        return $post;
    }

    public function getPosts(?User $user = null)
    {
        $posts =  Post::query()->with('likes')->orderBy('created_at', 'desc')->paginate(15);
        foreach ($posts as &$post) {
            $count = 0;
            $iLiked = false;

            foreach ($post['likes'] as $like) {
                $count++;
                if ($user && $iLiked === false && $like['user_id'] == $user->id) {
                    $iLiked = true;
                }
            }

            $post['likes'] = $count;
            $post['liked_by_me'] = $iLiked;
        }

        return $posts;
    }


    public function setLike(int $postId, User $user): bool
    {

        $like = DB::table('post_likes')
            ->where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();

        if (!is_null($like)) {
            DB::table('post_likes')
                ->where('user_id', $user->id)
                ->where('post_id', $postId)
                ->delete();

            return false;
        }

        DB::table('post_likes')
            ->insert([
            'user_id' => $user->id,
            'post_id' => $postId
        ]);

        return true;
    }

    public function popular_post()
    {
        $posts =  Post::query()->with('likes')->paginate(15);

    }




}
