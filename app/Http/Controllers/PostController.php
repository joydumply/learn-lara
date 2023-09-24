<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();



        return view('post.index', compact('posts'));

    }

    public function create(){
        // $postsArr = [
        //     [
        //         'title' => 'title created from controller 1',
        //         'content' => 'lorem ipsum',
        //         'image' => 'image.png',
        //         'likes' => 0,
        //         'is_published' => 1
        //     ],

        //     [
        //         'title' => 'title created from controller 2',
        //         'content' => 'lorem ipsum',
        //         'image' => 'image.png',
        //         'likes' => 0,
        //         'is_published' => 1
        //     ],
        // ];

        // foreach($postsArr as $post){
        //     Post::create($post);
        // }

        // dd('created');

        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories','tags'));
    }

    public function store() {

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

        // foreach ($tags as $tag){
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id
        //     ]);
        // } // неправильный способ связки постов с тегами в таблице PostTag

        $post->tags()->attach($tags); //правильный способ связки. Обратить внимание на model Post.php - объявление связи один ко многим. без неё не работает

        return redirect()->route('post.index');
    }

    public function show(Post $post) {


        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();


        return view('post.edit', compact('post','categories', 'tags'));
    }

    public function update(Post $post) {
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

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete() {
        $post = Post::find(6);
        $post->delete();

        dd('deleted');
    }

    public function firstOrCreate() {


        // $post = Post::find(1);

        $anotherPost = [
                'title' => 'test firstOrCreate Post',
                'content' => 'some lorem ipsum',
                'image' => 'image.png',
                'likes' => 0,
                'is_published' => 1
            ];

            $post = Post::firstOrCreate(['title' => 'test firstOrCreate Post'], $anotherPost);

            dump($post->content);

        dd('finished');
    }
    public function updateOrCreate() {

        $anotherPost = [
            'title' => 'test updateOrCreate Post2',
            'content' => 'some update lorem ipsum',
            'image' => 'image.png',
            'likes' => 410,
            'is_published' => 1
        ];

        $post = Post::updateOrCreate(['title' => 'test firstOrCreate Post'], $anotherPost);

        dump($post);

        dd('updateOrCreate finished');
    }
}


