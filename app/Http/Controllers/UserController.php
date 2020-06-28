<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
  public function index() {
    $data_user = \App\User::all();
    $data_kel = \App\Keluarga::all();
    $data_aduan = \App\Aduan::all();
    $data_aribu = \App\ArisanIbu::all();
    $data_ariba = \App\ArisanBapak::all();
    $data_kegiatan = \App\Kegiatan::all();
    $data_desa = \App\Desa::find(1);
    return view('admin.index', ['data_kegiatan' => $data_kegiatan, 'data_ariba' => $data_ariba, 'data_aribu' => $data_aribu, 'data_aduan' => $data_aduan, 'data_desa' => $data_desa, 'data_user' => $data_user, 'data_kel' => $data_kel]);
  }

  public function profil() {
    $id = auth() -> user() -> id;
    $data_profil = \App\Keluarga::all();
    foreach($data_profil -> where('id_users',$id) as $datas) {
      $id = $datas -> id;
    }
    $data_profil = \App\Keluarga::find($id);
    $data_kel = \App\Keluarga::all();
    $data_desa = \App\Desa::find(1);

    return view('user.profil', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_profil' => $data_profil]);
  }

  public function warga() {
    $data_kel = \App\Keluarga::all();
    $data_ronda = \App\Ronda::all();
    $data_aribu = \App\ArisanIbu::all();
    $data_ariba = \App\ArisanBapak::all();
    $data_moto = \App\Motto::all();
    $data_desa = \App\Desa::find(1);
    $data_peng = \App\Pengumuman::orderBy('created_at','desc') -> limit(3) -> get();
    $data_aduan = \App\Aduan::orderBy('created_at','desc') -> limit(3) -> get();
    $data_foto = \App\Foto::orderBy('created_at','desc') -> limit(3) -> get();
    $data_kegiatan = \App\Kegiatan::orderBy('tanggal','desc') -> paginate(5);
    return view('user.index', ['data_kegiatan' => $data_kegiatan, 'data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_ronda' => $data_ronda, 'data_aribu' => $data_aribu, 'data_ariba' => $data_ariba, 'data_peng' => $data_peng, 'data_aduan' => $data_aduan, 'data_moto' => $data_moto, 'data_foto' => $data_foto]);
  }

  public function reset() {
    $id = auth() -> user() -> id;
    $data_user = \App\User::find($id);
    $data_user -> update([
      'password' => bcrypt('default')
    ]);
    return redirect('/user/profil') -> with('sukses', 'Sukses Reset Password!');
  }

  public function ronda() {
    $data_user = \App\User::all() -> where('status', 'RT') ;
    $id = 0;
    foreach($data_user as $datas) {
      $id = $datas -> id;
    }
    $data_RT = \App\Keluarga::all() -> where('id_users', $id);
    foreach($data_RT as $datas) {
      $id = $datas -> id;
    }

    $data_RT = \App\Keluarga::find($id);
    $data_kel = \App\Keluarga::all();
    $data_ronda = \App\Ronda::all();
    $data_desa = \App\Desa::find(1);

    return view('user.ronda', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_ronda' => $data_ronda, 'data_RT' => $data_RT]);
  }

  public function pengumuman() {
    $data_user = \App\User::all() -> where('status', 'RT') ;
    $id = 0;
    foreach($data_user as $datas) {
      $id = $datas -> id;
    }
    $data_RT = \App\Keluarga::all() -> where('id_users', $id);
    foreach($data_RT as $datas) {
      $id = $datas -> id;
    }

    $data_desa = \App\Desa::find(1);
    $data_kel = \App\Keluarga::all();
    $data_RT = \App\Keluarga::find($id);
    $data_peng = \App\Pengumuman::orderBy('created_at','desc') -> paginate(5);
    return view('user.pengumuman', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_peng' => $data_peng, 'data_RT' => $data_RT]);
  }

  public function aduan() {
    $data_user = \App\User::all() -> where('status', 'RT') ;
    $id = 0;
    foreach($data_user as $datas) {
      $id = $datas -> id;
    }
    $data_RT = \App\Keluarga::all() -> where('id_users', $id);
    foreach($data_RT as $datas) {
      $id = $datas -> id;
    }

    $data_desa = \App\Desa::find(1);
    $data_kel = \App\Keluarga::all();
    $data_RT = \App\Keluarga::find($id);
    $data_aduan = \App\Aduan::orderBy('created_at','desc') -> paginate(5);
    return view('user.aduan', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_aduan' => $data_aduan, 'data_RT' => $data_RT]);
  }

  public function foto() {
    $data_user = \App\User::all() -> where('status', 'RT') ;
    $id = 0;
    foreach($data_user as $datas) {
      $id = $datas -> id;
    }
    $data_RT = \App\Keluarga::all() -> where('id_users', $id);
    foreach($data_RT as $datas) {
      $id = $datas -> id;
    }

    $data_desa = \App\Desa::find(1);
    $data_kel = \App\Keluarga::all();
    $data_RT = \App\Keluarga::find($id);
    $data_foto = \App\Foto::orderBy('created_at','desc') -> paginate(5);
    return view('user.foto', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_foto' => $data_foto, 'data_RT' => $data_RT]);
  }

  public function arisanibu() {
    $data_user = \App\User::all() -> where('status', 'RT') ;
    $id = 0;
    foreach($data_user as $datas) {
      $id = $datas -> id;
    }
    $data_RT = \App\Keluarga::all() -> where('id_users', $id);
    foreach($data_RT as $datas) {
      $id = $datas -> id;
    }

    $data_desa = \App\Desa::find(1);
    $data_RT = \App\Keluarga::find($id);
    $data_kel = \App\Keluarga::all();
    $data_aribu = \App\ArisanIbu::orderBy('tanggal','desc') -> paginate(5);
    return view('user.arisanibu', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_aribu' => $data_aribu, 'data_RT' => $data_RT]);
  }

  public function arisanbapak() {
    $data_user = \App\User::all() -> where('status', 'RT') ;
    $id = 0;
    foreach($data_user as $datas) {
      $id = $datas -> id;
    }
    $data_RT = \App\Keluarga::all() -> where('id_users', $id);
    foreach($data_RT as $datas) {
      $id = $datas -> id;
    }

    $data_RT = \App\Keluarga::find($id);
    $data_desa = \App\Desa::find(1);
    $data_kel = \App\Keluarga::all();
    $data_ariba = \App\ArisanBapak::orderBy('tanggal','desc') -> paginate(5);
    return view('user.arisanbapak', ['data_desa' => $data_desa, 'data_kel' => $data_kel, 'data_ariba' => $data_ariba, 'data_RT' => $data_RT]);
  }

  public function buataduan(request $request) {
    $id = auth() -> user() -> id;
    $data_kel = \App\Keluarga::all();
    foreach($data_kel -> where('id_users',$id) as $datas) {
      $id = $datas -> id;
    }
    
    $data_aduan = \App\Aduan::create([
      'id_kel' => $id,
      'judul' => $request -> judul,
      'kategori' => $request -> kategori,
      'isi' => $request -> isi
    ]);
    return redirect('/user/aduan') -> with('sukses', 'Sukses Tambah Aduan!');
  }

  public function gantipass(request $request) {
    if (!(Hash::check($request -> passwordlama, Auth::user() -> password))) {
      // The passwords matches
      return redirect('/user/profil') -> with('error','Password Lama Tidak Cocok!');
    }

    if(strcmp($request -> passwordlama, $request -> passwordbaru) == 0){
      //Current password and new password are same
      return redirect('/user/profil') -> with("error","Password Baru Tidak Boleh Sama Dengan Password Lama!");
    }

    if(!(strcmp($request -> passwordbaru, $request -> passwordbaru2)) == 0){
      //New password and confirm password are not same
      return redirect('/user/profil')  -> with("error","Konfirmasi Password Dengan Benar!");
    }

    $user = Auth::user();
    $user->password = bcrypt($request -> passwordbaru);
    $user->save();
    return redirect('/user/profil')  -> with("sukses","Password Berhasil Diganti!");

  }

  public function ganti(request $request) {
    if (!(Hash::check($request -> passwordlama, Auth::user() -> password))) {
      // The passwords matches
      return redirect('/admin') -> with('error','Password Lama Tidak Cocok!');
    }

    if(strcmp($request -> passwordlama, $request -> passwordbaru) == 0){
      //Current password and new password are same
      return redirect('/admin') -> with("error","Password Baru Tidak Boleh Sama Dengan Password Lama!");
    }

    if(!(strcmp($request -> passwordbaru, $request -> passwordbaru2)) == 0){
      //New password and confirm password are not same
      return redirect('/admin')  -> with("error","Konfirmasi Password Dengan Benar!");
    }

    $user = Auth::user();
    $user->password = bcrypt($request -> passwordbaru);
    $user->save();
    return redirect('/admin')  -> with("sukses","Password Berhasil Diganti!");

  }
}
