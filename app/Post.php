<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Массово присваиваемые атрибуты.
     * 
     * @var array
     */
    protected $fillable = ['post'];

    /**
     * Получить пользователя - владельца данной записи.
     * 
     */
    public function user() {
    	return $this->belongsTo(User::class);
    }
}
