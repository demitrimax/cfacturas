<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createcat_bancosRequest;
use App\Http\Requests\Updatecat_bancosRequest;
use App\Repositories\cat_bancosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cat_bancosController extends AppBaseController
{
    /** @var  cat_bancosRepository */
    private $catBancosRepository;

    public function __construct(cat_bancosRepository $catBancosRepo)
    {
        $this->catBancosRepository = $catBancosRepo;
        $this->middleware('auth');
        $this->middleware('permission:catbancos-list');
        $this->middleware('permission:catbancos-create', ['only' => ['create','store']]);
        $this->middleware('permission:catbancos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:catbancos-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the cat_bancos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catBancosRepository->pushCriteria(new RequestCriteria($request));
        $catBancos = $this->catBancosRepository->all();

        return view('cat_bancos.index')
            ->with('catBancos', $catBancos);
    }

    /**
     * Show the form for creating a new cat_bancos.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_bancos.create');
    }

    /**
     * Store a newly created cat_bancos in storage.
     *
     * @param Createcat_bancosRequest $request
     *
     * @return Response
     */
    public function store(Createcat_bancosRequest $request)
    {
        $rules = [
          'nombre' => 'required',
          'RFC' => 'unique:cat_bancos|required',
          'nombrecorto' => 'required|max:10',
          'denominacionsocial' => 'required',
        ];
        $this->validate($request, $rules);
        $input = $request->all();

        $catBancos = $this->catBancosRepository->create($input);

        Flash::success('Datos Bancarios guardados correctamente.');

        return redirect(route('catBancos.index'));
    }

    /**
     * Display the specified cat_bancos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catBancos = $this->catBancosRepository->findWithoutFail($id);

        if (empty($catBancos)) {
            Flash::error('Banco no encontrado.');

            return redirect(route('catBancos.index'));
        }

        return view('cat_bancos.show')->with('catBancos', $catBancos);
    }

    /**
     * Show the form for editing the specified cat_bancos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catBancos = $this->catBancosRepository->findWithoutFail($id);

        if (empty($catBancos)) {
            Flash::error('Bnaco no encontrado.');

            return redirect(route('catBancos.index'));
        }

        return view('cat_bancos.edit')->with('catBancos', $catBancos);
    }

    /**
     * Update the specified cat_bancos in storage.
     *
     * @param  int              $id
     * @param Updatecat_bancosRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecat_bancosRequest $request)
    {
        $catBancos = $this->catBancosRepository->findWithoutFail($id);

        if (empty($catBancos)) {
            Flash::error('Banco no encontrado.');

            return redirect(route('catBancos.index'));
        }

        $catBancos = $this->catBancosRepository->update($request->all(), $id);

        Flash::success('Datos Bancarios actualizado correctamente.');

        return redirect(route('catBancos.index'));
    }

    /**
     * Remove the specified cat_bancos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catBancos = $this->catBancosRepository->findWithoutFail($id);

        if (empty($catBancos)) {
            Flash::error('Banco no encontrado.');

            return redirect(route('catBancos.index'));
        }

        $this->catBancosRepository->delete($id);

        Flash::success('Datos bancarios borrando correcatamente.');

        return redirect(route('catBancos.index'));
    }
}
