<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatcuentasRequest;
use App\Http\Requests\UpdatecatcuentasRequest;
use App\Repositories\catcuentasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\cat_bancos;
use App\Models\clientes;
use App\Models\catempresas;
use App\Models\catcuentas;

class catcuentasController extends AppBaseController
{
    /** @var  catcuentasRepository */
    private $catcuentasRepository;

    public function __construct(catcuentasRepository $catcuentasRepo)
    {
        $this->catcuentasRepository = $catcuentasRepo;
    }

    /**
     * Display a listing of the catcuentas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catcuentasRepository->pushCriteria(new RequestCriteria($request));
        $catcuentas = $this->catcuentasRepository->all();
        //dd($catcuentas);
        //die;
        return view('catcuentas.index')
            ->with(compact('catcuentas'));
    }

    /**
     * Show the form for creating a new catcuentas.
     *
     * @return Response
     */
    public function create()
    {
        $bancos = cat_bancos::pluck('nombrecorto','id');
        $clientes = clientes::all();
        $clientes = $clientes->pluck('nomcompleto','id');
        $empresas = catempresas::pluck('nombre','id');

        return view('catcuentas.create')->with(compact('bancos','clientes','empresas'));
    }

    /**
     * Store a newly created catcuentas in storage.
     *
     * @param CreatecatcuentasRequest $request
     *
     * @return Response
     */
    public function store(CreatecatcuentasRequest $request)
    {
        $cuentas = catcuentas::where('numcuenta', $request->input('numcuenta'))->where('banco_id',$request->input('banco_id'))->first();
        if (count($cuentas)>0) {
          Flash::error('Ya existe una Cuenta Bancaria en el mismo Banco');
          $errorflash = "Cuenta existente";
          return back()->with($errorflash);
        }

        $rules = [
          'banco_id' => 'required',
          'numcuenta' => 'required|max:10',
          'clabeinterbancaria' => 'nullable|digits:18|unique:catcuentas',
          'sucursal' => 'max:5',
        ];
        $this->validate($request, $rules);

        $input = $request->all();

        $catcuentas = $this->catcuentasRepository->create($input);

        Flash::success('Cuenta guardada correctamente.');
        if(isset($input['redirect'])){
          $redirect = $input['redirect'];
          if (isset($input['cliente_id']))
          {
            $retornaid =$input['cliente_id'];
          }
          if (isset($input['empresa_id']))
          {
            $retornaid = $input['empresa_id'];
          }
          return redirect(route($redirect, [$retornaid]));
        }
        else {

        return redirect(route('catcuentas.index'));
      }
    }

    /**
     * Display the specified catcuentas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catcuentas = $this->catcuentasRepository->findWithoutFail($id);

        if (empty($catcuentas)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('catcuentas.index'));
        }

        return view('catcuentas.show')->with('catcuentas', $catcuentas);
    }

    /**
     * Show the form for editing the specified catcuentas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catcuentas = $this->catcuentasRepository->findWithoutFail($id);

        if (empty($catcuentas)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('catcuentas.index'));
        }
        $bancos = cat_bancos::pluck('nombrecorto','id');
        $clientes = clientes::all();
        $clientes = $clientes->pluck('nomcompleto','id');
        $empresas = catempresas::pluck('nombre','id');

        return view('catcuentas.edit')->with(compact('catcuentas','clientes','bancos','empresas'));
    }

    /**
     * Update the specified catcuentas in storage.
     *
     * @param  int              $id
     * @param UpdatecatcuentasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatcuentasRequest $request)
    {
        $catcuentas = $this->catcuentasRepository->findWithoutFail($id);

        if (empty($catcuentas)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('catcuentas.index'));
        }

        $catcuentas = $this->catcuentasRepository->update($request->all(), $id);

        Flash::success('Cuenta actualizada correctamente.');

        return redirect(route('catcuentas.index'));
    }

    /**
     * Remove the specified catcuentas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $catcuentas = $this->catcuentasRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($catcuentas)) {
            Flash::error('Cuenta no encontrada');

            return redirect(route('catcuentas.index'));
        }

        $this->catcuentasRepository->delete($id);

        Flash::success('Cuenta borrada correctamente.');
        if(isset($input['redirect'])){
          $redirectroute = $input['redirect'];
          if (isset($input['cliente_id']))
          {
            $showid = $input['cliente_id'];
          }
          if (isset($input['empresa_id']))
          {
            $showid = $input['empresa_id'];
          }

          return redirect(route($redirectroute, $showid));
        }
        else {

        return redirect(route('catcuentas.index'));
      }
    }
}
