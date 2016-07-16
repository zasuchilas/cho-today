<?php

namespace App\Repositories;

use App\User;
use App\Post;

class PostRepository
{
  
  /**
   * Получить все публикации заданного пользователя.
   *
   * @param  User  $user
   * @return Collection
   */
  public function forUser(User $user)
  {
    return Post::where('user_id', $user->id)
              ->orderBy('created_at', 'asc')
              ->get();
  }
}