<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
   // TODO: Implement __invoke() method.

   public function __invoke(Post $post)
   {
        return view('post.show', compact('post'));
   }
}


