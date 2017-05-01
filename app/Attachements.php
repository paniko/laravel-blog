<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachements extends Model
{
  public function product(){
    return $this->belongsTo(Product::class);
  }
}
