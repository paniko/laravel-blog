<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class StoresController extends Controller
{
    public function index(Item $store)
    {
      //get all stores
      $stores = $store->all();

      $city = request('city');
      if($city){
        $stores = $store->where('title','like','%'.$city.'%')->get();
      }

      return view('stores.index', compact('stores'));
    }

    public function json(Item $store)
    {
      //get all stores
      $stores = $store->all();
      $city = request()->term;
      if($city){
        $stores = $store->where('title','like','%'.$city.'%')->get();
      }
      $json = json_encode($stores);
      header('Content-Type: application/json');
      echo $json;
      //return view('stores.index', compact('stores'));
    }
    public function near(Item $item)
    {

      $location = $item->location;
      $stores = $item->distance(0.1, $location)->get();
      $json = json_encode($stores);
      header('Content-Type: application/json');
      echo $json;
    }
}
