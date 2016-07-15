<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostController extends Controller
{

	/**
	 * Создание нового экземпляра контроллера.
	 * 
	 * @return void
	 */
    public function __construct() 
    {
    	$this->middleware('auth');
    }

	/**
	 * Отображение списка всех задач пользователя.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
    public function index(Request $request) 
    {
    	$posts = Post::where('user_id', $request->user()->id)->get();

    	return view('posts.index', [
    		'posts' => $posts,
    	]);
    }

    /**
     * Создание новой задачи.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'post' => 'required|max:255',
    	]);

    	$request->user()->posts()->create([
    		'post' => $request->post,
    	]);

    	return redirect('/posts');

    }
}
