@extends("dashboard.layouts.main")

@section('container')

 <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title')
            is-invalid
        @enderror" name="title" id="title" autofocus required value="{{ old('title', $post->title) }}">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug')
            is-invalid
        @enderror" name="slug" id="slug" required value="{{ old('slug', $post->slug) }}">
        @error('slug')
            {{ $message }}
        @enderror
    </div>

    <div class="mb-3">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category_id">
      @foreach ($categories as $category)
      @if (old('category_id', $post->category_id) == $category->id)
         <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
      @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endif
      @endforeach
    </select>

    </div>
   <div class="mb-3">
        <label for="image" class="form-label">File image</label>
        <input type="hidden" name="oldImage" id="" value="{{ $post->image }}">
        @if ($post->image)
              <img src="{{ asset('storage/' . $post->image) }}"class="img-preview img-fluid col-sm-3 mb-3 d-block" alt="">
        @else
        <img class="img-preview img-fluid col-sm-3 mb-3 d-block" alt="">
        @endif
        <input class="form-control  @error('image')
        is-invalid
        @enderror" type="file" id="image" name="image"
        onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
        <trix-editor input="body"></trix-editor>
    </div>
        <button type="submit" class="btn btn-primary">Update Posts</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' +title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });

    function previewImage() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display ='block';

        const OfReader = new FileReader();
        OfReader.readAsDataURL(image.files[0]);

        OfReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection
