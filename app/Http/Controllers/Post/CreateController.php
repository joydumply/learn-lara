<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
   // TODO: Implement __invoke() method.

   public function __invoke()
   {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories','tags'));
   }
}


