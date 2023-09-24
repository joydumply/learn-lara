<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
   // TODO: Implement __invoke() method.

   public function __invoke(Post $post)
   {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post = $post->fresh(); //обновить данные (как рефреш на рабочем столе)
        // $post->tags()->attach(); // не подойдет для метода update
        $post->tags()->sync($tags); // этот подходит. синхронит значения. удаляет ненужные. добавляет новые

        return redirect()->route('post.show', $post);
   }
}


