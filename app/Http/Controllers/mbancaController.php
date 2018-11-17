<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatembancaRequest;
use App\Http\Requests\UpdatembancaRequest;
use App\Repositories\mbancaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\clientes;
use App\Models\users;
use App\Models\catcuentas;
use App\Models\cattmovimiento;
use App\Models\mbanca;

class mbancaController extends AppBaseController
{
    /** @var  mbancaRepository */
    private $mbancaRepository;

    public function __construct(mbancaRepository $mbancaRepo)
    {
        $this->mbancaRepository = $mbancaRepo;
                $this->middleware('auth');
    }

    /**
     * Display a listing of the mbanca.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mbancaRepository->pushCriteria(new RequestCriteria($request));
        $mbancas = $this->mbancaRepository->orderBy('fecha','DESC')->paginate(10);

        return view('mbancas.index')
            ->with('mbancas', $mbancas);
    }

    /**
     * Show the form for creating a new mbanca.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = clientes::pluck('nombre','id');
        $cuentas = catcuentas::pluck('numcuenta','id');
        $cattmovimiento = cattmovimiento::pluck('descripcion','id');
        $usuarios = users::pluck('name','id');
        return view('mbancas.create')->with(compact('clientes','cuentas','cattmovimiento','usuarios'));
    }

    /**
     * Store a newly created mbanca in storage.
     *
     * @param CreatembancaRequest $request
     *
     * @return Response
     */
    public function store(CreatembancaRequest $request)
    {
        $input = $request->all();

        $mbanca = $this->mbancaRepository->create($input);

        Flash::success('Mbanca saved successfully.');

        return redirect(route('mbancas.index'));
    }

    /**
     * Display the specified mbanca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mbanca = $this->mbancaRepository->findWithoutFail($id);

        if (empty($mbanca)) {
            Flash::error('Movimiento no encontrado');

            return redirect(route('mbancas.index'));
        }

        return view('mbancas.show')->with(compact('mbanca'));
    }

    /**
     * Show the form for editing the specified mbanca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mbanca = $this->mbancaRepository->findWithoutFail($id);

        if (empty($mbanca)) {
            Flash::error('Mbanca not found');

            return redirect(route('mbancas.index'));
        }

        return view('mbancas.edit')->with('mbanca', $mbanca);
    }

    /**
     * Update the specified mbanca in storage.
     *
     * @param  int              $id
     * @param UpdatembancaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatembancaRequest $request)
    {
        $mbanca = $this->mbancaRepository->findWithoutFail($id);

        if (empty($mbanca)) {
            Flash::error('Mbanca not found');

            return redirect(route('mbancas.index'));
        }

        $mbanca = $this->mbancaRepository->update($request->all(), $id);

        Flash::success('Mbanca updated successfully.');

        return redirect(route('mbancas.index'));
    }

    /**
     * Remove the specified mbanca from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mbanca = $this->mbancaRepository->findWithoutFail($id);

        if (empty($mbanca)) {
            Flash::error('Mbanca not found');

            return redirect(route('mbancas.index'));
        }

        $this->mbancaRepository->delete($id);

        Flash::success('Mbanca deleted successfully.');

        return redirect(route('mbancas.index'));
    }
}