<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesaController extends Controller
{
  public function index() {
    $data_desasemua = \App\Desa::all();
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);
    
    return view('admin.profil.index', ['data_desasemua' => $data_desasemua, 'data_desa' => $data_desa, 'data_kel' => $data_kel]);
  }

  public function edit(request $request) {
    $data_desa = \App\Desa::find(1);
    $data_desa -> update($request -> all());
    if($request->hasFile('foto')) {
      $request -> file('foto') -> move('assets/img/fotouser/',$request->file('foto') -> getClientOriginalName());
      $data_desa -> foto = $request -> file('foto') -> getClientOriginalName();
      $data_desa -> save();
    }

    return redirect('/admin/profil') -> with('sukses', 'Sukses Edit!');
  }
}
