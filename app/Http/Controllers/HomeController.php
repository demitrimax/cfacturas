<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\clientes;
use App\Models\facsolicitud;

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
        $nclientes = clientes::count();
        $nsolicitudes = facsolicitud::count();
        $detsolicitudes = facsolicitud::get()->where('atendido',null);
        return view('home')->with(compact('nclientes','nsolicitudes','detsolicitudes'));
    }
}
