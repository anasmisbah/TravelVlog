<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  protected $table = 'admin';
  protected $guarded = ['id','created_at','update_at'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
