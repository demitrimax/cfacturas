<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateclientesRequest;
use App\Http\Requests\UpdateclientesRequest;
use App\Repositories\clientesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\catestados;
use App\catmunicipios;
use App\Models\direcciones;
use App\Models\clientes;
use App\Models\catdocumentos;
use Intervention\Image\ImageManager;
use App\Models\cattipodoc;
use App\Models\cat_bancos;
use App\Helpers\VerificaRFC;
use App\Models\catgiroempresa;

class clientesController extends AppBaseController
{
    /** @var  clientesRepository */
    private $clientesRepository;

    public function __construct(clientesRepository $clientesRepo)
    {
        $this->clientesRepository = $clientesRepo;
        $this->middleware('auth');
        $this->middleware('permission:clientes-list');
        $this->middleware('permission:clientes-create', ['only' => ['create','store']]);
        $this->middleware('permission:clientes-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:clientes-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the clientes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientesRepository->pushCriteria(new RequestCriteria($request));
        $clientes = $this->clientesRepository->all();
        $clientes = $clientes->where('asimsal',null)->all();
        return view('clientes.index')
            ->with(compact('clientes'));
    }

    /**
     * Show the form for creating a new clientes.
     *
     * @return Response
     */
    public function create()
    {
        //$giro = catgiroempresa::pluck('descripcion','id'); //ya no se utiliza
        //$clientes = null;
        $estados = catestados::pluck('nombre','id');
        $municipios = catmunicipios::get()->where('id_edo',1)->pluck('nomMunicipio','id');
        return view('clientes.create')->with(compact('giro','estados','municipios'));
    }

    /**
     * Store a newly created clientes in storage.
     *
     * @param CreateclientesRequest $request
     *
     * @return Response
     */
    public function store(CreateclientesRequest $request)
    {

      $rules = [
          'nombre'       => 'required',
          'RFC'          => 'max:15|required',
          'CURP'         => 'max:18|nullable',
          'estado_id'    => 'required',
          'municipio_id' => 'required',
      ];

      $messages = [
          'RFC.unique'              => 'El RFC escrito ya existe en la base de datos de clientes',
          'RFC.required'            => 'El RFC es un valor requerido',
          'CURP.unique'             => 'La CURP que escribió ya esta en uso.',
          'estado_id.required'      => 'Es requerido el Estado',
          'municipio_id.required'   => 'Es requerido el Municipio',

      ];

      $this->validate($request, $rules,$messages);

        $input = $request->all();

        $clientes = $this->clientesRepository->create($input);
        $direccion = new direcciones();
        $direccion->cliente_id = $clientes->id;
        $direccion->calle = $input['calle'];
        $direccion->RFC = $input['RFC'];
        $direccion->numeroExt = $input['numeroExt'];
        $direccion->numeroInt = $input['numeroInt'];
        $direccion->estado_id = $input['estado_id'];
        $direccion->municipio_id = $input['municipio_id'];
        $direccion->colonia = $input['colonia'];
        $direccion->codpostal = $input['codpostal'];
        $direccion->referencias = $input['referencias'];
        $direccion->save();

        Flash::success('Cliente guardado correctamente');
        Alert::success('Cliente guardado correctamente');

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified clientes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientes = $this->clientesRepository->findWithoutFail($id);

        if (empty($clientes)) {
            Flash::error('Cliente no encontrado.');

            return redirect(route('clientes.index'));
        }

            $avatar = 'avatar/'.$clientes->avatar;
          if (empty($clientes->avatar)) {
            $avatar = 'avatar/avatar.png';
          }
          $edad = 'N/D';
          $rfc = VerificaRFC::validarRFC($clientes->RFC);
          if($rfc){
            $edad = 'Verdadero RFC';
            $anio = substr($clientes->RFC,4,2);
            $mes = substr($clientes->RFC,6,2);
            $dia = substr($clientes->RFC,8,2);
            /*
            $actdia=date(j);
            $actmes=date(n);
            $actanio=date(Y);
            //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
            if (($mes == $actmes) && ($dia > $actdia))
            {
              $actanio=($actanio-1);
            }
            //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

            if ($mes > $actmes) {
            $actanio=($actanio-1);}

            //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

            $edad=($actanio-$anio);
            */
            $edad = $dia.'/'.$mes.'/'.$anio;

          }
          $curp = VerificaRFC::validarCURP($clientes->CURP);
          if($curp)
          {
            $edad = 'Verdadero CURP';
            $anio = substr($clientes->CURP,4,2);
            $mes = substr($clientes->CURP,6,2);
            $dia = substr($clientes->CURP,8,2);
            $edad = $dia.'/'.$mes.'/'.$anio;
          }

          $bancos = cat_bancos::pluck('nombrecorto','id');
          $tipodocs = cattipodoc::pluck('tipo','id');
          $estados = catestados::pluck('nombre','id');
        return view('clientes.show')->with(compact('clientes','estados','avatar','tipodocs', 'bancos','edad'));
    }

    /**
     * Show the form for editing the specified clientes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientes = $this->clientesRepository->findWithoutFail($id);

        if (empty($clientes)) {
            Flash::error('Cliente no encontrado.');

            return redirect(route('clientes.index'));
        }
        //$giro = catgiroempresa::pluck('descripcion','id');
        $estados = catestados::pluck('nombre','id');
        $municipios = catmunicipios::get()->where('id_edo',1)->pluck('nomMunicipio','id');
        return view('clientes.edit')->with(compact('clientes','estados','municipios'));
    }

    /**
     * Update the specified clientes in storage.
     *
     * @param  int              $id
     * @param UpdateclientesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclientesRequest $request)
    {
        $clientes = $this->clientesRepository->findWithoutFail($id);

        if (empty($clientes)) {
            Flash::error('Cliente no encontrado');
            $sweeterror = 'Cliente no encontrado';
            return redirect(route('clientes.index'))->with(compact('sweeterror'));
        }

        $clientes = $this->clientesRepository->update($request->all(), $id);

        Flash::success('Clientes actualizado correctamente.');
        $sweet = 'Cliente actualizado correctamente';
        return redirect(route('clientes.index'))->with(compact('sweet'));
    }

    /**
     * Remove the specified clientes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientes = $this->clientesRepository->findWithoutFail($id);

        if (empty($clientes)) {
            Flash::error('Cliente no encontrado');
            $sweeterror = 'Cliente no encontrado';
            return redirect(route('clientes.index'))->with(compact('sweeterror'));
        }
        if ($clientes->accomerciales->count()>0)
        {
            Flash::error('Cliente no puede ser eliminado, tiene Acuerdos Comerciales Activos');
            $sweeterror = 'Cliente no puede ser eliminado, tiene Acuerdos Comerciales Activos';
            return redirect(route('clientes.index'))->with(compact('sweeterror'));
        }

        $this->clientesRepository->delete($id);

        Flash::success('Cliente borrado correctamente.');

        return redirect(route('clientes.index'));
    }
    public function avatar(Request $request)
    {
      $clienteid = $request->cliente_id;
      //$clientes = $this->clientesRepository->findWithoutFail($clienteid);
      //guardar la imagen en el sistema de archivos
      $manager = new ImageManager;
      $file = $request->file('avatarimg');
      $path = public_path() . '/avatar/';

      $filename = uniqid().$file->getClientOriginalName();
      //cambiar el tamaño de la imagen
      $image = $manager->make($file)->resize(400, 400)->save($path.$filename);
      //$file->move($path,$filename);

      //guardar el registro de la Imagen
      $avatar = clientes::find($clienteid);
      $avatar->avatar = $filename;
      $avatar->save(); //INSERT
      return back();
    }
}
