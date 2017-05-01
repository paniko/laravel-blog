@extends('layouts.master')
@section('content')
    <h1>Products</h1>
    @foreach ($products as $product)
      @include('products.product')
    @endforeach


    <nav class="blog-pagination">
      <a class="btn btn-outline-primary" href="#">Older</a>
      <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>
@endsection
