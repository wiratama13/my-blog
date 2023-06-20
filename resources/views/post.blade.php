
@extends('layouts.main')
@section('container')
<article>

    <div class="container">
        <div class="row justify-content-center mb-1">
            <div class="col-md-8">
                <h1 class="mb-1">{{ $post->title }}</h1>
                <p>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

               @if ($post->image)
                <div style="max-height:350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category }}" class="img-fluid" alt="">
                @endif

                    <article>
                        {!! $post->body !!}
                    </article>

                <a href="/posts" class="text-decoration-none d-block mt-3">Back to posts</a>
            </div>
        </div>
    </div>


</article>
@endsection
