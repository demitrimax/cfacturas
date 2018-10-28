<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedireccionesRequest;
use App\Http\Requests\UpdatedireccionesRequest;
use App\Repositories\direccionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\clientes;

class direccionesController extends AppBaseController
{
    /** @var  direccionesRepository */
    private $direccionesRepository;

    public function __construct(direccionesRepository $direccionesRepo)
    {
        $this->direccionesRepository = $direccionesRepo;
    }

    /**
     * Display a listing of the direcciones.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->direccionesRepository->pushCriteria(new RequestCriteria($request));
        $direcciones = $this->direccionesRepository->all();

        return view('direcciones.index')
            ->with('direcciones', $direcciones);
    }

    /**
     * Show the form for creating a new direcciones.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = clientes::pluck('nombre','id');
        return view('direcciones.create',compact('clientes'));
    }

    /**
     * Store a newly created direcciones in storage.
     *
     * @param CreatedireccionesRequest $request
     *
     * @return Response
     */
    public function store(CreatedireccionesRequest $request)
    {
        $input = $request->all();

        $direcciones = $this->direccionesRepository->create($input);

        Flash::success('Direcciones saved successfully.');

        return redirect(route('direcciones.index'));
    }

    /**
     * Display the specified direcciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Direcciones not found');

            return redirect(route('direcciones.index'));
        }

        return view('direcciones.show')->with('direcciones', $direcciones);
    }

    /**
     * Show the form for editing the specified direcciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Direcciones not found');

            return redirect(route('direcciones.index'));
        }

        return view('direcciones.edit')->with('direcciones', $direcciones);
    }

    /**
     * Update the specified direcciones in storage.
     *
     * @param  int              $id
     * @param UpdatedireccionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedireccionesRequest $request)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Direcciones not found');

            return redirect(route('direcciones.index'));
        }

        $direcciones = $this->direccionesRepository->update($request->all(), $id);

        Flash::success('Direcciones updated successfully.');

        return redirect(route('direcciones.index'));
    }

    /**
     * Remove the specified direcciones from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Direcciones not found');

            return redirect(route('direcciones.index'));
        }

        $this->direccionesRepository->delete($id);

        Flash::success('Direcciones deleted successfully.');

        return redirect(route('direcciones.index'));
    }
}
