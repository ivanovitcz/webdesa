<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RondaController extends Controller
{
  public function index() {
    $data_ronda = \App\Ronda::all();
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);

    return view('admin.dataronda.index', ['data_desa' => $data_desa, 'data_ronda' => $data_ronda, 'data_kel' => $data_kel]);
  }

  public function tambah(request $request) {
    $data_ronda = \App\Ronda::create($request->all());
    return redirect('/admin/ronda') -> with('sukses', 'Sukses Input!');
  }

  public function hapus($id) {
    $data_ronda = \App\Ronda::find($id);
    $data_ronda -> delete($data_ronda);

    return redirect('/admin/ronda') -> with('sukses', 'Sukses Hapus Data');
  }

  public function ubah($id, request $request) {
    $data_ronda = \App\Ronda::find($id);
    $data_ronda -> update($request -> all());

    return redirect('/admin/ronda') -> with('sukses', 'Sukses Ubah Hari');
  }
}
