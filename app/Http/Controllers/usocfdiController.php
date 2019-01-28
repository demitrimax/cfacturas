<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateusocfdiRequest;
use App\Http\Requests\UpdateusocfdiRequest;
use App\Repositories\usocfdiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use RealRashid\SweetAlert\Facades\Alert;

class usocfdiController extends AppBaseController
{
    /** @var  usocfdiRepository */
    private $usocfdiRepository;

    public function __construct(usocfdiRepository $usocfdiRepo)
    {
        $this->usocfdiRepository = $usocfdiRepo;
    }

    /**
     * Display a listing of the usocfdi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usocfdiRepository->pushCriteria(new RequestCriteria($request));
        $usocfdis = $this->usocfdiRepository->paginate(10);

        return view('usocfdis.index')
            ->with('usocfdis', $usocfdis);
    }

    /**
     * Show the form for creating a new usocfdi.
     *
     * @return Response
     */
    public function create()
    {
        return view('usocfdis.create');
    }

    /**
     * Store a newly created usocfdi in storage.
     *
     * @param CreateusocfdiRequest $request
     *
     * @return Response
     */
    public function store(CreateusocfdiRequest $request)
    {
        $input = $request->all();

        $usocfdi = $this->usocfdiRepository->create($input);

        Flash::success('CFDI Guardado correctamente.');
        Alert::success('CFDI Guardado correctamente.','Muy bien','success');

        return redirect(route('usocfdis.index'));
    }

    /**
     * Display the specified usocfdi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usocfdi = $this->usocfdiRepository->findWithoutFail($id);

        if (empty($usocfdi)) {
            Flash::error('CFDI no encontrado');
            Alert::error('CFDI no encontrado.');

            return redirect(route('usocfdis.index'));
        }

        return view('usocfdis.show')->with('usocfdi', $usocfdi);
    }

    /**
     * Show the form for editing the specified usocfdi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usocfdi = $this->usocfdiRepository->findWithoutFail($id);

        if (empty($usocfdi)) {
            Flash::error('CFDI no encontrado');
            Alert::error('CFDI no encontrado.');

            return redirect(route('usocfdis.index'));
        }

        return view('usocfdis.edit')->with('usocfdi', $usocfdi);
    }

    /**
     * Update the specified usocfdi in storage.
     *
     * @param  int              $id
     * @param UpdateusocfdiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusocfdiRequest $request)
    {
        $usocfdi = $this->usocfdiRepository->findWithoutFail($id);

        if (empty($usocfdi)) {
            Flash::error('CFDI no encontrado');
            Alert::error('CFDI no encontrado.');

            return redirect(route('usocfdis.index'));
        }

        $usocfdi = $this->usocfdiRepository->update($request->all(), $id);

        Flash::success('Uso de CFDI actualizado correctamente.');
        Alert::success('Uso de CFDI actualizado correctamente!','Muy Bien!');

        return redirect(route('usocfdis.index'));
    }

    /**
     * Remove the specified usocfdi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usocfdi = $this->usocfdiRepository->findWithoutFail($id);

        if (empty($usocfdi)) {
            Flash::error('Uso CFDI no encontrado');
            Alert::error('Uso CFDI no encontrado.', 'error');

            return redirect(route('usocfdis.index'));
        }

        $this->usocfdiRepository->delete($id);

        Flash::success('Uso de CFDI borrado correctamente.');
        Alert::success('uso de CFDI borrado correctamente.', 'success');

        return redirect(route('usocfdis.index'));
    }
}
