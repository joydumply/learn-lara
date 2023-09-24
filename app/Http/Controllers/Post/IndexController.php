<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController  extends Controller
{
   // TODO: Implement __invoke() method.

   public function __invoke ()
   {
        $posts = Post::all();
        return view('post.index', compact('posts'));
   }
}


