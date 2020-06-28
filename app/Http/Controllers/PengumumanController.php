<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengumumanController extends Controller
{
  public function index() {
    $data_peng = \App\Pengumuman::orderBy('created_at','desc') -> paginate(5);
    $data_desa = \App\Desa::find(1);
    $data_kel = \App\Keluarga::all();
    return view('admin.pengumuman.index', ['data_desa' => $data_desa, 'data_peng' => $data_peng, 'data_kel' => $data_kel]);
  }

  public function tambah(request $request) {
    $data_peng = \App\Pengumuman::create($request -> all());

    return redirect('/admin/pengumuman') -> with('sukses', 'Sukses Tambah Pengumuman!');
  }

  public function ubah($id, request $request) {
    $data_peng = \App\Pengumuman::find($id);
    $data_peng -> update($request -> all());

    return redirect('/admin/pengumuman') -> with('sukses', 'Sukses Ubah Pengumuman!');
  }

  public function hapus($id) {
    $data_peng = \App\Pengumuman::find($id);
    $data_peng -> delete($data_peng);

    return redirect('/admin/pengumuman') -> with('sukses', 'Sukses Hapus Data');
  }
}
