@extends('layouts.main')

@section('container')
   <div class="row d-flex justify-content-center">
    <div class="col-lg-4">
         <main class="form-registration w-100 m-auto">
             <h1 class="h3 mb-3 fw-normal text-center">Form Register</h1>
    <form action="/register" method="POST">
        @csrf
     <div class="form-floating">
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </div>
    <div class="form-floating">
      <input type="text" class="form-control
      @error('name')
        is-invalid
      @enderror"
      id="name" name="name"
      placeholder="name" required value="{{ old('name') }}">
      <label for="name">Name</label>
      @error('name')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-floating">
      <input type="text" class="form-control
      @error('username')
        is-invalid
      @enderror"
      id="username" name="username"
      placeholder="username" required value="{{ old('usename') }}">
      <label for="username">Username</label>
      @error('username')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-floating">
      <input type="email" class="form-control
        @error('email')
        is-invalid
      @enderror"
      name="email" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
      <label for="email">Email address</label>
      @error('email')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

     <div class="form-floating">
      <input type="password" class="form-control
        @error('password')
        is-invalid
      @enderror"
      name="password" id="password" placeholder="name@example.com" required>
      <label for="password">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
  </form>
  <small class="d-block text-center mt-3">Have account?<a href="/login">Login</a></small>
</main>
    </div>
   </div>
@endsection

