<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArisanIbuController extends Controller
{
  public function index() {
    $data_aribu = \App\ArisanIbu::orderBy('tanggal','desc') -> paginate(5);
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);

    return view('admin.arisanibu.index', ['data_desa' => $data_desa, 'data_aribu' => $data_aribu, 'data_kel' => $data_kel]);
  }

  public function hapus($id) {
    $data_aribu = \App\ArisanIbu::find($id);
    $data_aribu -> delete($data_aribu);

    return redirect('/admin/arisanIbu') -> with('sukses', 'Sukses Hapus Data');
  }

  public function ubah($id, request $request) {
    $data_aribu = \App\ArisanIbu::find($id);
    $tgl = $request -> tanggal;
    $tgl = explode("/",$tgl);
    $jam = $request -> jam;
    $menit = $request -> menit;
    $tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]." ".$jam.":".$menit.":00";
    $data_aribu -> update(['tempat' => $request -> tempat, 'tanggal' => $tgl]);
    
    return redirect('/admin/arisanIbu') -> with('sukses', 'Sukses Ubah Jadwal!');
  }
  public function tambah(request $request) {
    $tgl = $request -> tanggal;
    $tgl = explode("/",$tgl);
    $jam = $request -> jam;
    $menit = $request -> menit;
    $tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]." ".$jam.":".$menit.":00";
    $data_aribu = \App\ArisanIbu::create(['tempat' => $request -> tempat,'tanggal' => $tgl]);

    return redirect('/admin/arisanIbu') -> with('sukses', 'Sukses Tambah Jadwal!');
  }
}
