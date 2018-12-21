<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefacestatusRequest;
use App\Http\Requests\UpdatefacestatusRequest;
use App\Repositories\facestatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class facestatusController extends AppBaseController
{
    /** @var  facestatusRepository */
    private $facestatusRepository;

    public function __construct(facestatusRepository $facestatusRepo)
    {
        $this->facestatusRepository = $facestatusRepo;
    }

    /**
     * Display a listing of the facestatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->facestatusRepository->pushCriteria(new RequestCriteria($request));
        $facestatuses = $this->facestatusRepository->all();

        return view('facestatuses.index')
            ->with('facestatuses', $facestatuses);
    }

    /**
     * Show the form for creating a new facestatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('facestatuses.create');
    }

    /**
     * Store a newly created facestatus in storage.
     *
     * @param CreatefacestatusRequest $request
     *
     * @return Response
     */
    public function store(CreatefacestatusRequest $request)
    {
        $input = $request->all();

        $facestatus = $this->facestatusRepository->create($input);

        Flash::success('Estatus de factura guardada correctamente.');
        $sweet = 'Estatus de factura guardada correctamente.';

        return redirect(route('facestatuses.index'))->with(compact('sweet'));
    }

    /**
     * Display the specified facestatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facestatus = $this->facestatusRepository->findWithoutFail($id);

        if (empty($facestatus)) {
            Flash::error('Estatus de factura no encontrado');
            $sweeterror = 'Estatus de factura no encontrado';
            return redirect(route('facestatuses.index'))->with(compact('sweeterror'));
        }

        return view('facestatuses.show')->with('facestatus', $facestatus);
    }

    /**
     * Show the form for editing the specified facestatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facestatus = $this->facestatusRepository->findWithoutFail($id);

        if (empty($facestatus)) {
            Flash::error('Estatus no encontrado');
            $sweeterror = 'Estatus de factura no encontrado';
            return redirect(route('facestatuses.index'))->with(compact('sweeterror'));
        }

        return view('facestatuses.edit')->with('facestatus', $facestatus);
    }

    /**
     * Update the specified facestatus in storage.
     *
     * @param  int              $id
     * @param UpdatefacestatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefacestatusRequest $request)
    {
        $facestatus = $this->facestatusRepository->findWithoutFail($id);

        if (empty($facestatus)) {
            Flash::error('Estatus de factura no encontrado');
            $sweeterror = 'Estatus de factura no encontrado';
            return redirect(route('facestatuses.index'))->with(compact('sweeterror'));
        }

        $facestatus = $this->facestatusRepository->update($request->all(), $id);

        Flash::success('Estado de Factura actualizado correctamente');
        $sweet = 'Estado de Factura actualizado correctamente';
        return redirect(route('facestatuses.index'))->with(compact('sweet'));
    }

    /**
     * Remove the specified facestatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facestatus = $this->facestatusRepository->findWithoutFail($id);

        if (empty($facestatus)) {
            Flash::error('Estatus de factura no encontrado');
            $sweeterror = 'Estatus de factura no encontrado';
            return redirect(route('facestatuses.index'))->with(compact('sweeterror'));
        }

        $this->facestatusRepository->delete($id);

        Flash::success('Estado de factura eliminado correctamente.');
        $sweet = 'Estado de factura eliminado correctamente.';
        return redirect(route('facestatuses.index'))->with(compact('sweet'));
    }
}
