<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedatcontactoRequest;
use App\Http\Requests\UpdatedatcontactoRequest;
use App\Repositories\datcontactoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\clientes;

class datcontactoController extends AppBaseController
{
    /** @var  datcontactoRepository */
    private $datcontactoRepository;

    public function __construct(datcontactoRepository $datcontactoRepo)
    {
        $this->datcontactoRepository = $datcontactoRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the datcontacto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->datcontactoRepository->pushCriteria(new RequestCriteria($request));
        $datcontactos = $this->datcontactoRepository->all();

        return view('datcontactos.index')
            ->with('datcontactos', $datcontactos);
    }

    /**
     * Show the form for creating a new datcontacto.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = clientes::pluck('nombre','id');
        return view('datcontactos.create',compact('clientes'));
    }

    /**
     * Store a newly created datcontacto in storage.
     *
     * @param CreatedatcontactoRequest $request
     *
     * @return Response
     */
    public function store(CreatedatcontactoRequest $request)
    {
        $input = $request->all();
        //dd($input);
        //die;

        $datcontacto = $this->datcontactoRepository->create($input);

        Flash::success('Datos de contacto guardados correctamente.');

        if(isset($input['redirect'])){

          return redirect(route('clientes.show', [$input['cliente_id']]));
        }
        else {
        return redirect(route('datcontactos.index'));
      }
    }

    /**
     * Guardar un nuevo dato de contacto desde la vista de clientes
     *
     * @param CreatedatcontactoRequest $request
     *
     * @return Response
     */
    public function storeDos(CreatedatcontactoRequest $request)
    {
        $input = $request->all();
        dd($input);
        die;
        $datcontacto = $this->datcontactoRepository->create($input);

        Flash::success('Datos de contacto agregado correctamente.');

        return redirect(route('clientes.show', [$clientes->id]));
    }

    /**
     * Display the specified datcontacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $datcontacto = $this->datcontactoRepository->findWithoutFail($id);

        if (empty($datcontacto)) {
            Flash::error('Datos de contacto no encontrado.');

            return redirect(route('datcontactos.index'));
        }

        return view('datcontactos.show')->with('datcontacto', $datcontacto);
    }

    /**
     * Show the form for editing the specified datcontacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datcontacto = $this->datcontactoRepository->findWithoutFail($id);

        if (empty($datcontacto)) {
            Flash::error('Datos de contacto no encontrado.');

            return redirect(route('datcontactos.index'));
        }

        return view('datcontactos.edit')->with('datcontacto', $datcontacto);
    }

    /**
     * Update the specified datcontacto in storage.
     *
     * @param  int              $id
     * @param UpdatedatcontactoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedatcontactoRequest $request)
    {
        $datcontacto = $this->datcontactoRepository->findWithoutFail($id);

        if (empty($datcontacto)) {
            Flash::error('Datos de contacto no encontrado.');

            return redirect(route('datcontactos.index'));
        }

        $datcontacto = $this->datcontactoRepository->update($request->all(), $id);

        Flash::success('Información de contacto actualizada correctamente.');

        return redirect(route('datcontactos.index'));
    }

    /**
     * Remove the specified datcontacto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $datcontacto = $this->datcontactoRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($datcontacto)) {
            Flash::error('Información de contacto no encontrado.');

            return redirect(route('datcontactos.index'));
        }

        $this->datcontactoRepository->delete($id);

        Flash::success('Información de Contacto borrado correctamente.');

        if(isset($input['redirect'])){

          return redirect(route('clientes.show', [$input['cliente_id']]));
        }
        else {
        return redirect(route('datcontactos.index'));
      }
    }
}
