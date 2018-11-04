<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatdocumentosRequest;
use App\Http\Requests\UpdatecatdocumentosRequest;
use App\Repositories\catdocumentosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\cattipodoc;
use App\Models\catdocumentos;

class catdocumentosController extends AppBaseController
{
    /** @var  catdocumentosRepository */
    private $catdocumentosRepository;

    public function __construct(catdocumentosRepository $catdocumentosRepo)
    {
        $this->catdocumentosRepository = $catdocumentosRepo;
    }

    /**
     * Display a listing of the catdocumentos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catdocumentosRepository->pushCriteria(new RequestCriteria($request));
        $catdocumentos = $this->catdocumentosRepository->all();


        return view('catdocumentos.index')
            ->with(compact('catdocumentos'));
    }

    /**
     * Show the form for creating a new catdocumentos.
     *
     * @return Response
     */
    public function create()
    {
        $tipodocs = cattipodoc::pluck('tipo','id');
        return view('catdocumentos.create')->with(compact('tipodocs'));
    }

    /**
     * Store a newly created catdocumentos in storage.
     *
     * @param CreatecatdocumentosRequest $request
     *
     * @return Response
     */
    public function store(CreatecatdocumentosRequest $request)
    {
        $input = $request->all();

        $tipodoc = cattipodoc::find($request->input('tipodoc'));
        $file = $request->file('archivo');
        $path = public_path() . '/documents/' . $tipodoc->carpeta;
        $nombre = uniqid().$file->getClientOriginalName();
        $file->move($path, $nombre);

        $catdocumentos = new catdocumentos();
        $catdocumentos->tipodoc = $request->input('tipodoc');
        $catdocumentos->archivo = 'documents/'.$tipodoc->carpeta.'/'.$nombre;
        $catdocumentos->nota = $request->input('nota');
        if (!empty($request->input('cliente_id'))) {
          $catdocumentos->cliente_id = $request->input('cliente_id');
        }
        $catdocumentos->save();
        //$catdocumentos = $this->catdocumentosRepository->create($input);


        Flash::success('Documento guardado correctamente.');

        if(isset($input['redirect'])){

          return redirect(route('clientes.show', [$input['cliente_id']]));
        }
        else {
          return redirect(route('catdocumentos.index'));
      }
    }

    /**
     * Display the specified catdocumentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catdocumentos = $this->catdocumentosRepository->findWithoutFail($id);

        if (empty($catdocumentos)) {
            Flash::error('Catdocumentos not found');

            return redirect(route('catdocumentos.index'));
        }

        return view('catdocumentos.show')->with('catdocumentos', $catdocumentos);
    }

    /**
     * Show the form for editing the specified catdocumentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catdocumentos = $this->catdocumentosRepository->findWithoutFail($id);

        if (empty($catdocumentos)) {
            Flash::error('Catdocumentos not found');

            return redirect(route('catdocumentos.index'));
        }

        return view('catdocumentos.edit')->with('catdocumentos', $catdocumentos);
    }

    /**
     * Update the specified catdocumentos in storage.
     *
     * @param  int              $id
     * @param UpdatecatdocumentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatdocumentosRequest $request)
    {
        $catdocumentos = $this->catdocumentosRepository->findWithoutFail($id);

        if (empty($catdocumentos)) {
            Flash::error('Catdocumentos not found');

            return redirect(route('catdocumentos.index'));
        }

        $catdocumentos = $this->catdocumentosRepository->update($request->all(), $id);

        Flash::success('Catdocumentos updated successfully.');

        return redirect(route('catdocumentos.index'));
    }

    /**
     * Remove the specified catdocumentos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catdocumentos = $this->catdocumentosRepository->findWithoutFail($id);

        if (empty($catdocumentos)) {
            Flash::error('Catdocumentos not found');

            return redirect(route('catdocumentos.index'));
        }

        $this->catdocumentosRepository->delete($id);

        Flash::success('Catdocumentos deleted successfully.');

        return redirect(route('catdocumentos.index'));
    }
}
