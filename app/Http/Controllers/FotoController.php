<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FotoController extends Controller
{
  public function index() {
    $data_foto = \App\Foto::orderBy('created_at','desc') -> paginate(5);
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);

    return view('admin.foto.index', ['data_desa' => $data_desa, 'data_foto' => $data_foto, 'data_kel' => $data_kel]);
  }

  public function tambah(request $request) {
    $data_foto = \App\Foto::create($request -> all());
    if($request->hasFile('foto')) {
      $request -> file('foto') -> move('assets/img/fotokegiatan/',$request->file('foto') -> getClientOriginalName());
      $data_foto -> foto = $request -> file('foto') -> getClientOriginalName();
      $data_foto -> save();
    }
    return redirect('/admin/foto') -> with('sukses', 'Sukses Tambah Foto!');
  }

  public function ubah($id, request $request) {
    $data_foto = \App\Foto::find($id);
    $data_foto -> update($request -> only('keterangan','foto'));
    if($request->hasFile('foto')) {
      $request -> file('foto') -> move('assets/img/fotokegiatan/',$request->file('foto') -> getClientOriginalName());
      $data_foto -> foto = $request -> file('foto') -> getClientOriginalName();
      $data_foto -> save();
    }

    return redirect('/admin/foto') -> with('sukses', 'Sukses Edit Foto');
  }

  public function hapus($id) {
    $data_foto = \App\Foto::find($id);
    $data_foto -> delete($data_foto);

    return redirect('/admin/foto') -> with('sukses', 'Sukses Hapus Foto');
  }
}
