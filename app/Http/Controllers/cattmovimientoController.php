<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecattmovimientoRequest;
use App\Http\Requests\UpdatecattmovimientoRequest;
use App\Repositories\cattmovimientoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class cattmovimientoController extends AppBaseController
{
    /** @var  cattmovimientoRepository */
    private $cattmovimientoRepository;

    public function __construct(cattmovimientoRepository $cattmovimientoRepo)
    {
        $this->cattmovimientoRepository = $cattmovimientoRepo;
    }

    /**
     * Display a listing of the cattmovimiento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cattmovimientoRepository->pushCriteria(new RequestCriteria($request));
        $cattmovimientos = $this->cattmovimientoRepository->all();

        return view('cattmovimientos.index')
            ->with('cattmovimientos', $cattmovimientos);
    }

    /**
     * Show the form for creating a new cattmovimiento.
     *
     * @return Response
     */
    public function create()
    {
        return view('cattmovimientos.create');
    }

    /**
     * Store a newly created cattmovimiento in storage.
     *
     * @param CreatecattmovimientoRequest $request
     *
     * @return Response
     */
    public function store(CreatecattmovimientoRequest $request)
    {
        $input = $request->all();

        $cattmovimiento = $this->cattmovimientoRepository->create($input);

        Flash::success('Cattmovimiento saved successfully.');

        return redirect(route('cattmovimientos.index'));
    }

    /**
     * Display the specified cattmovimiento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cattmovimiento = $this->cattmovimientoRepository->findWithoutFail($id);

        if (empty($cattmovimiento)) {
            Flash::error('Cattmovimiento not found');

            return redirect(route('cattmovimientos.index'));
        }

        return view('cattmovimientos.show')->with('cattmovimiento', $cattmovimiento);
    }

    /**
     * Show the form for editing the specified cattmovimiento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cattmovimiento = $this->cattmovimientoRepository->findWithoutFail($id);

        if (empty($cattmovimiento)) {
            Flash::error('Cattmovimiento not found');

            return redirect(route('cattmovimientos.index'));
        }

        return view('cattmovimientos.edit')->with('cattmovimiento', $cattmovimiento);
    }

    /**
     * Update the specified cattmovimiento in storage.
     *
     * @param  int              $id
     * @param UpdatecattmovimientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecattmovimientoRequest $request)
    {
        $cattmovimiento = $this->cattmovimientoRepository->findWithoutFail($id);

        if (empty($cattmovimiento)) {
            Flash::error('Cattmovimiento not found');

            return redirect(route('cattmovimientos.index'));
        }

        $cattmovimiento = $this->cattmovimientoRepository->update($request->all(), $id);

        Flash::success('Cattmovimiento updated successfully.');

        return redirect(route('cattmovimientos.index'));
    }

    /**
     * Remove the specified cattmovimiento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cattmovimiento = $this->cattmovimientoRepository->findWithoutFail($id);

        if (empty($cattmovimiento)) {
            Flash::error('Cattmovimiento not found');

            return redirect(route('cattmovimientos.index'));
        }

        $this->cattmovimientoRepository->delete($id);

        Flash::success('Cattmovimiento deleted successfully.');

        return redirect(route('cattmovimientos.index'));
    }
}
