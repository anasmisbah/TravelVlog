<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Storage;
class pembeliOrderController extends Controller
{
    public function index($id)
    {
      $orders = Order::where('pembeli_id','=',$id)->paginate(5);

      return view('pembeliorder.index',compact('orders'));
    }

    public function detail($id)
    {
      $order = Order::findOrFail($id);

      return view('pembeliorder.detail',compact('order'));
    }

    public function transfer($id)
    {
      $order = Order::findOrFail($id);

      return view('pembeliorder.pembayaran',compact('order'));
    }

    public function pembayaran($id,Request $request)
    {
      $this->validate($request,[
        'bukti_pembayaran' => 'required|mimes:jpeg,jpg,png,bmp|max:10000'
      ]);
      $order = Order::findOrFail($id);
      if ($order->bukti_pembayaran) {
        Storage::delete($order->bukti_pembayaran);
      }
      $buktipembayaran = $request->file('bukti_pembayaran')->store('buktibayar');


      $order->update([
        'bukti_pembayaran' => $buktipembayaran,
        'status' =>1,
      ]);
      return redirect()->route('pembeli_order.donebayar')->with('msg','Bukti Pembayaran Telah DIupload Silahkan Tunggu Konfirmasi DAri admin');
    }

    public function donebayar()
    {
      return view('pembeliorder.donebayar');
    }

    public function cancelOrder($id)
    {
      $order = Order::findOrFail($id);

      $order->update([
        'status' => 4,
      ]);

      return redirect()->back()->with('msg','Orderan Anda Dibatalkan');
    }
}
