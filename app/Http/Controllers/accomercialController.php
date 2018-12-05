<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaccomercialRequest;
use App\Http\Requests\UpdateaccomercialRequest;
use App\Repositories\accomercialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\clientes;
use App\Models\direcciones;
use App\Models\catcuentas;
use App\Models\catempresas;
use App\Models\accomercial;
use App\Models\users;
use App\acempresas;

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
        $sociocomer = clientes::all();
        $sociocomer = $sociocomer->pluck('nomcompleto','id');
        $clientes = clientes::all();
        $clientes = $sociocomer;
        $usuarios = users::pluck('name','id');
        $empresas = catempresas::pluck('nombre','id');

        return view('accomercials.create')->with(compact('sociocomer','clientes','empresas','usuarios'));
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
          'direccion_id' => 'required',
          'cuenta_id' => 'required',
          'descripcion' => 'required',
          'ac_principalporc' => 'required',
          'aut_user_id' => 'required',
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
        $accomercial->cuenta_id = $request->input('cuenta_id');
        $accomercial->descripcion = $request->input('descripcion');
        $accomercial->informacion = $request->input('informacion');
        $accomercial->ac_principalporc = $request->input('ac_principalporc');
        $accomercial->ac_secundarioporc = $request->input('ac_secundarioporc');
        $accomercial->autorizado = $request->input('autorizado');
        $accomercial->elab_user_id = $request->input('elab_user_id');
        $accomercial->aut_user_id = $request->input('aut_user_id');
        $accomercial->aut_user2_id = $request->input('aut_user2_id');
        $accomercial->save();

        foreach ($request->input('empresasasoc') as $empresas)
        {
          $acempresas = new acempresas();
          $acempresas->acuerdoc_id = $accomercial->id;
          $acempresas->empresa_id = $empresas;
          $acempresas->save();
        }


        Flash::success('Acuerdo Comercial guardado correctamente.');

        return redirect(route('accomercials.index'));
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

            return redirect(route('accomercials.index'));
        }
        $sociocomer = clientes::all();
        $sociocomer = $sociocomer->pluck('nomcompleto','id');
        $clientes = clientes::all();
        $clientes = $sociocomer;
        $usuarios = users::pluck('name','id');
        $empresas = catempresas::pluck('nombre','id');

        return view('accomercials.edit')->with(compact('accomercial','sociocomer','clientes', 'empresas', 'usuarios'));
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

            return redirect(route('accomercials.index'));
        }

        $accomercial = $this->accomercialRepository->update($request->all(), $id);

        Flash::success('Acuerdo Comercial actualizado correctamente.');

        return redirect(route('accomercials.index'));
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

            return redirect(route('accomercials.index'));
        }

        $this->accomercialRepository->delete($id);

        Flash::success('Acuerdo comercial borrado correctamente.');

        return redirect(route('accomercials.index'));
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
}
