<?php

use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Проверка способности модели создавать правильные публикации.
     *
     * @return void
     */
    public function test_a_post_can_be_created()
    {
    	// $user = factory(App\User::class)->create();
    	$user = factory(App\User::class)->create([
    		'name' => 'cho.chief',
    	]);

    	$this->actingAs($user);

    	$post = $user->posts()->create(['post' => 'Fuck U!']);
    	// $post = Post::create(['post' => 'Fuck U!');

    	$latest_post = Post::latest()->first();

    	$this->visit('/')->see($user->name);
    	$this->assertEquals('cho.chief', $user->name);

        $this->assertEquals($post->id, $latest_post->id);
        $this->assertEquals('Fuck U!', $latest_post->post);	

        $this->seeInDatabase('posts', ['id' => 1, 'post' => 'Fuck U!']);
    }
}
