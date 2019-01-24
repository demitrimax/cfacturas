<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesociocomercialRequest;
use App\Http\Requests\UpdatesociocomercialRequest;
use App\Repositories\sociocomercialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Alert;
use App\Models\cattipodoc;
use App\Models\sociocomercial;
use App\Models\catdocumentos;

class sociocomercialController extends AppBaseController
{
    /** @var  sociocomercialRepository */
    private $sociocomercialRepository;

    public function __construct(sociocomercialRepository $sociocomercialRepo)
    {
        $this->sociocomercialRepository = $sociocomercialRepo;
        $this->middleware('permission:sociocomercial-list');
        $this->middleware('permission:sociocomercial-create', ['only' => ['create','store']]);
        $this->middleware('permission:sociocomercial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sociocomercial-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the sociocomercial.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sociocomercialRepository->pushCriteria(new RequestCriteria($request));
        $sociocomercials = $this->sociocomercialRepository->all();

        return view('sociocomercials.index')
            ->with('sociocomercials', $sociocomercials);
    }

    /**
     * Show the form for creating a new sociocomercial.
     *
     * @return Response
     */
    public function create()
    {
        return view('sociocomercials.create');
    }

    /**
     * Store a newly created sociocomercial in storage.
     *
     * @param CreatesociocomercialRequest $request
     *
     * @return Response
     */
    public function store(CreatesociocomercialRequest $request)
    {
        $input = $request->all();

        $sociocomercial = $this->sociocomercialRepository->create($input);

        Flash::success('Socio Comercial guardado correctamente.');
        Alert::success('Socio Comercial guardado correctamente.');

        return redirect(route('sociocomercials.index'));
    }

    /**
     * Display the specified sociocomercial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sociocomercial = $this->sociocomercialRepository->findWithoutFail($id);

        if (empty($sociocomercial)) {
            Flash::error('Socio comercial no encontrado');
            Alert::error('Socio Comercial no encontrado');

            return redirect(route('sociocomercials.index'));
        }
        $tipodocs = cattipodoc::pluck('tipo','id');

        return view('sociocomercials.show')->with(compact('sociocomercial','tipodocs'));
    }

    /**
     * Show the form for editing the specified sociocomercial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sociocomercial = $this->sociocomercialRepository->findWithoutFail($id);

        if (empty($sociocomercial)) {
          Flash::error('Socio comercial no encontrado');
          Alert::error('Socio Comercial no encontrado');

            return redirect(route('sociocomercials.index'));
        }

        return view('sociocomercials.edit')->with('sociocomercial', $sociocomercial);
    }

    /**
     * Update the specified sociocomercial in storage.
     *
     * @param  int              $id
     * @param UpdatesociocomercialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesociocomercialRequest $request)
    {
        $sociocomercial = $this->sociocomercialRepository->findWithoutFail($id);

        if (empty($sociocomercial)) {
          Flash::error('Socio comercial no encontrado');
          Alert::error('Socio Comercial no encontrado');

            return redirect(route('sociocomercials.index'));
        }

        $sociocomercial = $this->sociocomercialRepository->update($request->all(), $id);

        Flash::success('Socio Comercial actualizado correctamente.');
        Alert::success('Socio Comercial actualizado correctamente.');

        return redirect(route('sociocomercials.index'));
    }

    /**
     * Remove the specified sociocomercial from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sociocomercial = $this->sociocomercialRepository->findWithoutFail($id);

        if (empty($sociocomercial)) {
          Flash::error('Socio comercial no encontrado');
          Alert::error('Socio Comercial no encontrado');

            return redirect(route('sociocomercials.index'));
        }

        $this->sociocomercialRepository->delete($id);

        Flash::success('Socio Comercial borrado correctamente.');
        Alert::success('Socio Comercial borrado correctamente.');

        return redirect(route('sociocomercials.index'));
    }

    public function guardaDocumento(Request $request)
    {
      $input = $request->all();
      $socio_id = $input['socio_id'];
      $sociocomercial = $this->sociocomercialRepository->findWithoutFail($socio_id);

      $tipodoc = cattipodoc::find($request->input('tipodoc'));
      $file = $request->file('archivo');
      $path = public_path() . '/documents/' . $tipodoc->carpeta;
      $nombre = uniqid().$file->getClientOriginalName();
      $file->move($path, $nombre);

      $catdocumentos = new catdocumentos();
      $catdocumentos->tipodoc = $request->input('tipodoc');
      $catdocumentos->archivo = 'documents/'.$tipodoc->carpeta.'/'.$nombre;
      $catdocumentos->nota = $request->input('nota');
      $catdocumentos->save();
      $sociocomercial->documentos()->attach($catdocumentos);
      //$catdocumentos = $this->catdocumentosRepository->create($input);


      Flash::success('Documento guardado correctamente.');
      $sweet = 'Documento guardado correctamente';

        $redirectroute = $input['redirect'];
        $showid = $input['socio_id'];

        return redirect(route($redirectroute, $showid))->with(compact('sweet'));
    }
}
