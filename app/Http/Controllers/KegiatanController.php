<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
  public function index() {
    $data_kegiatan = \App\Kegiatan::orderBy('tanggal','desc') -> paginate(5);
    $data_desa = \App\Desa::find(1);
    $data_kel = \App\Keluarga::all();
    return view('admin.kegiatan.index', ['data_desa' => $data_desa, 'data_kegiatan' => $data_kegiatan, 'data_kel' => $data_kel]);
  }

  public function tambah(request $request) {
    $tgl = $request -> tanggal;
    $tgl = explode("/",$tgl);
    $tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]." 00:00:00";
    $data_kegiatan = \App\Kegiatan::create(['nama' => $request -> nama,'keterangan' => $request -> keterangan,'tanggal' => $tgl]);

    return redirect('/admin/kegiatan') -> with('sukses', 'Sukses Tambah Kegiatan!');

  }

  public function hapus($id) {
    $data_kegiatan = \App\Kegiatan::find($id);
    $data_kegiatan -> delete($data_kegiatan);

    return redirect('/admin/kegiatan') -> with('sukses', 'Sukses Hapus Data');
  }

  public function ubah($id, request $request) {
    $data_kegiatan = \App\Kegiatan::find($id);
    $tgl = $request -> tanggal;
    $tgl = explode("/",$tgl);
    $tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]." 00:00:00";
    $data_kegiatan -> update(['nama' => $request -> nama,'keterangan' => $request -> keterangan,'tanggal' => $tgl]);

    return redirect('/admin/kegiatan') -> with('sukses', 'Sukses Ubah Pengumuman!');
  }
}