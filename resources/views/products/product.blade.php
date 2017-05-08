<div class="blog-post">
  <h2 class="blog-post-title">
    <a href="/products/{{$product->id}}">
      {{$product->title}}
    </a>
  </h2>
  <p class="blog-post-meta">
    @if(!empty($product->user->name))
    {{$product->user->name}}
    @endif on
    @if(!empty( $product->created_at ))
    {{ $product->created_at->toFormattedDateString() }}
    @endif
  </p>
  <p>{{$product->description}}</p>

</div><!-- /.blog-post -->
