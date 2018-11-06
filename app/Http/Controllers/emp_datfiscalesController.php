<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createemp_datfiscalesRequest;
use App\Http\Requests\Updateemp_datfiscalesRequest;
use App\Repositories\emp_datfiscalesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class emp_datfiscalesController extends AppBaseController
{
    /** @var  emp_datfiscalesRepository */
    private $empDatfiscalesRepository;

    public function __construct(emp_datfiscalesRepository $empDatfiscalesRepo)
    {
        $this->empDatfiscalesRepository = $empDatfiscalesRepo;
    }

    /**
     * Display a listing of the emp_datfiscales.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empDatfiscalesRepository->pushCriteria(new RequestCriteria($request));
        $empDatfiscales = $this->empDatfiscalesRepository->all();

        return view('emp_datfiscales.index')
            ->with('empDatfiscales', $empDatfiscales);
    }

    /**
     * Show the form for creating a new emp_datfiscales.
     *
     * @return Response
     */
    public function create()
    {
        return view('emp_datfiscales.create');
    }

    /**
     * Store a newly created emp_datfiscales in storage.
     *
     * @param Createemp_datfiscalesRequest $request
     *
     * @return Response
     */
    public function store(Createemp_datfiscalesRequest $request)
    {
        $input = $request->all();

        $empDatfiscales = $this->empDatfiscalesRepository->create($input);

        Flash::success('Emp Datfiscales saved successfully.');

        return redirect(route('empDatfiscales.index'));
    }

    /**
     * Display the specified emp_datfiscales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Emp Datfiscales not found');

            return redirect(route('empDatfiscales.index'));
        }

        return view('emp_datfiscales.show')->with('empDatfiscales', $empDatfiscales);
    }

    /**
     * Show the form for editing the specified emp_datfiscales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Emp Datfiscales not found');

            return redirect(route('empDatfiscales.index'));
        }

        return view('emp_datfiscales.edit')->with('empDatfiscales', $empDatfiscales);
    }

    /**
     * Update the specified emp_datfiscales in storage.
     *
     * @param  int              $id
     * @param Updateemp_datfiscalesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateemp_datfiscalesRequest $request)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Emp Datfiscales not found');

            return redirect(route('empDatfiscales.index'));
        }

        $empDatfiscales = $this->empDatfiscalesRepository->update($request->all(), $id);

        Flash::success('Emp Datfiscales updated successfully.');

        return redirect(route('empDatfiscales.index'));
    }

    /**
     * Remove the specified emp_datfiscales from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empDatfiscales = $this->empDatfiscalesRepository->findWithoutFail($id);

        if (empty($empDatfiscales)) {
            Flash::error('Emp Datfiscales not found');

            return redirect(route('empDatfiscales.index'));
        }

        $this->empDatfiscalesRepository->delete($id);

        Flash::success('Emp Datfiscales deleted successfully.');

        return redirect(route('empDatfiscales.index'));
    }
}
