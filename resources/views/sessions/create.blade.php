@extends('layouts.master')

@section('content')
  <h1>Login</h1>
  <hr>

  <form action="/login" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
      <input type="submit" value="Login" class="btn btn-primary" />
       <a href="{{ url('/login/google') }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
    </div>
    <div class="form-group">
      @include('layouts.errors')
    </div>
  </form>
@endsection
