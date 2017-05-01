<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Comment;

class CommentsController extends Controller
{
  public function store(Product $product){
    $this->validate(request(),[
      'body' => 'required|min:2',
    ]);
    $product->addComment(request('body'));

    // $comment = new Comment;
    // Comment::create([
    //   'products_id' => $product->id,
    //   'body' => request('body')
    // ]);
    return back();

  }
}
