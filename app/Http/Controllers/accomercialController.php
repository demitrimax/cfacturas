<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaccomercialRequest;
use App\Http\Requests\UpdateaccomercialRequest;
use App\Repositories\accomercialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\clientes;
use App\Models\direcciones;
use App\Models\catcuentas;
use App\Models\catempresas;
use App\Models\accomercial;
use App\Models\users;
use App\acempresas;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\acuerdocomer;
use App\Mail\acuerdocomerinter;
use App\Mail\acuerdocomerinterno;
use App\User;
use App\Models\blog;
use App\Models\sociocomercial;
use Carbon\Carbon;
use Auth;


class accomercialController extends AppBaseController
{
    /** @var  accomercialRepository */
    private $accomercialRepository;

    public function __construct(accomercialRepository $accomercialRepo)
    {
        $this->accomercialRepository = $accomercialRepo;
        $this->middleware('auth');
        $this->middleware('permission:accomerciales-list');
        $this->middleware('permission:accomerciales-create', ['only' => ['create','store']]);
        $this->middleware('permission:accomerciales-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:accomerciales-delete', ['only' => ['destroy']]);
        $this->middleware('permission:accomerciales-supervised', ['only' => ['autoriza1']]);
        $this->middleware('permission:accomerciales-authorized', ['only' => ['autoriza2']]);
    }

    /**
     * Display a listing of the accomercial.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accomercialRepository->pushCriteria(new RequestCriteria($request));
        $accomercials = $this->accomercialRepository->all();

        return view('accomercials.index')
            ->with('accomercials', $accomercials);
    }

    /**
     * Show the form for creating a new accomercial.
     *
     * @return Response
     */
    public function create()
    {
        $sociocomer = sociocomercial::all();
        $sociocomer = $sociocomer->pluck('nombre','id');
        $clientes = clientes::all();
        $clientes = $clientes->pluck('nomcompleto','id');
        $usuarios = users::pluck('name','id');
        $userSupervisor = User::role('Supervisor')->pluck('name','id');
        $userGerente = User::role('gerente')->pluck('name','id');
        $empresas = catempresas::pluck('nombre','id');
        $blog = blog::find(1);

        return view('accomercials.create')->with(compact('sociocomer','clientes','empresas','usuarios', 'blog','userSupervisor','userGerente'));
    }

    /**
     * Store a newly created accomercial in storage.
     *
     * @param CreateaccomercialRequest $request
     *
     * @return Response
     */
    public function store(CreateaccomercialRequest $request)
    {
        $rules = [
          //'fechasolicitud' => 'required',
          'sociocomer_id' => 'integer|nullable',
          'cliente_id' => 'required',
          //'direccion_id' => 'required',
          //'cuenta_id' => 'required',
          'descripcion' => 'required',
          'ac_principalporc' => 'required',
          //'aut_user_id' => 'required',
          'empresasasoc' => 'required',
        ];
        $this->validate($request, $rules);

        $input = $request->all();

        //$accomercial = $this->accomercialRepository->create($input);
        ($input['autorizado']='on')? $input['autorizado'] = 1 : $input['autorizado'] = 0;
        //dd($request);
        $accomercial = new accomercial();
        $accomercial->fechasolicitud = $request->input('fechasolicitud');
        $accomercial->sociocomer_id = $request->input('sociocomer_id');
        $accomercial->asoc_comision = $request->input('asoc_comision');
        $accomercial->cliente_id = $request->input('cliente_id');
        $accomercial->direccion_id = $request->input('direccion_id');
        //$accomercial->cuenta_id = $request->input('cuenta_id');
        $accomercial->descripcion = $request->input('descripcion');
        $accomercial->informacion = $request->input('informacion');
        $accomercial->base = $request->input('base');
        $accomercial->ac_principalporc = $request->input('ac_principalporc');
        $accomercial->ac_secundarioporc = $request->input('ac_secundarioporc');
        $accomercial->autorizado = $request->input('autorizado');
        $accomercial->elab_user_id = $request->input('elab_user_id');
        if ($request->input('aut_user_id'))
        {
            $accomercial->aut_user_id = $request->input('aut_user_id');
        }
        if ($request->input('aut_user2_id'))
        {
              $accomercial->aut_user2_id = $request->input('aut_user2_id');
        }
        $accomercial->save();

        foreach ($request->input('empresasasoc') as $empresas)
        {
          $acempresas = new acempresas();
          $acempresas->acuerdoc_id = $accomercial->id;
          $acempresas->empresa_id = $empresas;
          $acempresas->save();
        }

        //A quienes se les envía email del alta de correo
        $gerentes = User::role('gerente')->get();
        $sociocomercial = '';
        $clientemail = $accomercial->cliente->correo;
        $usuarioelabora = $accomercial->elabuser;
        //dd($cliente->contacto);
        if (!empty($clientemail))
        {
          //Mail::to($cliente->correo)->send(new acuerdocomer($accomercial));
        }
          //Mail::to($usuarioelabora)->send(new acuerdocomerinter($accomercial));

        foreach($gerentes as $gerente)
        {
            Mail::to($gerente)->send(new acuerdocomerinterno($accomercial,$gerente));
        }

        //return (new \App\Mail\acuerdocomer($accomercial))->render();
        $sweet = 'Se han enviado correctamente notificaciones a los usuarios';

        Flash::success('Acuerdo Comercial guardado correctamente, Se enviaron correos electronicos a los participantes.');

        return redirect(route('accomercials.index'))->with(compact('sweet'));
    }

