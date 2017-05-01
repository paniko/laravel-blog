@extends('layouts.master')

@section('content')
  <h1>Register</h1>
  <hr>

  <form action="/register" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" value="" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" value="" class="form-control">
    </div>
    <div class="form-group">
      <label for="password_confirmation">Password confirm:</label>
      <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" value="Register" class="btn btn-primary" />
    </div>
    <div class="form-group">
      @include('layouts.errors')
    </div>
  </form>
@endsection
