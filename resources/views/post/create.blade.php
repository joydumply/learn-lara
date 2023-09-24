@extends('layouts.main')
@section('content')

<div>

    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Create Post</label>
          <input value="{{old('title')}}" type="text" class="form-control" name="title" id="title" placeholder="Title">
          @error('title')
          <p class="error">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="content" id="content" placeholder="Content">{{old('content')}}</textarea>
            @error('content')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input value="{{old('image')}}" type="text" class="form-control" name="image" id="image" placeholder="image">
            @error('image')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categorySelect">Category</label>
            <select id="categorySelect" name="category_id" class="form-select">
                @foreach ($categories as  $category)
                    <option
                    {{ old('category_id') == $category->id ? 'selected' : ''}}
                    value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="tags">Tags</label>
            <select id="tags" name="tags[]" class="form-select" multiple aria-label="multiple select">
                @foreach ($tags as  $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>

      </form>
</div>

@endsection