    /**
     * Display the specified accomercial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Acuerdo Comercial no encontrado.');
            Alert::error('Acuerdo Comercial no encontrado');
            return redirect(route('accomercials.index'));
        }

        return view('accomercials.show')->with('accomercial', $accomercial);
    }

    /**
     * Show the form for editing the specified accomercial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Acuerdo Comercial no encontado.');
            $sweeterror = 'Acuerdo Comercial no encontrado';
            return redirect(route('accomercials.index'))->with(compact('sweeterror'));
        }
        $sociocomer = sociocomercial::all();
        $sociocomer = $sociocomer->pluck('nombre','id');
        $clientes = clientes::all();
        $clientes = $clientes->pluck('nomcompleto','id');
        $userSupervisor = User::role('Supervisor')->pluck('name','id');
        $userGerente = User::role('gerente')->pluck('name','id');
        $usuarios = users::pluck('name','id');
        $empresas = catempresas::pluck('nombre','id');
        $empresassel = $accomercial->empresasfact;
        //dd($empresassel);

        return view('accomercials.edit')->with(compact('accomercial','sociocomer','clientes', 'empresas', 'usuarios','userSupervisor','userGerente','empresassel'));
    }

    /**
     * Update the specified accomercial in storage.
     *
     * @param  int              $id
     * @param UpdateaccomercialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaccomercialRequest $request)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Acuerdo Comercial no encontrado.');
            $sweeterror = 'Acuerdo Comercial no encontrado.';
            return redirect(route('accomercials.index'))->with(compact($sweeterror));
        }

        $accomercial = $this->accomercialRepository->update($request->all(), $id);
        $accomercial->empresasfact()->sync($request->input('empresasasoc'));

        Flash::success('Acuerdo Comercial actualizado correctamente.');
        $sweet = 'Acuerdo Comercial actualizado correctamente';

        return redirect(route('accomercials.index'))->with(compact('$sweet'));
    }

    /**
     * Remove the specified accomercial from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Acuerdo Comercial no encontrado.');
            $sweeterror = 'Acuerdo Comercial no encontrado';

            return redirect(route('accomercials.index'))->with(compact('sweeterror'));
        }
        if ($accomercial->facturas->count()>0) {
            Flash::error('No se puede eliminar el Acuerdo Comercial '.$accomercial->numacuerdo.', ya tiene facturas relacionadas.');
            Alert::error('No se puede eliminar el Acuerdo Comercial '.$accomercial->numacuerdo.', ya tiene facturas relacionadas.');

            return redirect(route('accomercials.index'));
        }

        $this->accomercialRepository->delete($id);

        Flash::success('Acuerdo comercial borrado correctamente.');
        $sweet = 'Acuerdo comercial borrado correctamente';

        return redirect(route('accomercials.index'))->with(compact('sweet'));
    }
    public function GetDirecciones($id)
    {
      $direcciones = direcciones::where('cliente_id',$id)->select('id','razonsocial')->get();
      return $direcciones;
    }
    public function GetCuentas($id)
    {
      $cuentas = catcuentas::where('cliente_id',$id)->select('id','numcuenta')->get();
      return $cuentas;
    }
    public function GetComisiones($id)
    {
      $comisiones = sociocomercial::where('id',$id)->select('id','comision')->get();
      return $comisiones;
    }
    //MUESTRA LA VERSION IMPRIMIBLE
    public function verprint($id)
    {
      $accomercial = $this->accomercialRepository->findWithoutFail($id);

      if (empty($accomercial)) {
          Flash::error('Acuerdo Comercial no encontrado.');
          $sweeterror = "Acuerdo comercial no encontrado";
          return redirect(route('accomercials.index'))->with(compact('sweeterror'));
      }

      return view('accomercials.viewacuerdoprint')->with('accomercial', $accomercial);
    }
    public function verpdf($id)
    {
      $accomercial = $this->accomercialRepository->findWithoutFail($id);

      if (empty($accomercial)) {
          Flash::error('Acuerdo Comercial no encontrado.');

          return redirect(route('accomercials.index'));
      }
      $pdf = PDF::loadView('accomercials.viewacuerdoprint',compact('accomercial'));
      return $pdf->download('acuerdo.pdf');
      //return view('accomercials.viewacuerdoprint')->with(compact('accomercial'));
    }
    public function notificaralta($id)
    {
            $accomercial = $this->accomercialRepository->findWithoutFail($id);
            if (empty($accomercial)) {
                Flash::error('Acuerdo Comercial no encontrado.');

                return redirect(route('accomercials.index'));
            }
            //A quienes se les envía email del alta de correo
            $gerentes = User::role('gerente')->get();
            $sociocomercial = '';
            $clientemail = $accomercial->cliente->correo;
            $usuarioelabora = $accomercial->elabuser;
            //dd($cliente->contacto);
            if (!empty($clientemail))
            {
              Mail::to($clientemail)->send(new acuerdocomer($accomercial));
            }
            Mail::to($usuarioelabora)->send(new acuerdocomerinter($accomercial));

            foreach($gerentes as $gerente)
            {
                Mail::to($gerente)->send(new acuerdocomerinterno($accomercial,$gerente));
            }
            //return (new \App\Mail\acuerdocomer($accomercial))->render();
            $mensaje = 'Se han enviado correctamente notificaciones a los usuarios';
            return back()->with(compact('mensaje'));

    }

    public function GetAjaxAcuerdo($id)
    {
      //$accomercial = accomercial::where('id',$id)->get();
      $accomercial = $this->accomercialRepository->findWithoutFail($id);
      //$dataccomercial = $accomercial->pluck('id','')->get();
      return $accomercial;
    }

    public function autoriza1($id)
    {
          $accomercial = accomercial::find($id);
          $accomercial->aut1_at = Carbon::now()->toDateTimeString();
          $accomercial->aut_user_id = Auth::user()->id;
          $accomercial->save();
          $sweet = 'Acuerdo comercial Autorizado por Supervisor';
          return back()->with(compact('sweet'));
    }
    public function autoriza2($id)
    {
          $accomercial = accomercial::find($id);
          $accomercial->aut2_at = Carbon::now()->toDateTimeString();
          $accomercial->aut_user2_id = Auth::user()->id;
          $accomercial->save();
          $sweet = 'Acuerdo comercial Autorizado por Gerente';
          return back()->with(compact('sweet'));

    }
}
