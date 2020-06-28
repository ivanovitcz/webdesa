<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
  protected $table = 'keluarga';
  protected $fillable = [
    'id_users', 'nama', 'nomor', 'pekerjaan', 'foto'
  ];

public function getFoto() {
  if(!$this -> foto) {
    return asset('assets/img/fotouser/default.jpg');
  }
  return asset('assets/img/fotouser/'.$this->foto);
}
}
