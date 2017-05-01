@extends('layouts.master')

@section('content')
  <h1>Create product</h1>
  <hr>

  <form method="post" action="/products">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="publish"> Publish
      </label>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
@include('layouts.errors')
@endsection
