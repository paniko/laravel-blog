@extends('layouts.master')
@section('content')
    <h1>Stores</h1>
    <form method="get" action="/stores">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="City">
        <input class="typeahead" type="text" placeholder="Cities">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>
  @include('layouts.errors')

    </form>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>location</th>
        </tr>
      </thead>
    @foreach ($stores as $store)
      <tr>
        <td>{{$store->title}}</td>
        <td>{{$store->location}}</td>
      </tr>
    @endforeach
    </table>
@endsection
