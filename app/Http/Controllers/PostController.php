<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;



class PostController extends Controller
{

    /**
     * Экземпляр PostRepository.
     *
     * @var PostRepository
     */
    protected $posts;

	/**
	 * Создание нового экземпляра контроллера.
	 * 
     * @param  PostRepository  $posts
	 * @return void
	 */
    public function __construct(PostRepository $posts) 
    {
    	$this->middleware('auth');

        $this->posts = $posts;
    }

	/**
	 * Отображение списка всех задач пользователя.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
    public function index(Request $request) 
    {
    	// $posts = Post::where('user_id', $request->user()->id)->get();
        $posts = $this->posts->forUser($request->user());

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

    /**
     * Уничтожить заданную публикацию.
     *
     * @param  Request $request
     * @param  Post $post
     * @return Response
     */
    public function destroy(Request $request, Post $post)
    {
        $this->authorize('destroy', $post);

        $post->delete();

        return redirect('/posts');
    }

}
