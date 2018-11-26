<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaccomercialRequest;
use App\Http\Requests\UpdateaccomercialRequest;
use App\Repositories\accomercialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class accomercialController extends AppBaseController
{
    /** @var  accomercialRepository */
    private $accomercialRepository;

    public function __construct(accomercialRepository $accomercialRepo)
    {
        $this->accomercialRepository = $accomercialRepo;
    }

    /**
     * Display a listing of the accomercial.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accomercialRepository->pushCriteria(new RequestCriteria($request));
        $accomercials = $this->accomercialRepository->all();

        return view('accomercials.index')
            ->with('accomercials', $accomercials);
    }

    /**
     * Show the form for creating a new accomercial.
     *
     * @return Response
     */
    public function create()
    {
        return view('accomercials.create');
    }

    /**
     * Store a newly created accomercial in storage.
     *
     * @param CreateaccomercialRequest $request
     *
     * @return Response
     */
    public function store(CreateaccomercialRequest $request)
    {
        $input = $request->all();

        $accomercial = $this->accomercialRepository->create($input);

        Flash::success('Accomercial saved successfully.');

        return redirect(route('accomercials.index'));
    }

    /**
     * Display the specified accomercial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Accomercial not found');

            return redirect(route('accomercials.index'));
        }

        return view('accomercials.show')->with('accomercial', $accomercial);
    }

    /**
     * Show the form for editing the specified accomercial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Accomercial not found');

            return redirect(route('accomercials.index'));
        }

        return view('accomercials.edit')->with('accomercial', $accomercial);
    }

    /**
     * Update the specified accomercial in storage.
     *
     * @param  int              $id
     * @param UpdateaccomercialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaccomercialRequest $request)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Accomercial not found');

            return redirect(route('accomercials.index'));
        }

        $accomercial = $this->accomercialRepository->update($request->all(), $id);

        Flash::success('Accomercial updated successfully.');

        return redirect(route('accomercials.index'));
    }

    /**
     * Remove the specified accomercial from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accomercial = $this->accomercialRepository->findWithoutFail($id);

        if (empty($accomercial)) {
            Flash::error('Accomercial not found');

            return redirect(route('accomercials.index'));
        }

        $this->accomercialRepository->delete($id);

        Flash::success('Accomercial deleted successfully.');

        return redirect(route('accomercials.index'));
    }
}
