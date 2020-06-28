<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
  protected $table = 'foto';
  protected $fillable = [
    'foto', 'keterangan'
  ];
  
  public function getFoto() {
    if(!$this -> foto) {
      return asset('assets/img/fotokegiatan/default.jpg');
    }
    return asset('assets/img/fotokegiatan/'.$this->foto);
  }
}
