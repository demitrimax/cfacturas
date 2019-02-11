<?php
//ESTE CONTROLLER SOLO SE USA PARA GUARDAR SOLICITUDES
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\facsolicitud;
use App\User;
use Spatie\Permission\Models\Role;
use App\Mail\SolicitudFactura;
use App\Mail\NuevaSolicitud;
use App\Mail\NotificaSolicitudFactura;
use Mail;
use App\facdetsolicitud;

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
        //'correo' => 'required',
        //'rfc' => 'exists:direcciones,RFC',
        //'telefono' => 'required',
        //'condicion' => 'required',
        'metodo' => 'required',
        'concepto' => 'required',
      ];
      $messages = [
        'nombre.required' => 'Es necesario un nombre',
        'correo.required' => 'El correo es requerido',
        //'rfc.exists' => 'El RFC no existe en nuestros registros',
        'user_id.required' => 'Se requiere un ID de usuario registrado',
        'concepto.required' => 'Por favor se requiere el Campo Concepto.',
      ];
      //dd($request);
      $this->validate($request, $rules, $messages);

      $solicitudfac = new facsolicitud();
      $solicitudfac->nombre = $request->input('nombre');
      $solicitudfac->user_id = $request->input('user_id');
      //$solicitudfac->correo = $request->input('correo');
      //$solicitudfac->telefono = $request->input('telefono');
      $solicitudfac->rfc = $request->input('rfc');
      $solicitudfac->condicion = $request->input('condicion');
      $solicitudfac->metodo = $request->input('metodo');
      $solicitudfac->forma = $request->input('forma');
      $solicitudfac->concepto = $request->input('concepto');
      $solicitudfac->comentario = $request->input('comentario');
      $solicitudfac->fecha = date(now());
      $cTotal = floatval(str_replace(',','',$request->input('cTotal')));
      $solicitudfac->total = $cTotal;
      $csubtotal = floatval(str_replace(',','',$request->input('csubtotal')));
      $solicitudfac->subtotal = $csubtotal;
      $civa = floatval(str_replace(',','',$request->input('civa')));
      $solicitudfac->iva = $civa;
      $solicitudfac->catemp_id = $request->input('catemp_id');
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

      //GUARDAR LOS DATOS DE LA SOLICITUD INTEREMPRESA SI FUERON SOLICITADOS
      $input = $request->all();
      //dd($input);
      foreach ($input['cantidad'] as $key=>$cantidad )
      {
        if(!empty($input['claveprod'][$key]))
        {
          $interEmpresa = new facdetsolicitud();
          $interEmpresa->solicitud_id = $solicitudfac->id;
          $interEmpresa->cantidad = $input['cantidad'][$key];
          $interEmpresa->umedida = $input['unidadmedidasat'][$key];
          $interEmpresa->unidad = $input['unidadmedida'][$key];
          $interEmpresa->prodserv_id = $input['claveprod'][$key];
          $interEmpresa->descripcion = $input['descripcion'][$key];
          $interEmpresa->punitario = $input['importecon'][$key];
          $interEmpresa->monto = $input['montoconcepto'][$key];
          $interEmpresa->save();
        }
      }


      $mensaje = 'Se ha enviado correctamente su solicitud. En breve recibirá un correo electrónico como acuse de recibo.';
      //envío de correo electronico
      $enviomails = User::role('emailnotify')->get();
      $usuario = User::find($solicitudfac->user_id);
      foreach($enviomails as $enviara)
      {
        Mail::to($enviara)->send(new NotificaSolicitudFactura($usuario, $solicitudfac));
      }
      //Mail::to($solicitudfac->correo)->send(new NuevaSolicitud($usuario, $solicitudfac));
      $sweet = 'Solicitud Creada';

      return back()->with(compact('mensaje','sweet'));

    }
}
