<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArisanIbu extends Model
{
  protected $table = 'arisanibu';
  protected $fillable = [
    'tempat', 'tanggal'
  ];
}
