<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
class KeluargaController extends Controller
{
  public function index() {
    $data_kel2 = \App\Keluarga::orderBy('nama','asc') -> paginate(5);
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);

    return view('admin.datauser.index', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_kel2' => $data_kel2]);
  }

  
  public function detail($id) {
    $data_kel2 = \App\Keluarga::find($id);
    $data_kel = \App\Keluarga::all();
    $data_user = \App\User::find($data_kel2 -> id_users);
    $data_desa = \App\Desa::find(1);

    return view('admin.datauser.detail', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_kel2' => $data_kel2, 'data_user' => $data_user]);
  }


  public function tambah(request $request) {
    $data_user = \App\User::create([
                'username' => $request -> username,
                'password' => bcrypt($request -> password),
                'status' => 'Warga'
    ]);
    $data_user = \App\User::orderBy('created_at','desc') -> first();
    $idLast = $data_user -> id;
    $data_kel = \App\Keluarga::create([
      'id_users' => $idLast,
      'nama' => $request -> nama,
      'nomor' => $request -> nomor,
      'pekerjaan' => $request -> pekerjaan,
      'foto' => $request -> foto
    ]);
    if($request->hasFile('foto')) {
      $request -> file('foto') -> move('assets/img/fotouser/',$request->file('foto') -> getClientOriginalName());
      $data_kel -> foto = $request -> file('foto') -> getClientOriginalName();
      $data_kel -> save();
    }
    return redirect('/admin/keluarga') -> with('sukses', 'Sukses Input!');
  }

  public function edit($id, request $request) {
    $data_kel = \App\Keluarga::find($id);
    $data_kel -> update($request -> only('nama','nomor','pekerjaan','foto'));
    if($request->hasFile('foto')) {
      $request -> file('foto') -> move('assets/img/fotouser/',$request->file('foto') -> getClientOriginalName());
      $data_kel -> foto = $request -> file('foto') -> getClientOriginalName();
      $data_kel -> save();
    }

    $data_user = \App\User::find($data_kel -> id_users);
    $data_user -> update([
      'username' => $request -> username
    ]);

    return redirect('/admin/keluarga') -> with('sukses', 'Sukses Edit!');
  }

  public function reset($id) {
    $data_kel = \App\Keluarga::find($id);
    $data_user = \App\User::find($data_kel -> id_users);
    $data_user -> update([
      'password' => bcrypt('default')
    ]);

    return redirect('/admin/keluarga') -> with('sukses', 'Sukses Reset Password!');
  }

  public function hapus($id) {
    $data_kel = \App\Keluarga::find($id);
    $data_user = \App\User::find($data_kel -> id_users);

    $data_ronda = \App\Ronda::all() -> where('id_kel', $data_kel -> id);
    foreach($data_ronda as $datas) {
      $data = \App\Ronda::find($datas -> id);
      $data -> delete($data);
    }

    $data_aribu = \App\ArisanIbu::all() -> where('tempat', $data_kel -> id);
    foreach($data_aribu as $datas) {
      $data = \App\ArisanIbu::find($datas -> id);
      $data -> delete($data);
    }

    $data_ariba = \App\ArisanBapak::all() -> where('tempat', $data_kel -> id);
    foreach($data_ariba as $datas) {
      $data = \App\Arisanbapak::find($datas -> id);
      $data -> delete($data);
    }

    $data_aduan = \App\Aduan::all() -> where('id_kel', $data_kel -> id);
    foreach($data_aduan as $datas) {
      $data = \App\Aduan::find($datas -> id);
      $data -> delete($data);
    }

    $data_kel -> delete($data_kel);
    $data_user -> delete($data_user);

    return redirect('/admin/keluarga') -> with('sukses', 'Sukses Hapus Data!');
  }

  public function gantiketua($id) {
    $idRT = auth() -> user() -> id;
    $data_RT = \App\User::find($idRT);
    $data_RT -> update([
      'status' => 'Warga'
    ]);

    $data_kel = \App\Keluarga::find($id);
    $data_user = \App\User::find($data_kel -> id_users);
    $data_user -> update([
      'status' => 'RT'
    ]);

    Auth::logout();
    return redirect('/login') -> with('sukses', 'Sukses Ganti Ketua!');
  }
}
