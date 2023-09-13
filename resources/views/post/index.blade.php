@extends('layouts.main')
@section('content')
    <div class="posts_wrap">
        <div>
            <a class="btn btn-success mt-3 mb-3" href="{{route('post.create')}}">Create Post</a>
        </div>
        @foreach ($posts as  $post)
        <div class="post">
            <a href="{{route('post.show', $post->id)}}">
                <div class="post_title">
                    {{$post->id}}: {{ $post->title }}
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
