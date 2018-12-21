<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\facsolicitud;
use App\User;
use Spatie\Permission\Models\Role;
use App\Mail\SolicitudFactura;
use App\Mail\NuevaSolicitud;
use Mail;

class solicitudController extends Controller
{
    //
    public function index()
    {
      return view('solicitud');
    }

    public function solfactura()
    {
        //return "hola";
      return view('solicitudes.solicitud');
    }

    public function store(request $request)
    {

      $rules = [
        'nombre' => 'required',
        'user_id' => 'required',
        'correo' => 'required',
        //'rfc' => 'exists:direcciones,RFC',
        'telefono' => 'required',
        'condicion' => 'required',
        'metodo' => 'required'
      ];
      $messages = [
        'nombre.required' => 'Es necesario un nombre',
        'correo.required' => 'El correo es requerido',
        //'rfc.exists' => 'El RFC no existe en nuestros registros',
        'user_id.required' => 'Se requiere un ID de usuario registrado',
      ];
      $this->validate($request, $rules, $messages);

      $solicitudfac = new facsolicitud();
      $solicitudfac->nombre = $request->input('nombre');
      $solicitudfac->user_id = $request->input('user_id');
      $solicitudfac->correo = $request->input('correo');
      $solicitudfac->telefono = $request->input('telefono');
      $solicitudfac->rfc = $request->input('rfc');
      $solicitudfac->condicion = $request->input('condicion');
      $solicitudfac->metodo = $request->input('metodo');
      $solicitudfac->forma = $request->input('forma');
      $solicitudfac->concepto = $request->input('concepto');
      $solicitudfac->comentario = $request->input('comentario');
      $solicitudfac->fecha = date(now());
      //GUARDAR EL ARCHIVO ADJUNTO SI LO HAY
      if ($request->file('adjunto'))
      {
        $file = $request->file('adjunto');
        $path = public_path() . '/solicitudes/';
        $nombre = uniqid().$file->getClientOriginalName();
        $file->move($path, $nombre);

        $solicitudfac->adjunto = 'solicitudes/'.$nombre;
      }
      $solicitudfac->save();
      $mensaje = 'Se ha enviado correctamente su solicitud. En breve recibirá un correo electrónico como acuse de recibo.';
      //envío de correo electronico
      $gerentes = User::role('gerente')->get();
      $usuario = User::find($solicitudfac->user_id);
      Mail::to($gerentes)->send(new NuevaSolicitud($usuario, $solicitudfac));
      Mail::to($solicitudfac->correo)->send(new NuevaSolicitud($usuario, $solicitudfac));
      $sweet = 'Solicitud Creada';

      return back()->with(compact('mensaje','sweet'));

    }
}
