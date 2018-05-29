<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
  use Notifiable;
    protected $table = 'pembeli';
    protected $guarded = ['id','created_at','update_at'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function order()
    {
      return $this->hasMany();
    }
}
