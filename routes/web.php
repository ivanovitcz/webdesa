<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','TestController@index');

Route::group(['middleware' => 'guest'], function() {
  Route::get('/login','AuthController@index') -> name('login');
  Route::post('/postlogin','AuthController@postlogin');
});

Route::get('/logout','AuthController@logout');

Route::group(['middleware' => 'revalidate'], function() {
  Route::group(['middleware' => ['auth', 'checkrole:Warga,RT']], function() {
    Route::get('/user','UserController@warga');
    Route::post('/user/buataduan','UserController@buataduan');
    Route::get('/user/ronda','UserController@ronda');
    Route::get('/user/profil','UserController@profil');
    Route::get('/user/reset','UserController@reset');
    Route::get('/user/arisanibu','UserController@arisanibu');
    Route::get('/user/arisanbapak','UserController@arisanbapak');
    Route::get('/user/pengumuman','UserController@pengumuman');
    Route::get('/user/aduan','UserController@aduan');
    Route::post('/user/gantipassword','UserController@gantipass');
    Route::get('/user/foto','UserController@foto');
  });
});

Route::group(['middleware' => 'revalidate'], function() {
  Route::group(['middleware' => ['auth', 'checkrole:RT']], function() {
    Route::get('/admin','UserController@index') -> middleware('auth');
    Route::get('/admin/keluarga','KeluargaController@index');
    Route::post('/admin/keluarga/tambah','KeluargaController@tambah');
    Route::post('/admin/keluarga/{id}/edit','KeluargaController@edit');
    Route::get('/admin/keluarga/{id}/reset','KeluargaController@reset');
    Route::get('/admin/keluarga/{id}/detail','KeluargaController@detail');
    Route::get('/admin/keluarga/{id}/hapus','KeluargaController@hapus');
    Route::get('/admin/keluarga/{id}/gantiketua','KeluargaController@gantiketua');

    Route::get('/admin/ronda','RondaController@index');
    Route::post('/admin/ronda/tambah','RondaController@tambah');
    Route::get('/admin/ronda/{id}/hapus','RondaController@hapus');
    Route::post('/admin/ronda/{id}/ubah','RondaController@ubah');

    Route::get('/admin/arisanIbu','ArisanIbuController@index');
    Route::get('/admin/arisanIbu/{id}/hapus','ArisanIbuController@hapus');
    Route::post('/admin/arisanIbu/{id}/ubah','ArisanIbuController@ubah');
    Route::post('/admin/arisanIbu/tambah','ArisanIbuController@tambah');

    Route::get('/admin/arisanBapak','ArisanBapakController@index');
    Route::get('/admin/arisanBapak/{id}/hapus','ArisanBapakController@hapus');
    Route::post('/admin/arisanBapak/{id}/ubah','ArisanBapakController@ubah');
    Route::post('/admin/arisanBapak/tambah','ArisanBapakController@tambah');

    Route::get('/admin/pengumuman','PengumumanController@index');
    Route::post('/admin/pengumuman/tambah','PengumumanController@tambah');
    Route::post('/admin/pengumuman/{id}/ubah','PengumumanController@ubah');
    Route::get('/admin/pengumuman/{id}/hapus','PengumumanController@hapus');

    Route::get('/admin/aduan','AduanController@index');
    Route::get('/admin/aduan/{id}/hapus','AduanController@hapus');

    Route::get('/admin/moto','MottoController@index');
    Route::post('/admin/moto/tambah','MottoController@tambah');
    Route::get('/admin/moto/{id}/hapus','MottoController@hapus');
    Route::post('/admin/moto/{id}/ubah','MottoController@ubah');

    Route::get('/admin/foto','FotoController@index');
    Route::post('/admin/foto/tambah','FotoController@tambah');
    Route::get('/admin/foto/{id}/hapus','FotoController@hapus');
    Route::post('/admin/foto/{id}/ubah','FotoController@ubah');

    Route::get('/admin/profil','DesaController@index');
    Route::post('/admin/profil/edit','DesaController@edit');

    Route::post('/admin/ganti','UserController@ganti');

    Route::get('/admin/kegiatan','KegiatanController@index');
    Route::post('/admin/kegiatan/tambah','KegiatanController@tambah');
    Route::get('/admin/kegiatan/{id}/hapus','KegiatanController@hapus');
    Route::post('/admin/kegiatan/{id}/ubah','KegiatanController@ubah');



  });
});



?>