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
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\cattipodoc;
use App\Models\sociocomercial;
use App\Models\catdocumentos;
use App\Models\cat_bancos;
use App\Models\catcuentas;
use App\Models\direcciones;
use App\Repositories\catcuentasRepository;
use App\Http\Requests\CreatecatcuentasRequest;
use App\Http\Requests\UpdatecatcuentasRequest;
use App\Helpers\VerificaRFC;
use App\catestados;
use App\catmunicipios;
use App\catsepomex;
use Intervention\Image\ImageManager;

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
        $estados = catestados::pluck('nombre','id');
        $municipios = catmunicipios::get()->where('id_edo',1)->pluck('nomMunicipio','id');
        return view('sociocomercials.create')->with(compact('estados','municipios'));
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
      $rules = [
          'nombre'       => 'required',
          'apellidopat'  => 'required',
          'apellidomat'  => 'required',
          'RFC'          => 'max:15|required',
          'CURP'         => 'max:18|nullable',
          'estado_id'    => 'required',
          'municipio_id' => 'required',
          'codpostal'    => 'numeric',
      ];

      $messages = [
          'RFC.unique'              => 'El RFC escrito ya existe en la base de datos de clientes',
          'RFC.required'            => 'El RFC es un valor requerido',
          'CURP.unique'             => 'La CURP que escribió ya esta en uso.',
          'estado_id.required'      => 'Es requerido el Estado',
          'municipio_id.required'   => 'Es requerido el Municipio',
          'giroempresa.required'    => 'Es necesario que ingrese el giro de la empresa',
          'codpostal.numeric'       => 'El Código Postal debe ser un número.',

      ];

      $this->validate($request, $rules,$messages);

        $input = $request->all();

        $sociocomercial = $this->sociocomercialRepository->create($input);
        $direccion = new direcciones();
        $direccion->sociocom_id = $sociocomercial->id;
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

        $avatar = 'avatar/'.$sociocomercial->avatar;
      if (empty($sociocomercial->avatar)) {
        $avatar = 'avatar/avatar.png';
      }
      $fecnac = 'N/D';
      $rfc = VerificaRFC::validarRFC($sociocomercial->RFC);
      if($rfc){
        $fecnac = 'Verdadero RFC';
        $anio = substr($sociocomercial->RFC,4,2);
        $mes = substr($sociocomercial->RFC,6,2);
        $dia = substr($sociocomercial->RFC,8,2);
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
        $fecnac = $dia.'/'.$mes.'/'.$anio;

      }
      $curp = VerificaRFC::validarCURP($sociocomercial->CURP);
      if($curp)
      {
        $fecnac = 'Verdadero CURP';
        $anio = substr($sociocomercial->CURP,4,2);
        $mes = substr($sociocomercial->CURP,6,2);
        $dia = substr($sociocomercial->CURP,8,2);
        $fecnac = $dia.'/'.$mes.'/'.$anio;
      }


        $tipodocs = cattipodoc::pluck('tipo','id');
        $bancos = cat_bancos::pluck('nombrecorto','id');

        return view('sociocomercials.show')->with(compact('sociocomercial','tipodocs','bancos','avatar','fecnac'));
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
        $estados = catestados::pluck('nombre','id');
        $municipios = catmunicipios::get()->where('id_edo',1)->pluck('nomMunicipio','id');

        if (empty($sociocomercial)) {
          Flash::error('Socio comercial no encontrado');
          Alert::error('Socio Comercial no encontrado');

            return redirect(route('sociocomercials.index'));
        }
        if (empty($sociocomercial->direcciones->id))
        {
            $direccion = new direcciones();
            $direccion->calle = '';
        }
        if(!empty($sociocomercial->direcciones->id))
        {
          $direccion = direcciones::find($sociocomercial->direcciones->id);
          $municipios = catmunicipios::where('id_edo',$direccion->estado_id)->pluck('nomMunicipio','id');
        }


        return view('sociocomercials.edit')->with(compact('sociocomercial','estados','municipios','direccion'));
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
        $rules = [
            'nombre'       => 'required',
            'RFC'          => 'max:15|required',
            'CURP'         => 'max:18|nullable',
            'estado_id'    => 'required',
            'municipio_id' => 'required',
            'codpostal'    => 'nullable|numeric',
        ];

        $messages = [
            'RFC.unique'              => 'El RFC escrito ya existe en la base de datos de clientes',
            'RFC.required'            => 'El RFC es un valor requerido',
            'CURP.unique'             => 'La CURP que escribió ya esta en uso.',
            'estado_id.required'      => 'Es requerido el Estado',
            'municipio_id.required'   => 'Es requerido el Municipio',
            'codpostal.numeric'       => 'El Código postal debe ser numerico',

        ];

        $this->validate($request, $rules,$messages);

        $sociocomercial = $this->sociocomercialRepository->update($request->all(), $id);

        if(isset($sociocomercial->direcciones->id))
        {
          $direccion = direcciones::find($sociocomercial->direcciones->id);
        }
        else {
          $direccion = new direcciones();
        }
        $input = $request->all();
        //$direccion->sociocom_id = $sociocomercial->id;
        //dd($direccion);
        //dd($input['calle']);
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
        if ($sociocomercial->acuerdoscom->count()>0)
        {
            Flash::error('Socio Comercial no puede ser eliminado, tiene Acuerdos Comerciales Activos');
            $sweeterror = 'Socio Comercial no puede ser eliminado, tiene Acuerdos Comerciales Activos';
            return redirect(route('sociocomercials.index'))->with(compact('sweeterror'));
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

    public function guardaCuenta(Request $request)
    {
      $cuentas = catcuentas::where('numcuenta', $request->input('numcuenta'))->where('banco_id',$request->input('banco_id'))->first();

      if ($cuentas) {
        Flash::error('Ya existe el misno número Cuenta Bancaria en el mismo Banco');
        $sweeterror = "Ya existe una cuenta con el mismo banco. Cuenta existente";
        return back()->with($sweeterror);
      }

      $rules = [
        'banco_id' => 'required',
        'numcuenta' => 'required|max:10',
        //'clabeinterbancaria' => 'nullable|digits:18|unique:catcuentas',
        'sucursal' => 'max:5',
      ];
      $this->validate($request, $rules);

      $input = $request->all();
      $socio_id = $input['empresa_id'];
      $sociocomercial = $this->sociocomercialRepository->findWithoutFail($socio_id);

      //$catcuentas = $this->catcuentasRepository->create($input);
      $catcuentas = new catcuentas;
      $catcuentas->banco_id = $input['banco_id'];
      $catcuentas->numcuenta = $input['numcuenta'];
      $catcuentas->clabeinterbancaria = $input['clabeinterbancaria'];
      $catcuentas->sucursal = $input['sucursal'];
      $catcuentas->swift = $input['swift'];
      $catcuentas->save();
      $sociocomercial->cuentas()->attach($catcuentas);


      Flash::success('Cuenta guardada correctamente.');
      $sweet = 'Cuenta guardada correctamente';
      if(isset($input['redirect'])){
        $redirect = $input['redirect'];
        if (isset($input['cliente_id']))
        {
          $retornaid =$input['cliente_id'];
        }
        if (isset($input['empresa_id']))
        {
          $retornaid = $input['empresa_id'];
        }
        return redirect(route($redirect, [$retornaid]))->with(compact('sweet'));
      }
      else {

      return redirect(route('catcuentas.index'));
      }
    }
    public function avatar(Request $request)
    {
      $sociocomercialid = $request->sociocomercial_id;
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
      $avatar = sociocomercial::find($sociocomercialid);
      $avatar->avatar = $filename;
      $avatar->save(); //INSERT
      return back();
    }
}
