<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Pembeli;
use App\Order;
use App\Tiket;
use Storage;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $admin = Admin::all();

      return view('admin.index',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request,[
        'username' => 'required|string|min:4|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'nama' => 'required|min:3|max:100',
        'gender' => 'required',
        'tgllahir' => 'required',
        'no_identitas' => 'required',
        'notlp' => 'required',
        'alamat' => 'required',
        'foto' => 'mimes:jpeg,jpg,png,bmp|max:10000'
      ]);

      $foto = $request->file('foto')->store('fotos');

      $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);

      $admin = Admin::create([
        'nama' => $request->nama,
        'gender' => $request->gender,
        'tgllahir' => $request->tgllahir,
        'no_identitas' => $request->no_identitas,
        'notlp' => $request->notlp,
        'alamat' => $request->alamat,
        'foto' => $foto,
        'user_id' => $user->id,
      ]);

      $user->assignRole('admin');
      return redirect()->route('admin.index')->with('msg','Data Admin Berhasil DItambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $admin = Admin::findOrFail($id);
      $user = User::findOrFail($admin->user->id);

        $this->validate($request,[
          'username' => "required|string|min:4|max:255|unique:users,username,$user->id",
          'email' => "required|string|email|max:255|unique:users,email,$user->id",
          'password' => 'required|string|min:6|confirmed',
          'nama' => 'required|min:3|max:100',
          'gender' => 'required',
          'tgllahir' => 'required',
          'no_identitas' => 'required',
          'notlp' => 'required',
          'alamat' => 'required',
          'foto' => 'mimes:jpeg,jpg,png,bmp|max:10000'
        ]);


        if ($admin->foto) {
          Storage::delete($admin->foto);
        }
        $foto = $request->file('foto')->store('fotos');

        $user->update([
          'username' => $request->username,
          'email' => $request->email,
          'password' => bcrypt($request->password),
        ]);

        $admin->update([
          'nama' => $request->nama,
          'gender' => $request->gender,
          'tgllahir' => $request->tgllahir,
          'no_identitas' => $request->no_identitas,
          'notlp' => $request->notlp,
          'alamat' => $request->alamat,
          'foto' =>$foto,
        ]);

        return redirect()->route('admin.index')->with('msg','Data Admin Berhasil Diubah');

    }

    public function profile($id)
    {
      $admin = Admin::findOrFail($id);

      return view('admin.profile',compact('admin'));
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return redirect()->back()->with('msg','Data Admin Berhasil DiHapus');
    }

    public function dashboard()
    {
      $pembeli = Pembeli::count();
      $tiket = Tiket::count();
      $order = Order::count();

      return view('dashboard',compact('pembeli','tiket','order'));
    }


}
