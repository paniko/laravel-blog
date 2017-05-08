@extends('layouts.master')
@section('content')
    <h1>{{$product->title}}</h1>
    {{$product->description}}
    {{$product->language_id}}

    <hr>
    @if(count($product->comments))
    <div class="comments">
      <ul class="list-group">
      @foreach($product->comments as $comment)
        <li class="list-group-item">
          <strong>{{$comment->created_at->diffForHumans()}}:</strong>&nbsp;
          {{$comment->body}}
        </li>
      @endforeach
      </ul>
    </div>
    @endif
    <hr>
    {{--create a form insert comments--}}
    <div class="card">
      <div class="card-block">
        <form action="/products/{{$product->id}}/comments" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <textarea name="body" class="form-control" placeholder="Inserisci il tuo commento"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="button" value="Inserisci"/>
          </div>
        </form>
      </div>
    </div>
    @include('layouts.errors')
@endsection
