<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';

    protected $fillable = [
      'unit',
      'date',
      'from',
      'to' ,
      'departure',
      'arrival',
      'amount',
      'cost',
      'kategori_id',];
    public function Kategori(){
      return $this->belongsTo('App\Kategori');
    }
}
