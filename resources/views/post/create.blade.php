@extends('layouts.main')
@section('content')

<div>

    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Create Post</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Content</label>
            <textarea type="text" class="form-control" name="content" id="content" placeholder="Content"></textarea>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>
        
      </form>
</div>

@endsection
