<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController  extends Controller
{

   public function __invoke ()
   {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
   }
}


