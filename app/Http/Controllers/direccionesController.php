<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedireccionesRequest;
use App\Http\Requests\UpdatedireccionesRequest;
use App\Repositories\direccionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\clientes;
use App\catestados;
use App\catmunicipios;

class direccionesController extends AppBaseController
{
    /** @var  direccionesRepository */
    private $direccionesRepository;

    public function __construct(direccionesRepository $direccionesRepo)
    {
        $this->direccionesRepository = $direccionesRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the direcciones.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->direccionesRepository->pushCriteria(new RequestCriteria($request));
        $direcciones = $this->direccionesRepository->all();

        return view('direcciones.index')
            ->with('direcciones', $direcciones);
    }

    /**
     * Show the form for creating a new direcciones.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = clientes::pluck('nombre','id');
        $estados = catestados::pluck('nombre','id');
        return view('direcciones.create',compact('clientes','estados'));
    }

    /**
     * Store a newly created direcciones in storage.
     *
     * @param CreatedireccionesRequest $request
     *
     * @return Response
     */
    public function store(CreatedireccionesRequest $request)
    {
        $input = $request->all();

        $direcciones = $this->direccionesRepository->create($input);

        Flash::success('Dirección guardada correctamente.');
        if(isset($input['redirect'])){

          return redirect(route('clientes.show', [$input['cliente_id']]));
        }
        else {

        return redirect(route('direcciones.index'));
      }
    }

    /**
     * Display the specified direcciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Dirección no encontrada');

            return redirect(route('direcciones.index'));
        }

        return view('direcciones.show')->with('direcciones', $direcciones);
    }

    /**
     * Show the form for editing the specified direcciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Dirección no encontrada');

            return redirect(route('direcciones.index'));
        }

        return view('direcciones.edit')->with('direcciones', $direcciones);
    }

    /**
     * Update the specified direcciones in storage.
     *
     * @param  int              $id
     * @param UpdatedireccionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedireccionesRequest $request)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Dirección no encontrada');

            return redirect(route('direcciones.index'));
        }

        $direcciones = $this->direccionesRepository->update($request->all(), $id);

        Flash::success('Dirección actualizada correctamente.');

        return redirect(route('direcciones.index'));
    }

    /**
     * Remove the specified direcciones from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $direcciones = $this->direccionesRepository->findWithoutFail($id);

        if (empty($direcciones)) {
            Flash::error('Dirección no encontrada');

            return redirect(route('direcciones.index'));
        }

        $this->direccionesRepository->delete($id);

        Flash::success('Dirección borrada correctamente.');
        if(isset($input['redirect'])){

          return redirect(route('clientes.show', [$input['cliente_id']]));
        }
        else {
          return redirect(route('direcciones.index'));
        }
    }

    public function GetMunicipios($id)
    {
      $municipios = catmunicipios::where('id_edo',$id)->select('id','nomMunicipio')->get();
      /*
      $data = [];
      $data[0] = [
        'id' => 0,
        'text' => 'Selecciones',
      ];
      foreach ($municipios as $key=>$value) {
        $data[$key+1] = [
          'id' => $value->id,
          'text' => $value->nomMunicipio,
        ];
      }
      return response()->json($data);
      */
      return $municipios;
    }
}
