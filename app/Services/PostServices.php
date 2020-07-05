<?php
namespace App\Services;


use App\Http\Requests\Post\StorePost;
use App\Models\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostServices {


    public function createPost(array $data, User $user, $image = null): Post
    {
        $posts = new Post();
        $posts->text = Arr::get($data, 'text');
        $posts->user_id = $user->id;
        $posts->save();
        return $posts;
    }

    public function getPosts(?User $user = null)
    {
        $posts =  Post::query()->with('likes')->paginate(15);
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


}
