<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index() {
    $data_desa = \App\Desa::find(1);

    return view('index', ['data_desa' => $data_desa]);
  }
}
