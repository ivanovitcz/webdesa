<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MottoController extends Controller
{
  public function index() {
  $data_motto = \App\Motto::orderBy('created_at','desc') -> paginate(5);
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);


    return view('admin.moto.index', ['data_desa' => $data_desa, 'data_motto' => $data_motto, 'data_kel' => $data_kel]);
  }

  public function tambah(request $request) {
    $data_motto = \App\Motto::create($request -> all());

    return redirect('/admin/moto') -> with('sukses', 'Sukses Tambah Moto!');
  }

  public function hapus($id) {
    $data_motto = \App\Motto::find($id);
    $data_motto -> delete($data_motto);

    return redirect('/admin/moto') -> with('sukses', 'Sukses Hapus Data');
  }

  public function ubah($id, request $request) {
    $data_motto = \App\Motto::find($id);
    $data_motto -> update($request -> all());

    return redirect('/admin/moto') -> with('sukses', 'Sukses Ubah Pengumuman!');
  }
}
