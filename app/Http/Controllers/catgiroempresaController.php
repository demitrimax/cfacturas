<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatgiroempresaRequest;
use App\Http\Requests\UpdatecatgiroempresaRequest;
use App\Repositories\catgiroempresaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\catgiroempresa;
use RealRashid\SweetAlert\Facades\Alert;

class catgiroempresaController extends AppBaseController
{
    /** @var  catgiroempresaRepository */
    private $catgiroempresaRepository;

    public function __construct(catgiroempresaRepository $catgiroempresaRepo)
    {
        $this->catgiroempresaRepository = $catgiroempresaRepo;
    }

    /**
     * Display a listing of the catgiroempresa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catgiroempresaRepository->pushCriteria(new RequestCriteria($request));
        $catgiroempresas = $this->catgiroempresaRepository->all();

        return view('catgiroempresas.index')
            ->with('catgiroempresas', $catgiroempresas);
    }

    /**
     * Show the form for creating a new catgiroempresa.
     *
     * @return Response
     */
    public function create()
    {
        return view('catgiroempresas.create');
    }

    /**
     * Store a newly created catgiroempresa in storage.
     *
     * @param CreatecatgiroempresaRequest $request
     *
     * @return Response
     */
    public function store(CreatecatgiroempresaRequest $request)
    {
        $input = $request->all();

        $catgiroempresa = $this->catgiroempresaRepository->create($input);

        Flash::success('Giro de Empresa guardado correctamente.');
        Alert::success('Giro de Empresa guardado correctamente.','Muy Bien!');

        return redirect(route('catgiroempresas.index'));
    }

    /**
     * Display the specified catgiroempresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catgiroempresa = $this->catgiroempresaRepository->findWithoutFail($id);

        if (empty($catgiroempresa)) {
            Flash::error('Giro de Empresa no encontrado');
            Alert::error('Giro de Empresa no encontrado','Problema');

            return redirect(route('catgiroempresas.index'));
        }

        return view('catgiroempresas.show')->with('catgiroempresa', $catgiroempresa);
    }

    /**
     * Show the form for editing the specified catgiroempresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catgiroempresa = $this->catgiroempresaRepository->findWithoutFail($id);

        if (empty($catgiroempresa)) {
          Flash::error('Giro de Empresa no encontrado');
          Alert::error('Giro de Empresa no encontrado','Problema');

            return redirect(route('catgiroempresas.index'));
        }

        return view('catgiroempresas.edit')->with('catgiroempresa', $catgiroempresa);
    }

    /**
     * Update the specified catgiroempresa in storage.
     *
     * @param  int              $id
     * @param UpdatecatgiroempresaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatgiroempresaRequest $request)
    {
        $catgiroempresa = $this->catgiroempresaRepository->findWithoutFail($id);

        if (empty($catgiroempresa)) {
          Flash::error('Giro de Empresa no encontrado');
          Alert::error('Giro de Empresa no encontrado','Problema');

            return redirect(route('catgiroempresas.index'));
        }

        $catgiroempresa = $this->catgiroempresaRepository->update($request->all(), $id);

        Flash::success('Catgiroempresa updated successfully.');

        return redirect(route('catgiroempresas.index'));
    }

    /**
     * Remove the specified catgiroempresa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catgiroempresa = $this->catgiroempresaRepository->findWithoutFail($id);

        if (empty($catgiroempresa)) {
          Flash::error('Giro de Empresa no encontrado');
          Alert::error('Giro de Empresa no encontrado','Problema');

            return redirect(route('catgiroempresas.index'));
        }

        $this->catgiroempresaRepository->delete($id);

        Flash::success('Giro de Empresa borrado correctamente');
        Alert::success('Giro de Empresa borrado correctamente','Borrado Ok!');

        return redirect(route('catgiroempresas.index'));
    }
    public function GetGiros(Request $request)
    {
        $catgiroempresas = catgiroempresa::where('id',1)->get();
        $palabra = $request['word'];
      if (!empty($palabra))
      {
        if (strlen($palabra) >= 3)
        {
          $catgiroempresas = catgiroempresa::where('descripcion','like','%'.$request['word'].'%')->select('descripcion','codigo')->limit(50)->get();
        }
      }
      if (empty($catgiroempresas))
      {
        $catgiroempresas[] = ['descripcion'=>'Ninguna'];
      }
      return $catgiroempresas;
    }
}
