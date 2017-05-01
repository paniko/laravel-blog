<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Attachements;

class AttachementsController extends Controller
{
  public function create(Product $product){
    return view('attachements.create', compact('product'));
  }
}
