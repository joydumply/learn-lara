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
        <div class="mb-3">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-select">
                @foreach ($categories as  $category)
                    <option
                    {{ $category->id === $post->category_id ? 'selected' : ''}}
                    value="{{$category->id}}">{{$category->title}}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="tags">Tags</label>
            <select id="tags" name="tags[]" class="form-select" multiple aria-label="multiple select">
                @foreach ($tags as  $tag)
                    <option
                    @foreach ($post->tags as  $postTag)
                    {{ $tag->id == $postTag->id ? 'selected' : '' }}
                    @endforeach
                    value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>

      </form>
</div>

@endsection
