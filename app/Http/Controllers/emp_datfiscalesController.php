<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createemp_datfiscalesRequest;
use App\Http\Requests\Updateemp_datfiscalesRequest;
use App\Repositories\emp_datfiscalesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\catestados;
use App\catmunicipios;

class emp_datfiscalesController extends AppBaseController
{
    /** @var  emp_datfiscalesRepository */
    private $empDatfiscalesRepository;

    public function __construct(emp_datfiscalesRepository $empDatfiscalesRepo)
    {
        $this->empDatfiscalesRepository = $empDatfiscalesRepo;
        $this->middleware('auth');
        $this->middleware('permission:empdatfiscales-list');
        $this->middleware('permission:empdatfiscales-create', ['only' => ['create','store']]);
        $this->middleware('permission:empdatfiscales-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empdatfiscales-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the emp_datfiscales.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empDatfiscalesRepository->pushCriteria(new RequestCriteria($request));
        $empDatfiscales = $this->empDatfiscalesRepository->all();

        return view('emp_datfiscales.index')
            ->with('empDatfiscales', $empDatfiscales);
    }

    /**
     * Show the form for creating a new emp_datfiscales.
     *
     * @return Response
     */
    public function create()
    {
        $estados = catestados::pluck('nombre','id');
        $municipios = catmunicipios::where('id_edo',1)->pluck('nomMunicipio','id');

        return view('emp_datfiscales.create')->with(compact('estados','municipios'));
    }

    /**
     * Store a newly created emp_datfiscales in storage.
     *
     * @param Createemp_datfiscalesRequest $request
     *
     * @return Response
     */
    public function store(Createemp_datfiscalesRequest $request)
    {
        $input = $request->all();

        ($input['sucursal']='on')? $input['sucursal'] = 1 : $input['sucursal'] = 0;
        //dd($input);

        $empDatfiscales = $this->empDatfiscalesRepository->create($input);

        Flash::success('Datos Fiscales guardados correctamente.');
        $sweet = 'Datos Fiscales guardados correctamente';
        if(isset($input['redirect'])){
          return redirect(route('catempresas.show', [$input['empresa_id']]))->with(compact('sweet'));
        }
        else {

        return redirect(route('catempresas.show',$input['empresa_id']))->with(compact('sweet'));
      }
    }

    /**
     * Display the specified emp_datfiscales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Datos Fiscales no encontrados');

            return redirect(route('empDatfiscales.index'));
        }

        return view('emp_datfiscales.show')->with('empDatfiscales', $empDatfiscales);
    }

    /**
     * Show the form for editing the specified emp_datfiscales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Datos fiscales no encontrados.');

            return redirect(route('empDatfiscales.index'));
        }
        $estados = catestados::pluck('nombre','id');
        $municipios = catmunicipios::pluck('nomMunicipio','id');
        return view('emp_datfiscales.edit')->with(compact('empDatfiscales','estados','municipios'));
    }

    /**
     * Update the specified emp_datfiscales in storage.
     *
     * @param  int              $id
     * @param Updateemp_datfiscalesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateemp_datfiscalesRequest $request)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Datos Fiscales no encontrados.');
            $sweeterror = 'Datos fiscales no encontrados';
            return redirect(route('empDatfiscales.index'))->with(compact('sweeterror'));
        }

        $empDatfiscales = $this->empDatfiscalesRepository->update($request->all(), $id);

        Flash::success('Datos Fiscales actualizados correctamente.');
        $sweet = 'Datos fiscales actualizados correctamente';
        return redirect(route('catempresas.show', $empDatfiscales->catempresa->id))->with(compact('sweet'));
        //return redirect(route('empDatfiscales.index'))->with(compact('sweet'));
    }

    /**
     * Remove the specified emp_datfiscales from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Datos Fiscales no encontrados.');

            return redirect(route('empDatfiscales.index'));
        }

        $this->empDatfiscalesRepository->delete($id);

        Flash::success('Datos Fiscales borrados correctamente.');

        if(isset($input['redirect'])){

          return redirect(route('catempresas.show', [$input['empresa_id']]));
        }
        else {

        return redirect(route('empDatfiscales.index'));
      }
    }
}
