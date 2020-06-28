<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
  protected $table = 'ronda';
  protected $fillable = [
    'id_kel', 'hari'
  ];
}
