<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiket;
use App\Kategori;
use App\Kota;
use App\Order;
use PDF;
class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = Tiket::all();

        return view('tiket.index',compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $kota = Kota::all();
        return view('tiket.tambah',compact('kategori','kota'));
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
        'unit' => 'required|min:3',
        'date' => 'required|date',
        'from' => 'required',
        'to' => 'required',
        'departure' => 'required',
        'arrival' => 'required',
        'amount' => 'required|min:1',
        'cost' => 'required',
        'kategori_id' => 'required',
      ]);

      $tiket = Tiket::create([
        'kategori_id' => $request->kategori_id,
        'unit' => $request->unit,
        'date' => $request->date,
        'from' => $request->from,
        'to' => $request->to,
        'departure' => $request->departure,
        'arrival' => $request->arrival,
        'amount' => $request->amount,
        'cost' => $request->cost,

      ]);

      return redirect()->route('tiket.index')->with('msg','data tiket berhasil dimasukkan');
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
        $tiket = Tiket::findOrFail($id);
        $kategori = Kategori::all();
        $kota = Kota::all();
        return view('tiket.edit',compact('tiket','kategori','kota'));
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
      $tiket = Tiket::findOrFail($id);
      $this->validate($request,[
        'unit' => 'required|min:3',
        'date' => 'required',
        'from' => 'required',
        'to' => 'required',
        'departure' => 'required',
        'arrival' => 'required',
        'amount' => 'required|min:1',
        'cost' => 'required',
        'kategori_id' => 'required',
      ]);

      $tiket->update([
        'kategori_id' => $request->kategori_id,
        'unit' => $request->unit,
        'date' => $request->date,
        'from' => $request->from,
        'to' => $request->to,
        'departure' => $request->departure,
        'arrival' => $request->arrival,
        'amount' => $request->amount,
        'cost' => $request->cost,
      ]);

      return redirect()->route('tiket.index')->with('msg','Data Tiket Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket =  Tiket::findOrFail($id);
        $tiket->delete();

        return redirect()->route('tiket.index')->with('msg','Data Berhasil Dihapus');
    }

    public function etiket($id)
    {
      $order = Order::findOrFail($id);

      return view('etiket.etiket',compact('order'));
    }

    public function etiketcetak($id)
    {
      $order = Order::findOrFail($id);

      $pdf = PDF::loadView('etiket.etiketcetak',compact('order'));
      return $pdf->download('etiket.pdf');
    }
}
