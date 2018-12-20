<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepagocondicionRequest;
use App\Http\Requests\UpdatepagocondicionRequest;
use App\Repositories\pagocondicionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class pagocondicionController extends AppBaseController
{
    /** @var  pagocondicionRepository */
    private $pagocondicionRepository;

    public function __construct(pagocondicionRepository $pagocondicionRepo)
    {
        $this->pagocondicionRepository = $pagocondicionRepo;
        $this->middleware('auth');
        $this->middleware('permission:pagocondicion');
    }

    /**
     * Display a listing of the pagocondicion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pagocondicionRepository->pushCriteria(new RequestCriteria($request));
        $pagocondicions = $this->pagocondicionRepository->all();

        return view('pagocondicions.index')
            ->with('pagocondicions', $pagocondicions);
    }

    /**
     * Show the form for creating a new pagocondicion.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagocondicions.create');
    }

    /**
     * Store a newly created pagocondicion in storage.
     *
     * @param CreatepagocondicionRequest $request
     *
     * @return Response
     */
    public function store(CreatepagocondicionRequest $request)
    {
        $input = $request->all();

        $pagocondicion = $this->pagocondicionRepository->create($input);

        Flash::success('Condición de Pago guardado correctamente.');

        return redirect(route('pagocondicions.index'));
    }

    /**
     * Display the specified pagocondicion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pagocondicion = $this->pagocondicionRepository->findWithoutFail($id);

        if (empty($pagocondicion)) {
            Flash::error('Condición de pago no encontrado.');

            return redirect(route('pagocondicions.index'));
        }

        return view('pagocondicions.show')->with('pagocondicion', $pagocondicion);
    }

    /**
     * Show the form for editing the specified pagocondicion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pagocondicion = $this->pagocondicionRepository->findWithoutFail($id);

        if (empty($pagocondicion)) {
            Flash::error('Condición de pago no encontrado.');

            return redirect(route('pagocondicions.index'));
        }

        return view('pagocondicions.edit')->with('pagocondicion', $pagocondicion);
    }

    /**
     * Update the specified pagocondicion in storage.
     *
     * @param  int              $id
     * @param UpdatepagocondicionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepagocondicionRequest $request)
    {
        $pagocondicion = $this->pagocondicionRepository->findWithoutFail($id);

        if (empty($pagocondicion)) {
            Flash::error('Condición de pago no encontrado');

            return redirect(route('pagocondicions.index'));
        }

        $pagocondicion = $this->pagocondicionRepository->update($request->all(), $id);

        Flash::success('Condición de pago Actualizado correctamente.');

        return redirect(route('pagocondicions.index'));
    }

    /**
     * Remove the specified pagocondicion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pagocondicion = $this->pagocondicionRepository->findWithoutFail($id);

        if (empty($pagocondicion)) {
            Flash::error('Condición de pago no encontrado');

            return redirect(route('pagocondicions.index'));
        }

        $this->pagocondicionRepository->delete($id);

        Flash::success('Condición de pago eliminada');

        return redirect(route('pagocondicions.index'));
    }
}
