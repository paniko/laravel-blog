<?php

namespace App;

class Comment extends Model
{
    public function post(){
      return $this->belongsTo(Product::class);
    }
    public function user(){
      return $this->belongsTo(Users::class);
    }
}
