<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AduanController extends Controller
{
  public function index() {
    $data_aduan = \App\Aduan::orderBy('created_at','desc') -> paginate(5);
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);

    return view('admin.aduan.index', ['data_desa' => $data_desa, 'data_aduan' => $data_aduan, 'data_kel' => $data_kel]);
  }

  public function hapus($id) {
    $data_aduan = \App\Aduan::find($id);
    $data_aduan -> delete($data_aduan);

    return redirect('/admin/aduan') -> with('sukses', 'Sukses Hapus Data');
  }
}
