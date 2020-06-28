<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
  protected $table = 'aduan';
  protected $fillable = [
    'id_kel', 'kategori', 'isi', 'judul'
  ];
}
