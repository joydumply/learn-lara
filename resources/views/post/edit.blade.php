@extends('layouts.main')
@section('content')

<div>

    <form action="{{route('post.update', $post)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
          <label for="title" class="form-label">Edit Post</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="content" id="content" placeholder="Content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="image" value="{{$post->image}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>

      </form>
</div>

@endsection
