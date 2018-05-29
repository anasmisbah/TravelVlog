<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['id','created_at','update_at'];

    public function pembeli()
    {
      return $this->belongsTo('App\Pembeli');
    }

    public function tiket()
    {
      return $this->belongsTo('App\Tiket');
    }
}
