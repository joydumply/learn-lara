<?php
namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data){
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);

        $post->tags()->attach($tags); //правильный способ связки. Обратить внимание на model Post.php - объявление связи один ко многим. без неё не работает
    }

    public function update($post, $data){
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post = $post->fresh(); //обновить данные (как рефреш на рабочем столе)
        // $post->tags()->attach(); // не подойдет для метода update
        $post->tags()->sync($tags); // этот подходит. синхронит значения. удаляет ненужные. добавляет новые
    }

    public function destroy($post){
        $post->delete();
    }
}

