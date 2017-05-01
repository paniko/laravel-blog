<?php

namespace App;
use Carbon\Carbon;
use App\User;

class Product extends Model
{
    public function __construct(){
      //$this->publish = request('publish') == null ? false : true;
    }
    public function comments(){
      return $this->hasMany(Comment::class);
    }
    public function attachements(){
      return $this->hasMany(Attachements::class);
    }
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function languages(){
      return $this->hasMany(Language::class);
    }

    public function scopePublished($query){
      return $query->where('publish',1);
    }
    public function scopeFilter($query, $filters){
      if($month = $filters['month'] ){
        $query->whereMonth('created_at', Carbon::parse($month)->month);
      }
      if($year =  $filters['year'] ){
        $query->whereYear('created_at', $year);
      }
      $query->where('publish',1);
    }

    public function addComment($body){
      $this->comments()->create(compact('body'));
    }

    public static function archives()
    {
      return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year','month')
      ->orderByRaw('min(created_at) desc')
      ->get()
      ->toArray();
    }


}
