<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

        return view('post.create');
    }

    public function store() {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post) {


        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        $post->update($data);

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


