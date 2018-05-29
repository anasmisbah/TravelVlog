<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Pembeli;
use App\Tiket;
use App\Notifications\NotifyOrderAdmin;
class orderController extends Controller
{
    public function index()
    {
      $orders = Order::with('tiket','pembeli')->get();

      return view('order.index',compact('orders'));
    }

    public function tambah()
    {
      $pembeli = Pembeli::all();
      $tiket = Tiket::all();

      return view('order.tambah',compact('pembeli','tiket'));
    }

    public function simpan(Request $request)
    {
      $tiket = Tiket::findOrFail($request->tiket_id);

      $request->total_pembayaran = $request->jml_tiket * $tiket->cost;

      $order = Order::create([
        'pembeli_id' => $request->pembeli_id,
        'tiket_id' => $request->tiket_id,
        'total_pembayaran' => $request->total_pembayaran,
        'jml_tiket' => $request->jml_tiket,
        'status' => $request->status,
      ]);

      return redirect()->route('order.index')->with('msg','Order Berhasil Ditambahkan');
    }

    public function edit($id)
    {
      $order = Order::findOrFail($id);
      $pembeli = Pembeli::all();
      return view('order.edit',compact('order','pembeli'));
    }

    public function update($id,Request $request)
    {
      $order = Order::findOrFail($id);

      $total = ($order->tiket->cost)*($request->jml_tiket);

      $order->update([
        'pembeli_id' => $request->pembeli_id,
        'jml_tiket' => $request->jml_tiket,
        'total_pembayaran' => $total,
        'status' => $request->status,
      ]);

      return redirect()->route('order.index')->with('msg','Data Booking Berhasil Diubah');
    }

    public function delete($id)
    {
      $order = Order::findOrFail($id);
      $order->delete();

      return redirect()->route('order.index')->with('msg','Data Order Berhasil DIhapus');
    }

    public function detail($id)
    {
      $order = Order::findOrFail($id);
      return view('order.detail',compact('order'));
    }

    public function konfirmasi($id)
    {
      $order = Order::findOrFail($id);
      $tiket = Tiket::findOrFail($order->tiket->id);

      $order->pembeli->user->notify(new NotifyOrderAdmin($order));
      $order->update([
        'status' => 2,
      ]);

      return redirect()->back()->with('msg','Pembayaran Berhasil DIkonfirmasi');
    }

    public function salahbukti($id)
    {
      $order = Order::findOrFail($id);

      $order->update([
        'status' => 3,
      ]);

      return redirect()->back();
    }

    public function cancel($id)
    {
      $order = Order::findOrFail($id);

      $order->update([
        'status' => 4,
      ]);

      return redirect()->back();
    }
}
