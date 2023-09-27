<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends Controller
{

   public function __invoke(UpdateRequest $request, Post $post)
   {
        $data = $request->validated();

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post = $post->fresh(); //обновить данные (как рефреш на рабочем столе)
        // $post->tags()->attach(); // не подойдет для метода update
        $post->tags()->sync($tags); // этот подходит. синхронит значения. удаляет ненужные. добавляет новые

        return redirect()->route('post.show', $post);
   }
}


