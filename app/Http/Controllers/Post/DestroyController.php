<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class DestroyController extends BaseController
{
   // TODO: Implement __invoke() method.

   public function __invoke(Post $post)
   {
        $this->service->destroy($post);
        return redirect()->route('post.index');
   }
}


