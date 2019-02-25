<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesolicitudesRequest;
use App\Http\Requests\UpdatesolicitudesRequest;
use App\Repositories\solicitudesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Helpers\SomeClass;
use App\Helpers\RecortarTexto;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudEliminada;
use App\Mail\NuevaSolicitud;
use Auth;
use App\Models\users;
use App\User;
use App\Models\facsolicitud;
use App\Models\usocfdi;
use App\Models\pagometodo;
use App\Models\formapago;
use App\Models\clientes;
use App\Models\catempresas;
use App\catunidmed;
use App\catsatprodser;
use App\facdetsolicitud;
use PDF;
use App\Models\cattipodoc;
use App\Models\comprobantes;
use App\Models\cat_bancos;

class solicitudesController extends AppBaseController
{
    /** @var  solicitudesRepository */
    private $solicitudesRepository;

    public function __construct(solicitudesRepository $solicitudesRepo)
    {
        $this->solicitudesRepository = $solicitudesRepo;
        $this->middleware('auth');
        $this->middleware('permission:solicitud-list');
        $this->middleware('permission:solicitud-create', ['only' => ['create','store']]);
        $this->middleware('permission:solicitud-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:solicitud-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the solicitudes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->solicitudesRepository->pushCriteria(new RequestCriteria($request));
        $solicitudes = $this->solicitudesRepository->paginate(10);



        //$textcorto = RecortarTexto::recortar_texto($solicitudes);
        return view('solicitudes.index')
            ->with(compact('solicitudes'));
    }

    /**
     * Display a listing of the solicitudes eliminadas
     *
     * @param Request $request
     * @return Response
     */
    public function deleted()
    {
        //$this->solicitudesRepository->pushCriteria(new RequestCriteria($request));
        //$solicitudes = $this->solicitudesRepository->paginate(10);
        $solicitudes = facsolicitud::onlyTrashed()->paginate(10);

        //$textcorto = RecortarTexto::recortar_texto($solicitudes);
        return view('solicitudes.index')
            ->with(compact('solicitudes'));
    }

    /**
     * Show the form for creating a new solicitudes.
     *
     * @return Response
     */
    public function create()
    {
        $usocfdi = usocfdi::all();
        $usocfdi = $usocfdi->pluck('usocfdicod','id');
        $metodo = pagometodo::pluck('nombre','id');
        $forma = formapago::pluck('descripcion','id');
        $clientes = clientes::all();
        $clientes = $clientes->pluck('nombrerfc','RFC');
        $claveunits = catunidmed::pluck('nombre','clave');
        $catempresas = catempresas::pluck('nombre','id');
        return view('solicitudes.solicitud')->with(compact('usocfdi','metodo','forma','clientes','claveunits','catempresas'));
    }

    /**
     * Store a newly created solicitudes in storage.
     *
     * @param CreatesolicitudesRequest $request
     *
     * @return Response
     */
    public function store(CreatesolicitudesRequest $request)
    {
      $rules = [
        'nombre' => 'required',
        'user_id' => 'required',
        //'correo' => 'required',
        //'rfc' => 'exists:direcciones,RFC',
        //'telefono' => 'required',
        //'condicion' => 'required',
        'concepto' => 'required',
        'metodo' => 'required'
      ];
      $messages = [
        'nombre.required' => 'Es necesario un nombre',
        //'correo.required' => 'El correo es requerido',
        //'rfc.exists' => 'El RFC no existe en nuestros registros',
        'user_id.required' => 'Se requiere un ID de usuario registrado',
        'concepto.required' => 'Es requerido el campo Concepto.',
      ];

        $input = $request->all();
        //dd($input);
        $solicitudes = $this->solicitudesRepository->create($input);

        Flash::success('Solicitud guardada correctamente.');
        $sweet = 'Solicitud guardada correctamente';
        return redirect(route('solicitudes.index'))->with(compact('sweet'));
    }

    /**
     * Display the specified solicitudes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);
        if (!empty($solicitudes))
        {
          $tamanoadjunto = "(No Existe Archivo)";
          if (file_exists($solicitudes->adjunto))
          {
              $tamanoadjunto = SomeClass::bytesToHuman(filesize($solicitudes->adjunto));
          }

          $empleados = User::role(['empleado','gerente'])->get();
          $empleados = $empleados->pluck('name','id');
          $borrados = facsolicitud::onlyTrashed()->count();
          $bancos = cat_bancos::pluck('nombrecorto','id');
          if($solicitudes->atendidopor)
          {
            $usuarioid = $solicitudes->atendidopor;
            $tipodocs = cattipodoc::pluck('tipo','id');
            $asignadas = facsolicitud::where('atendidopor',$usuarioid)->count();
            $atendidas = facsolicitud::where('atendidopor',$usuarioid)->where('atendido',1)->count();
            $borradas = facsolicitud::onlyTrashed()->where('atendidopor',$usuarioid)->count();
          }

        }

        if (empty($solicitudes)) {
            Flash::error('Solicitud no encontrada');
            $sweeterror = 'Solicitud no encontrada';

            return redirect(route('solfact.index'))->with(compact('sweeterror'));
        }
        //dd($solicitudes);
        return view('solicitudes.show')->with(compact('solicitudes','tamanoadjunto','empleados','borrados','asignadas','atendidas','borradas','tipodocs','bancos'));

    }

    /**
     * Show the form for editing the specified solicitudes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

        if (empty($solicitudes)) {
            Flash::error('Solicitudes not found');

            return redirect(route('solfact.index'));
        }
        $usocfdi = usocfdi::all();
        $usocfdi = $usocfdi->pluck('usocfdicod','id');
        $metodo = pagometodo::pluck('nombre','id');
        $forma = formapago::pluck('descripcion','id');
        $clientes = clientes::all();
        $clientes = $clientes->pluck('nombrerfc','RFC');
        $claveunits = catunidmed::pluck('nombre','clave');
        $catempresas = catempresas::pluck('nombre','id');

        return view('solicitudes.edit')->with(compact('solicitudes','clientes','catempresas','forma','metodo','usocfdi'));
    }

    /**
     * Update the specified solicitudes in storage.
     *
     * @param  int              $id
     * @param UpdatesolicitudesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesolicitudesRequest $request)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

        if (empty($solicitudes)) {
            Flash::error('Solicitudes not found');

            return redirect(route('solfact.index'));
        }

        $solicitudes = $this->solicitudesRepository->update($request->all(), $id);

        Flash::success('Solicitudes updated successfully.');

        return redirect(route('solfact.index'));
    }

    /**
     * Remove the specified solicitudes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

        if (empty($solicitudes)) {
            Flash::error('Solicitud no encontrada');
            $sweeterror = 'Solicitud no encontrada';
            return redirect(route('solfact.index'))->with(compact('sweeterror'));
        }
        //A QUIEN SE LE VA ENVIAR NOTIFICACION QUE SE BORRO LA SOLICITUD
        $cliente = $solicitudes->correo;
        $usuario = $solicitudes->usuario;
        $usuarioelimina = Auth::user()->name;
        //SE ENVIA ANTES QUE SE ELIMINE
        //YA NO ENVIARA CORREO PARA INFORMAR DE ELIMINACION
        //Mail::to($usuario,$cliente)->send(new SolicitudEliminada($solicitudes,$usuarioelimina));

        $this->solicitudesRepository->delete($id);

        Flash::success('Solicitud borrada correctamente.');
        $sweet = 'Solicitud borrada correctamente';

        return redirect(route('solfact.index'))->with(compact('sweet'));
    }
      //RESTAURAR UNA SOLICITUD ESPECIFICA
    public function restaura(Request $request)
    {
      $solicitud = facsolicitud::withTrashed()->where('id',$request['solicitudid'])->first();
      //dd($solicitud);
      if (empty($solicitud)) {
          Flash::error('No se ha podido restaurar, solicitud no encontrada');
          $sweeterror = 'No se ha podido restaurar, solicitud no encontrada';
          return redirect(route('solfact.index'))->with(compact('sweeterror'));
      }
      $solicitud->restore();
      $sweet = 'Registro restaurado correctamente';
      return redirect(route('solfact.index'))->with(compact('sweet'));
    }
    //ASIGNAR EMPLEADO A UNA SOLICITUD
    public function asignar(Request $request)
    {
      //FUNCION PARA ASIGNAR EMPLEADO PARA ATENDER SOLICITUD DE FACTURA
      $id = $request->input('solicitudid');
      $solicitudes = facsolicitud::find($id);

      if (empty($solicitudes)) {
          Flash::error('Solicitud no encontrada');
          $sweeterror = 'Solicitud no encontrada';
          return redirect(route('solfact.index'))->with(compact('sweeterror'));
      }
      $solicitudes->atendidopor = $request->input('usuario');
      $solicitudes->save();

      Flash::success('Se ha asignado usuario correctamente.');
      $sweet = 'Se ha asignado un usuario para atender la solicitud.';

      return redirect(route('solfact.show',[$id]))->with(compact('sweet'));

    }
    public function registrosborrados()
    {
      $borrados = facsolicitud::onlyTrashed()->count();
      return $solicitudes;
    }
    public function getUmedida(Request $request)
    {
      $palabra = $request['word'];
      $claveunits = catunidmed::where('clave','like','%'.$palabra.'%')->get();
      return $claveunits;

    }
    public function getClaveps(Request $request)
    {
      $clave = trim($request['q']);
      $clavesdes = catsatprodser::where('nombre','like','%'.$clave.'%')->limit(50)->get();
      if($clavesdes->count()==0)
      {
        $clavesdes = catsatprodser::where('id','like','%'.$clave.'%')->limit(50)->get();
      }
      return $clavesdes;

    }

    public function printInterEmpresa($id)
    {
      $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

      if (empty($solicitudes)) {
          Flash::error('Solicitud no encontrada');
          $sweeterror = 'Solicitud no encontrada';

          return redirect(route('solfact.index'))->with(compact('sweeterror'));
      }
      //dd($solicitudes);
      return view('solicitudes.printInterEmp')->with(compact('solicitudes'));
    }
    public function InterEmpresaPDF($id)
    {
      $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

      if (empty($solicitudes)) {
          Flash::error('Solicitud no encontrada');
          $sweeterror = 'Solicitud no encontrada';

          return redirect(route('solfact.index'))->with(compact('sweeterror'));
      }
      $pdf = PDF::loadView('solicitudes.pdfInterEmp',compact('solicitudes'));
      return $pdf->download('solinteremp.pdf');
      //return view('solicitudes.pdfInterEmp')->with(compact('solicitudes'));
    }

    public function comprobantestore(Request $request)
    {
      $rules = [
        //'fechasolicitud' => 'required',
        'solicitud_id' => 'required',
        'archivo'      => 'required',
        'nota'         => 'required|max:100',
        'foliocomp'        => 'required|max:18',
      ];
        $this->validate($request, $rules);
        $input = $request->all();
        $solicitudid = $input['solicitud_id'];

        $comprobante = new comprobantes;

        if($request->has('archivo'))
        {

          $comprobante->archivo = $request->file('archivo')->store('comprobante');
          $comprobante->documento = $request->file('archivo')->getClientOriginalName();
          $comprobante->nota = $request->input('nota');
          $comprobante->foliocomp = $request->input('foliocomp');
          $comprobante->banco_id = $request->input('bancoid');
          $comprobante->save();
          $comprobante->solicitudes()->attach($solicitudid);
          Alert::success('Se ha cargado correctamente el comprobante');
        }
        else {
          Alert::error('Ha ocurrido un error al cargar el comprobante');
        }

        return back();
    }

}
