<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemsController extends Controller
{
  public function map(Item $store){

  		$stores = Item::all();
  //    $stores = $store->distance(0.1,'45.05,7.6667')->get();
      $city = request('city');
      if($city){
        $stores = $store->where('title','like','%'.$city.'%')->get();
      }

  		return view('items.map')->with(['stores'=>$stores]);
  }


}
