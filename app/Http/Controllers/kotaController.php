<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;

class kotaController extends Controller
{
  public function index()
  {
    $kota = Kota::all();
    return view('kota.index',compact('kota'));
  }
  public function tambah()
  {
    return view('kota.tambah');
  }
  public function simpan(Request $request)
  {
    $this->validate($request,[
      'namakota' => 'required|min:3',
      'kd_kota' => 'required|min:3',
    ]);
      $kota = Kota::create([
        'namakota' => $request->namakota,
        'kd_kota' => $request->kd_kota,
      ]);

      return redirect()->route('kota.index')->with('msg','Kota Berhasil Ditambahkan');
  }
  public function edit($id)
  {
    $kota = Kota::findOrFail($id);
    return view('kota.edit',compact('kota'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'namakota' => 'required|min:3',
      'kd_kota' => 'required|min:3|max:5'
    ]);

      $kota = Kota::findOrFail($id);
      $kota->update([
        'namakota' =>$request->namakota,
        'kd_kota' =>$request->kd_kota,
      ]);

      return redirect()->route('kota.index')->with('msg','Kota Berhasil Diubah');
  }

  public function hapus($id)
  {
    $kota = Kota::findOrFail($id);
    $kota->delete();

    return redirect()->route('kota.index')->with('msg','Kota Berhasil Dihapus');
  }
}
