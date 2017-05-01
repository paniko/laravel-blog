@extends('layouts.master')
@section('content')
    <h1>Languages</h1>

    @foreach ($languages as $language)
      <li>{{$post->name}}</li>
    @endforeach


@endsection
