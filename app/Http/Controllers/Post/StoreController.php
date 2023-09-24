<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
   // TODO: Implement __invoke() method.

   public function __invoke()
   {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags); //правильный способ связки. Обратить внимание на model Post.php - объявление связи один ко многим. без неё не работает

        return redirect()->route('post.index');
   }
}


