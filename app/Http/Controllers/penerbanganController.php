<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiket;
use App\Kota;
use App\Kategori;
use App\Order;
class penerbanganController extends Controller
{

    public function index()
    {
      $kota = Kota::all();
      $kategori = Kategori::all();

      return view('penerbangan.index',compact('kota','kategori'));
    }
    public function search(Request $request)
    {
    //   $this->validate($request,[
    //     'date' => 'required',
    //     'from' => 'required',
    //     'to' => 'required',
    //     'kategori_id' => 'required',
    //     'amount' => 'required',
    // ]);
      $search_tgl = urlencode($request->input('date'));
      $search_from =urlencode($request->input('from'));
      $search_to =urlencode($request->input('to'));
      $search_kategori =urlencode($request->input('kategori_id'));
      $search_amount =urlencode($request->input('amount'));
      $kota = Kota::all();
      $kategori = Kategori::all();


        $tiket = Tiket::where([  ['date','=',$search_tgl],
          ['from','=',$search_from],
          ['to','=',$search_to],
          ['kategori_id','=',$search_kategori],
          ['amount','>=',$search_amount],
        ])->get();

      
      return view('penerbangan.search',compact('tiket','kota','kategori','request'));
    }

    public function detail($id,$jml)
    {
      $tiket = Tiket::findOrFail($id);
      $total = $jml*$tiket->cost;
      return view('penerbangan.detail',['jml' => $jml,'total' => $total],compact('tiket'));
    }

    public function booking(Request $request)
    {
      if ($request->total_pembayaran == 0) {
        $tiket = Tiket::findOrFail($request->tiket_id);
        $request->total_pembayaran = $request->jml_tiket * $tiket->cost;

      }

      $order = Order::create([
        'pembeli_id' => $request->pembeli_id,
        'tiket_id' => $request->tiket_id,
        'total_pembayaran' => $request->total_pembayaran,
        'jml_tiket' => $request->jml_tiket,
      ]);

      $tiket = Tiket::findOrFail($order->tiket->id);
      $mintiket = $tiket->amount - $order->jml_tiket;

      $tiket->update([
        'amount' => $mintiket,
      ]);

      return redirect()->route('penerbangan.doneorder')->with('msg','Selamat Anda Telah Berhasil Memesan Tiket');
    }



}
