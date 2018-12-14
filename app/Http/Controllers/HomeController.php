<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\clientes;
use App\Models\facsolicitud;
use App\Models\accomercial;

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
        $detsolicitudes = facsolicitud::where('atendido',null)->paginate(10);
        $acuerdosactivos = accomercial::get()->where('autorizado',1);
        return view('home')->with(compact('nclientes','nsolicitudes','detsolicitudes','acuerdosactivos'));
    }
}
