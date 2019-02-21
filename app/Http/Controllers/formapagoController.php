<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateformapagoRequest;
use App\Http\Requests\UpdateformapagoRequest;
use App\Repositories\formapagoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class formapagoController extends AppBaseController
{
    /** @var  formapagoRepository */
    private $formapagoRepository;

    public function __construct(formapagoRepository $formapagoRepo)
    {
        $this->formapagoRepository = $formapagoRepo;
    }

    /**
     * Display a listing of the formapago.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->formapagoRepository->pushCriteria(new RequestCriteria($request));
        $formapagos = $this->formapagoRepository->all();

        return view('formapagos.index')
            ->with('formapagos', $formapagos);
    }

    /**
     * Show the form for creating a new formapago.
     *
     * @return Response
     */
    public function create()
    {
        return view('formapagos.create');
    }

    /**
     * Store a newly created formapago in storage.
     *
     * @param CreateformapagoRequest $request
     *
     * @return Response
     */
    public function store(CreateformapagoRequest $request)
    {
        $input = $request->all();

        $formapago = $this->formapagoRepository->create($input);

        Flash::success('Forma de Pago guardado correctamente.');
        Alert::success('Forma de Pago guardado correctamente', 'Forma de Pago');

        return redirect(route('formapagos.index'));
    }

    /**
     * Display the specified formapago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formapago = $this->formapagoRepository->findWithoutFail($id);

        if (empty($formapago)) {
            Flash::error('Forma de pago no encontrado');
            Alert::error('Forma de pago no encontrado','Error');
            return redirect(route('formapagos.index'));
        }

        return view('formapagos.show')->with('formapago', $formapago);
    }

    /**
     * Show the form for editing the specified formapago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formapago = $this->formapagoRepository->findWithoutFail($id);

        if (empty($formapago)) {
            Flash::error('Forma de pago no encontrado');
            Alert::error('Forma de pago no encontrado','Error');
            return redirect(route('formapagos.index'));
        }

        return view('formapagos.edit')->with('formapago', $formapago);
    }

    /**
     * Update the specified formapago in storage.
     *
     * @param  int              $id
     * @param UpdateformapagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateformapagoRequest $request)
    {
        $formapago = $this->formapagoRepository->findWithoutFail($id);

        if (empty($formapago)) {
            Flash::error('Forma de pago no encontrado');
            Alert::error('Forma de pago no encontrado','Error');
            return redirect(route('formapagos.index'));
        }

        $formapago = $this->formapagoRepository->update($request->all(), $id);

        Flash::success('Forma de pago actualizada correctamente.');
        Alert::success('Forma de pago actualizada correctamente');

        return redirect(route('formapagos.index'));
    }

    /**
     * Remove the specified formapago from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formapago = $this->formapagoRepository->findWithoutFail($id);

        if (empty($formapago)) {
            Flash::error('Formapago not found');
            Alert::error('Forma de pago no encontrado','Error');

            return redirect(route('formapagos.index'));
        }

        $this->formapagoRepository->delete($id);

        Flash::success('Forma de pago borrado correctamente.');
        Alert::success('Forma de pago borrado correctamente');
        return redirect(route('formapagos.index'));
    }
}
