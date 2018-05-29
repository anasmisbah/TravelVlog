<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiket;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tiket = Tiket::paginate(5);
        return view('home',compact('tiket'));
    }
}
