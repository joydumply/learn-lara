@extends('layouts.main')
@section('content')
<div>
    <div class="mb-3">
        <div>
            {{$post->title}} (#{{$post->id}})
        </div>
        <div>
            {{$post->content}}
        </div>
    </div>

    <a href="{{route('post.edit', $post)}}" class="btn btn-primary">Edit</a>
    <a href="{{route('post.index')}}" class="btn btn-secondary">Back</a>
    <form class="mt-3" action="{{route('post.delete', $post)}}" method="post">
        @csrf
        @method('delete')
        <button class="btn-danger btn" type="submit">Delete Post</button>
    </form>

</div>
@endsection
