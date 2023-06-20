 @extends('dashboard.layouts.main')

 @section('container')
 <div class="container">
        <div class="row my-3 justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-1">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-success my-3">
                    <span data-feather="arrow-left"></span>
                    Back to all my posts
                </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
                    <span data-feather="edit"></span>
                    Edit
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('are you sure ?')">delete<span data-feather="x-circle"></button>
                </form>
                @if ($post->image)
                <div style="max-height:350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid my-2" alt="">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category }}" class="img-fluid my-2" alt="">
                @endif

                    <article>
                        {!! $post->body !!}
                    </article>

                <a href="/dashboard/posts" class="text-decoration-none d-block mt-3">Back to posts</a>
            </div>
        </div>
    </div>


@endsection
