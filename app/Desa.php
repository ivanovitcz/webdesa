<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
  protected $table = 'profildesa';
  protected $fillable = [
    'ketua', 'kataketua', 'foto', 'namadesa', 'alamat'
  ];
  
  public function getFoto() {
    if(!$this -> foto) {
      return asset('assets/img/fotouser/default.jpg');
    }
    return asset('assets/img/fotouser/'.$this->foto);
  }
}
