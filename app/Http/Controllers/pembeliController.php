<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembeli;
use App\User;
use Storage;
class pembeliController extends Controller
{
    public function show($id)
    {
      $pembeli = Pembeli::findOrFail($id);
      return view('pembeli.profile',compact('pembeli'));
    }

    public function editfoto($id)
    {
      $pembeli = Pembeli::findOrFail($id);
      return view('pembeli.editfoto',compact('pembeli'));
    }

    public function index()
    {
      $pembeli = Pembeli::all();
      return view('pembeli.index',compact('pembeli'));
    }

    public function updatefoto($id,Request $request)
    {

      $this->validate($request,[
        'foto' => 'mimes:jpeg,jpg,png,bmp|max:10000',
      ]);

      $pembeli = Pembeli::findOrFail($id);
      if ($pembeli->foto) {
        Storage::delete($pembeli->foto);
      }
      $foto = $request->file('foto')->store('fotos');


      $pembeli->update([
        'foto' => $foto
      ]);
      return redirect()->back()->with('msg','foto profil berhasil diubah');
    }

    public function edit($id)
    {
      $pembeli = Pembeli::findOrFail($id);
      return view('pembeli.edit',compact('pembeli'));
    }

    public function update($id,Request $request)
    {

      $this->validate($request,[
        'nama' => 'required|min:2|max:100',
        'gender' => 'required',
        'tempatlahir' => 'required|min:5|max:50',
        'tgllahir' => 'required',
        'kewarganegaraan' => 'required',
        'jenis_identitas' => 'required',
        'no_identitas' => 'required',
        'notlp' => 'required|min:10|max:12',
        'alamat' => 'required|min:4|max:50',
        'foto' => 'mimes:jpeg,jpg,png,bmp|max:10000',
      ]);



      $pembeli = Pembeli::findOrFail($id);

      if ($pembeli->foto) {
        Storage::delete($pembeli->foto);
      }

      if ($request->file('foto')) {
        $foto = $request->file('foto')->store('fotos');
        $pembeli->update([
          'foto' => $foto
        ]);
      }

      $pembeli->update([
        'nama' => $request->nama ,
        'gender' => $request->gender ,
        'tempatlahir' =>$request->tempatlahir,
        'tgllahir' =>$request->tgllahir ,
        'kewarganegaraan' =>$request->kewarganegaraan ,
        'jenis_identitas' =>$request->jenis_identitas,
        'no_identitas' =>$request->no_identitas,
        'notlp' =>$request->notlp,
        'alamat' =>$request->alamat,

      ]);

      return redirect()->route('pembeli.index')->with('msg','Data Pembeli Berhasil Diubah');
    }

    public function hapus($id)
    {
      $pembeli = Pembeli::findOrFail($id);
      $pembeli->delete();

      return redirect()->route('pembeli.index')->with('msg','Data Pelanggan Berhasil Dihapus');
    }

    public function profileedit($id)
    {
      $pembeli = Pembeli::findOrFail($id);

      return view('pembeli.profileedit',compact('pembeli'));
    }

    public function profilesimpan($id,Request $request)
    {
        $pembeli = Pembeli::findOrFail($id);
        $user = User::findOrFail($pembeli->user->id);
      $this->validate($request,[
        'username' => "required|string|min:4|max:255|unique:users,username,$user->id",
        'email' => "required|string|email|max:255|unique:users,email,$user->id",
        'password' => 'required|string|min:6|confirmed',
        'nama' => 'required|min:2|max:100',
        'gender' => 'required',
        'tempatlahir' => 'required|min:5|max:50',
        'tgllahir' => 'required',
        'kewarganegaraan' => 'required',
        'jenis_identitas' => 'required',
        'no_identitas' => 'required',
        'notlp' => 'required|min:10|max:12',
        'alamat' => 'required|min:4|max:50',
        'foto' => 'mimes:jpeg,jpg,png,bmp|max:10000',
      ]);

      $user->update([
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);


      $pembeli->update([
        'nama' => $request->nama ,
        'gender' => $request->gender ,
        'tempatlahir' =>$request->tempatlahir,
        'tgllahir' =>$request->tgllahir ,
        'kewarganegaraan' =>$request->kewarganegaraan ,
        'jenis_identitas' =>$request->jenis_identitas,
        'no_identitas' =>$request->no_identitas,
        'notlp' =>$request->notlp,
        'alamat' =>$request->alamat,
      ]);

        return redirect()->route('pembeli.profile',['id'=>$pembeli->id])->with('msg','Profil Berhasil Diubah');
    }

}
