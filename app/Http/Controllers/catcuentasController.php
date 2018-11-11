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

        return view('catcuentas.index')
            ->with('catcuentas', $catcuentas);
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

        return view('catcuentas.create')->with(compact('bancos','clientes'));
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
        $input = $request->all();

        $catcuentas = $this->catcuentasRepository->create($input);

        Flash::success('Catcuentas saved successfully.');

        return redirect(route('catcuentas.index'));
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
            Flash::error('Catcuentas not found');

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
            Flash::error('Catcuentas not found');

            return redirect(route('catcuentas.index'));
        }

        return view('catcuentas.edit')->with('catcuentas', $catcuentas);
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
            Flash::error('Catcuentas not found');

            return redirect(route('catcuentas.index'));
        }

        $catcuentas = $this->catcuentasRepository->update($request->all(), $id);

        Flash::success('Catcuentas updated successfully.');

        return redirect(route('catcuentas.index'));
    }

    /**
     * Remove the specified catcuentas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catcuentas = $this->catcuentasRepository->findWithoutFail($id);

        if (empty($catcuentas)) {
            Flash::error('Catcuentas not found');

            return redirect(route('catcuentas.index'));
        }

        $this->catcuentasRepository->delete($id);

        Flash::success('Catcuentas deleted successfully.');

        return redirect(route('catcuentas.index'));
    }
}
