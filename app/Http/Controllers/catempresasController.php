<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatempresasRequest;
use App\Http\Requests\UpdatecatempresasRequest;
use App\Repositories\catempresasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\catestados;
use App\catmunicipios;
use App\Models\cattipodoc;
use App\Models\catdocumentos;
use App\Models\cat_bancos;
use App\Models\catgiroempresa;
use Alert;

class catempresasController extends AppBaseController
{
    /** @var  catempresasRepository */
    private $catempresasRepository;

    public function __construct(catempresasRepository $catempresasRepo)
    {
        $this->catempresasRepository = $catempresasRepo;
        $this->middleware('auth');
        $this->middleware('permission:empresas-list');
        $this->middleware('permission:empresas-create', ['only' => ['create','store']]);
        $this->middleware('permission:empresas-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empresas-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the catempresas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catempresasRepository->pushCriteria(new RequestCriteria($request));
        $catempresas = $this->catempresasRepository->all();

        return view('catempresas.index')
            ->with('catempresas', $catempresas);
    }

    /**
     * Show the form for creating a new catempresas.
     *
     * @return Response
     */
    public function create()
    {
        $giro = catgiroempresa::pluck('descripcion','id');
        return view('catempresas.create')->with(compact('giro'));
    }

    /**
     * Store a newly created catempresas in storage.
     *
     * @param CreatecatempresasRequest $request
     *
     * @return Response
     */
    public function store(CreatecatempresasRequest $request)
    {
        $input = $request->all();

        $catempresas = $this->catempresasRepository->create($input);

        Flash::success('Empresa guardada correctamente.');
        Alert::success('Empresa guardada correctamente.','Muy Bien!');

        return redirect(route('catempresas.index'));
    }

    /**
     * Display the specified catempresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);

        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');
            Alert::error('Empresa no encontrada','Ha ocurrido un error');

            return redirect(route('catempresas.index'));
        }
        $tipodocs = cattipodoc::pluck('tipo','id');
        $estados = catestados::pluck('nombre','id');
        $bancos = cat_bancos::pluck('nombrecorto','id');
        return view('catempresas.show')->with(compact('catempresas','estados','tipodocs','bancos'));
    }

    /**
     * Show the form for editing the specified catempresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);

        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');

            return redirect(route('catempresas.index'));
        }
        $giro = catgiroempresa::pluck('descripcion','id');
        return view('catempresas.edit')->with(compact('catempresas','giro'));
    }

    /**
     * Update the specified catempresas in storage.
     *
     * @param  int              $id
     * @param UpdatecatempresasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatempresasRequest $request)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);

        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');
            Alert::error('Empresa no encontrada');

            return redirect(route('catempresas.index'));
        }

        $catempresas = $this->catempresasRepository->update($request->all(), $id);

        Flash::success('Empresa actualizada correctamente.');
        Alert::success('Empresa actualizada correctamente.','Datos Actualizados');

        return redirect(route('catempresas.index'));
    }

    /**
     * Remove the specified catempresas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);



        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');
            Alert::error('Empresa no encontrada','Error');

            return redirect(route('catempresas.index'));
        }
        //verificar que la empresa no tenga acuerdos comerciales
        if ($catempresas->acuerdosvinculo()->count()>0)
        {
            Flash::error('La empresa no puede ser eliminada, tiene Acuerdos Comerciales Activos');
            $sweeterror='La empresa no puede ser eliminada, tiene Acuerdos Comerciales Activos';
            return redirect(route('catempresas.index'))->with(compact('sweeterror'));
        }

        $this->catempresasRepository->delete($id);

        Flash::success('Empresa borrada correctamente.');
        Alert::success('Empresa borrada correctamente.','Borrado');

        return redirect(route('catempresas.index'));
    }
}
