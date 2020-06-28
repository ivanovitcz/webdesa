<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArisanBapak extends Model
{
  protected $table = 'arisanbapak';
  protected $fillable = [
    'tempat', 'tanggal'
  ];
}
