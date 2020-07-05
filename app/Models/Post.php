<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
  protected $table = "posts";

  public function comments(): HasMany
  {
      return $this->hasMany('App\Models\Comment');

  }
  public function likes(): HasMany
  {
      return $this->hasMany(PostLike::class);

  }


}


