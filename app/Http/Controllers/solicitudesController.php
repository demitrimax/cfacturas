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

class solicitudesController extends AppBaseController
{
    /** @var  solicitudesRepository */
    private $solicitudesRepository;

    public function __construct(solicitudesRepository $solicitudesRepo)
    {
        $this->solicitudesRepository = $solicitudesRepo;
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
        $solicitudes = $this->solicitudesRepository->all();

        return view('solicitudes.index')
            ->with('solicitudes', $solicitudes);
    }

    /**
     * Show the form for creating a new solicitudes.
     *
     * @return Response
     */
    public function create()
    {
        return view('solicitudes.create');
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

        if (empty($solicitudes)) {
            Flash::error('Solicitudes not found');

            return redirect(route('solicitudes.index'));
        }

        return view('solicitudes.show')->with('solicitudes', $solicitudes);
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

            return redirect(route('solicitudes.index'));
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

            return redirect(route('solicitudes.index'));
        }

        $solicitudes = $this->solicitudesRepository->update($request->all(), $id);

        Flash::success('Solicitudes updated successfully.');

        return redirect(route('solicitudes.index'));
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

            return redirect(route('solicitudes.index'));
        }

        $this->solicitudesRepository->delete($id);

        Flash::success('Solicitudes deleted successfully.');

        return redirect(route('solicitudes.index'));
    }
}
