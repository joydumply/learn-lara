<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags); //правильный способ связки. Обратить внимание на model Post.php - объявление связи один ко многим. без неё не работает

        return redirect()->route('post.index');
   }
}


