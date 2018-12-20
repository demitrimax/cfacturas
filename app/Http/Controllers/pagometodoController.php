<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepagometodoRequest;
use App\Http\Requests\UpdatepagometodoRequest;
use App\Repositories\pagometodoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class pagometodoController extends AppBaseController
{
    /** @var  pagometodoRepository */
    private $pagometodoRepository;

    public function __construct(pagometodoRepository $pagometodoRepo)
    {
        $this->pagometodoRepository = $pagometodoRepo;
        $this->middleware('auth');
        $this->middleware('permission:pagometodo');
    }

    /**
     * Display a listing of the pagometodo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pagometodoRepository->pushCriteria(new RequestCriteria($request));
        $pagometodos = $this->pagometodoRepository->all();

        return view('pagometodos.index')
            ->with('pagometodos', $pagometodos);
    }

    /**
     * Show the form for creating a new pagometodo.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagometodos.create');
    }

    /**
     * Store a newly created pagometodo in storage.
     *
     * @param CreatepagometodoRequest $request
     *
     * @return Response
     */
    public function store(CreatepagometodoRequest $request)
    {
        $input = $request->all();

        $pagometodo = $this->pagometodoRepository->create($input);

        Flash::success('Pagometodo saved successfully.');

        return redirect(route('pagometodos.index'));
    }

    /**
     * Display the specified pagometodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pagometodo = $this->pagometodoRepository->findWithoutFail($id);

        if (empty($pagometodo)) {
            Flash::error('Pagometodo not found');

            return redirect(route('pagometodos.index'));
        }

        return view('pagometodos.show')->with('pagometodo', $pagometodo);
    }

    /**
     * Show the form for editing the specified pagometodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pagometodo = $this->pagometodoRepository->findWithoutFail($id);

        if (empty($pagometodo)) {
            Flash::error('Pagometodo not found');

            return redirect(route('pagometodos.index'));
        }

        return view('pagometodos.edit')->with('pagometodo', $pagometodo);
    }

    /**
     * Update the specified pagometodo in storage.
     *
     * @param  int              $id
     * @param UpdatepagometodoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepagometodoRequest $request)
    {
        $pagometodo = $this->pagometodoRepository->findWithoutFail($id);

        if (empty($pagometodo)) {
            Flash::error('Pagometodo not found');

            return redirect(route('pagometodos.index'));
        }

        $pagometodo = $this->pagometodoRepository->update($request->all(), $id);

        Flash::success('Pagometodo updated successfully.');

        return redirect(route('pagometodos.index'));
    }

    /**
     * Remove the specified pagometodo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pagometodo = $this->pagometodoRepository->findWithoutFail($id);

        if (empty($pagometodo)) {
            Flash::error('Pagometodo not found');

            return redirect(route('pagometodos.index'));
        }

        $this->pagometodoRepository->delete($id);

        Flash::success('Pagometodo deleted successfully.');

        return redirect(route('pagometodos.index'));
    }
}
