<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesolicitudesRequest;
use App\Http\Requests\UpdatesolicitudesRequest;
use App\Repositories\solicitudesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Helpers\SomeClass;
use App\Helpers\RecortarTexto;

class solicitudesController extends AppBaseController
{
    /** @var  solicitudesRepository */
    private $solicitudesRepository;

    public function __construct(solicitudesRepository $solicitudesRepo)
    {
        $this->solicitudesRepository = $solicitudesRepo;
        $this->middleware('auth');
        $this->middleware('permission:solicitud-list');
        $this->middleware('permission:solicitud-create', ['only' => ['create','store']]);
        $this->middleware('permission:solicitud-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:solicitud-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the solicitudes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->solicitudesRepository->pushCriteria(new RequestCriteria($request));
        $solicitudes = $this->solicitudesRepository->paginate(10);

        //$textcorto = RecortarTexto::recortar_texto($solicitudes);
        return view('solicitudes.index')
            ->with(compact('solicitudes'));
    }

    /**
     * Show the form for creating a new solicitudes.
     *
     * @return Response
     */
    public function create()
    {
        return view('solicitudes.solicitud');
    }

    /**
     * Store a newly created solicitudes in storage.
     *
     * @param CreatesolicitudesRequest $request
     *
     * @return Response
     */
    public function store(CreatesolicitudesRequest $request)
    {
        $input = $request->all();

        $solicitudes = $this->solicitudesRepository->create($input);

        Flash::success('Solicitudes saved successfully.');

        return redirect(route('solicitudes.index'));
    }

    /**
     * Display the specified solicitudes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);
        if (!empty($solicitudes))
        {
          $tamanoadjunto = SomeClass::bytesToHuman(filesize($solicitudes->adjunto));
        }
        if (empty($solicitudes)) {
            Flash::error('Solicitud no encontrada');

            return redirect(route('solfact.index'));
        }

        return view('solicitudes.show')->with(compact('solicitudes','tamanoadjunto'));

    }

    /**
     * Show the form for editing the specified solicitudes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

        if (empty($solicitudes)) {
            Flash::error('Solicitudes not found');

            return redirect(route('solfact.index'));
        }

        return view('solicitudes.edit')->with('solicitudes', $solicitudes);
    }

    /**
     * Update the specified solicitudes in storage.
     *
     * @param  int              $id
     * @param UpdatesolicitudesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesolicitudesRequest $request)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

        if (empty($solicitudes)) {
            Flash::error('Solicitudes not found');

            return redirect(route('solfact.index'));
        }

        $solicitudes = $this->solicitudesRepository->update($request->all(), $id);

        Flash::success('Solicitudes updated successfully.');

        return redirect(route('solfact.index'));
    }

    /**
     * Remove the specified solicitudes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $solicitudes = $this->solicitudesRepository->findWithoutFail($id);

        if (empty($solicitudes)) {
            Flash::error('Solicitudes not found');

            return redirect(route('solfact.index'));
        }

        $this->solicitudesRepository->delete($id);

        Flash::success('Solicitud borrada correctamente.');

        return redirect(route('solfact.index'));
    }

}
