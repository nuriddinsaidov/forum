<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_create_threads()
    {
        $this->withExceptionHandling()
            ->get('/threads/create')
            ->assertRedirect('/login');

        $this->post('/threads')
            ->assertRedirect('/login');

    }

    /** @test */
    function an_authenticated_user_can_create_new_forum_threads(){

        $this->signIn();

        $thread = make('App\Thread');

        $response = $this->post('/threads', $thread->toArray());

        $this->get($response->headers->get('location'))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /** @test */
   /* function a_thread_requires_a_title()
    {
        $this->withExceptionHandling()->signIn();

        $thread = make('App\Thread', ['title' => null]);
       // dd(session()->all());
         $this->post('/Threads',$thread->toArray())
             ->assertSessionHasErrors('title');
     //   $this-> ('title');
    }*/

    /** @test */
   /* function a_thread_requires_a_body()
    {

        $this->publishThread(['body' => null])
            ->assertSessionHasErrors('body');
    }*/

   /* public function publishThread($overrides = [])
    {
        $this->withExceptionHandling()->signIn();

        $thread = make('App\Thread', $overrides);
        var_dump($thread->toArray());
        return $this->post('/Threads',$thread->toArray());
    }*/
}
