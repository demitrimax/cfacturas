<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatempresasRequest;
use App\Http\Requests\UpdatecatempresasRequest;
use App\Repositories\catempresasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\catestados;
use App\catmunicipios;
use App\Models\direcciones;
use App\Models\cattipodoc;
use App\Models\catdocumentos;
use App\Models\cat_bancos;
use App\Models\catgiroempresa;
use App\Models\catempresas;
use Intervention\Image\ImageManager;


class catempresasController extends AppBaseController
{
    /** @var  catempresasRepository */
    private $catempresasRepository;

    public function __construct(catempresasRepository $catempresasRepo)
    {
        $this->catempresasRepository = $catempresasRepo;
        $this->middleware('auth');
        $this->middleware('permission:empresas-list');
        $this->middleware('permission:empresas-create', ['only' => ['create','store']]);
        $this->middleware('permission:empresas-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empresas-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the catempresas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catempresasRepository->pushCriteria(new RequestCriteria($request));
        $catempresas = $this->catempresasRepository->all();

        return view('catempresas.index')
            ->with('catempresas', $catempresas);
    }

    /**
     * Show the form for creating a new catempresas.
     *
     * @return Response
     */
    public function create()
    {
        $giro = catgiroempresa::pluck('descripcion','id');
        $estados = catestados::pluck('nombre','id');
        $municipios = catmunicipios::get()->where('id_edo',1)->pluck('nomMunicipio','id');
        return view('catempresas.create')->with(compact('giro','estados','municipios'));
    }

    /**
     * Store a newly created catempresas in storage.
     *
     * @param CreatecatempresasRequest $request
     *
     * @return Response
     */
    public function store(CreatecatempresasRequest $request)
    {

        $rules = [
            'nombre'       => 'required',
            'rfc'          => 'max:15|required',
            'estado_id'    => 'required',
            'municipio_id' => 'required',
        ];

        $messages = [
            'rfc.unique'              => 'El RFC escrito ya existe en la base de datos de clientes',
            'rfc.required'            => 'El RFC es un valor requerido',
            'estado_id.required'      => 'Es requerido el Estado',
            'municipio_id.required'   => 'Es requerido el Municipio',

        ];
        $this->validate($request, $rules,$messages);

        $input = $request->all();

        $catempresas = $this->catempresasRepository->create($input);

        $direccion = new direcciones();
        $direccion->empresa_id = $catempresas->id;
        $direccion->calle = $input['calle'];
        $direccion->RFC = $input['rfc'];
        $direccion->numeroExt = $input['numeroExt'];
        $direccion->numeroInt = $input['numeroInt'];
        $direccion->estado_id = $input['estado_id'];
        $direccion->municipio_id = $input['municipio_id'];
        $direccion->colonia = $input['colonia'];
        $direccion->ciudad = $input['ciudad'];
        $direccion->codpostal = $input['codpostal'];
        $direccion->referencias = $input['referencias'];
        $direccion->save();

        Flash::success('Empresa guardada correctamente.');
        Alert::success('Empresa guardada correctamente.','Muy Bien!');

        return redirect(route('catempresas.index'));
    }

    /**
     * Display the specified catempresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);

        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');
            Alert::error('Empresa no encontrada','Ha ocurrido un error');

            return redirect(route('catempresas.index'));
        }
        $logoempresa = 'avatar/'.$catempresas->logoimg;
      if (empty($catempresas->logoimg)) {
        $logoempresa = 'avatar/av_empresa.png';
      }
        $tipodocs = cattipodoc::pluck('tipo','id');
        $estados = catestados::pluck('nombre','id');
        $bancos = cat_bancos::pluck('nombrecorto','id');
        return view('catempresas.show')->with(compact('catempresas','estados','tipodocs','bancos','logoempresa'));
    }

    /**
     * Show the form for editing the specified catempresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);
        $municipios = catmunicipios::where('id_edo',1)->pluck('nomMunicipio','id');
        if (empty($clientes->direcciones->id))
        {
            $direcciones = new direcciones();
            $direcciones->calle = '';
        }
        if(!empty($catempresas->direcciones->id))
        {
          $direcciones = direcciones::find($catempresas->direcciones->id);
          $municipios = catmunicipios::where('id_edo',$direcciones->estado_id)->pluck('nomMunicipio','id');
        }

        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');
            Alert::error('Empresa no encontrada');

            return redirect(route('catempresas.index'));
        }
        $giro = catgiroempresa::pluck('descripcion','id');
        $estados = catestados::pluck('nombre','id');
        return view('catempresas.edit')->with(compact('catempresas','giro','estados','municipios','direcciones'));
    }

    /**
     * Update the specified catempresas in storage.
     *
     * @param  int              $id
     * @param UpdatecatempresasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatempresasRequest $request)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);


        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');
            Alert::error('Empresa no encontrada');

            return redirect(route('catempresas.index'));
        }

        $rules = [
            'nombre'       => 'required',
            'rfc'          => 'max:15|required',
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

        $catempresas = $this->catempresasRepository->update($request->all(), $id);
        if(isset($catempresas->direcciones->id))
        {
          $direccion = direcciones::find($catempresas->direcciones->id);
        }
        else {
          $direccion = new direcciones();
        }
        $direccion->empresa_id = $catempresas->id;
        $direccion->calle = $request['calle'];
        $direccion->RFC = $request['rfc'];
        $direccion->numeroExt = $request['numeroExt'];
        $direccion->numeroInt = $request['numeroInt'];
        $direccion->estado_id = $request['estado_id'];
        $direccion->municipio_id = $request['municipio_id'];
        $direccion->colonia = $request['colonia'];
        $direccion->ciudad = $request['ciudad'];
        $direccion->codpostal = $request['codpostal'];
        $direccion->referencias = $request['referencias'];
        $direccion->save();

        Flash::success('Empresa actualizada correctamente.');
        Alert::success('Empresa actualizada correctamente.','Datos Actualizados');

        return redirect(route('catempresas.index'));
    }

    /**
     * Remove the specified catempresas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catempresas = $this->catempresasRepository->findWithoutFail($id);



        if (empty($catempresas)) {
            Flash::error('Empresa no encontrada');
            Alert::error('Empresa no encontrada','Error');

            return redirect(route('catempresas.index'));
        }
        //verificar que la empresa no tenga acuerdos comerciales
        if ($catempresas->acuerdos->count()>0)
        {
            Flash::error('La empresa no puede ser eliminada, tiene Acuerdos Comerciales Activos');
            $sweeterror='La empresa no puede ser eliminada, tiene Acuerdos Comerciales Activos';
            return redirect(route('catempresas.index'))->with(compact('sweeterror'));
        }

        $this->catempresasRepository->delete($id);

        Flash::success('Empresa borrada correctamente.');
        Alert::success('Empresa borrada correctamente.','Borrado');

        return redirect(route('catempresas.index'));
    }
    public function logotipo(Request $request)
    {
      $empresaid = $request->empresa_id;
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
      $avatar = catempresas::find($empresaid);
      $avatar->logoimg = $filename;
      $avatar->save(); //INSERT
      Alert::success('Logo de la empresa, guardado correctamente');
      return back();
    }
}
