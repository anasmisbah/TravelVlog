<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Pembeli;
use Auth;

class notificationController extends Controller
{
    public function get()
    {
      $notification = Auth::user()->unreadNotifications;
      return $notification;
    }
    public function read(Request $request)
    {
      Auth::user()->unreadNotifications()->find($request->id)->MarkAsRead();
      return 'succes';
    }
}
