<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $link_types = collect([
    	['icon' => '', 'name' => 'facebook', 'path' => 'https://facebook.com/'],
    	['icon' => '', 'name' => 'vk', 'path' => 'https://vk.com/'],
    	['icon' => '', 'name' => 'instagram', 'path' => 'https://instagram.com/'],
    	['icon' => '', 'name' => 'youtube', 'path' => 'https://youtube.com/'],
    ]);

}
