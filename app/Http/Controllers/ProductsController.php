<?php

namespace App\Http\Controllers;

use App\Product;
use App\Media;
//use App\Repositories\Product;

class ProductsController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except(['index','show']);
    }

    public function index(){

      //$products = $product->all();

      $products = Product::latest()
      ->filter(request(['month','year']))
      ->get();

      //$archives = Products::archives();

      return view('products.index', compact('products'));
    }

    public function show(Product $product){ //Products::find(wildcards)
      return view('products.show', compact('product'));
    }

    public function create(){
      return view('products.create');
    }

    public function store(){

      $this->validate(request(),[

        'title'       => 'required',

        'description' => 'required',

      ]);

      $product = new Product;

      $product->title = request('title');
      $product->description = request('description');
      //$product->user_id = auth()->id();
      $product->publish = request('publish') == null ? false : true;
      //dd($product);
      auth()->user()->publish($product);


      // $product = new Products;
      //
      // $product->title = request('title');
      // $product->description = request('description');
      // $product->user_id = auth()->id();
      // $product->publish = request('publish') == null ? false : true;
      //
      //$product->save();

      // Products::create([
      //   'title' =>  request('title'),
      //   'description' => request('description'),
      //   'publish' => request('publish') == null ? false : true;
      // ]);


      return redirect('/attachements/create/'.$product->id);

    }
}
