<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\clientes;
use App\Models\facsolicitud;
use App\Models\accomercial;
use Spatie\Activitylog\Models\Activity;
use Auth;

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
        //Activity::all();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        activity()->log('Home Dashboard')->causedBy(Auth::user());
        $nclientes = clientes::count();
        $nsolicitudes = facsolicitud::count();
        $detsolicitudes = facsolicitud::where('atendido',null)->orwhereNotNull('atendido')->paginate(10);
        $acuerdosactivos = accomercial::get()->where('autorizado',1);
        return view('home')->with(compact('nclientes','nsolicitudes','detsolicitudes','acuerdosactivos'));
    }
}
