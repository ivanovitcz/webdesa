<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArisanBapakController extends Controller
{
  public function index() {
    $data_ariba = \App\ArisanBapak::orderBy('tanggal','desc') -> paginate(5);
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);

    return view('admin.arisanbapak.index', ['data_desa' => $data_desa, 'data_ariba' => $data_ariba, 'data_kel' => $data_kel]);
  }

  public function hapus($id) {
    $data_ariba = \App\ArisanBapak::find($id);
    $data_ariba -> delete($data_ariba);

    return redirect('/admin/arisanBapak') -> with('sukses', 'Sukses Hapus Data');
  }

  public function ubah($id, request $request) {
    $data_ariba = \App\ArisanBapak::find($id);
    $tgl = $request -> tanggal;
    $tgl = explode("/",$tgl);
    $jam = $request -> jam;
    $menit = $request -> menit;
    $tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]." ".$jam.":".$menit.":00";

    $data_ariba -> update(['tempat' => $request -> tempat, 'tanggal' => $tgl]);

    return redirect('/admin/arisanBapak') -> with('sukses', 'Sukses Ubah Jadwal!');
  }
  public function tambah(request $request) {
    $tgl = $request -> tanggal;
    $tgl = explode("/",$tgl);
    $jam = $request -> jam;
    $menit = $request -> menit;
    $tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0]." ".$jam.":".$menit.":00";

    $data_ariba = \App\ArisanBapak::create([
                                  'tempat' => $request -> tempat,
                                  'tanggal' => $tgl
                                  ]);

    return redirect('/admin/arisanBapak') -> with('sukses', 'Sukses Tambah Jadwal!');
  }
}
