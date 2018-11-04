<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateclientesRequest;
use App\Http\Requests\UpdateclientesRequest;
use App\Repositories\clientesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\catestados;
use App\catmunicipios;
use App\Models\direcciones;
use App\Models\clientes;
use App\Models\catdocumentos;
use Intervention\Image\ImageManager;
use App\Models\cattipodoc;

class clientesController extends AppBaseController
{
    /** @var  clientesRepository */
    private $clientesRepository;

    public function __construct(clientesRepository $clientesRepo)
    {
        $this->clientesRepository = $clientesRepo;
        $this->middleware('auth');
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
        return view('clientes.create');
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
        $input = $request->all();

        $clientes = $this->clientesRepository->create($input);
        $mensaje = "swal('Excelente','El cliente se agregó correctamente','success')";
        $mensaje = "Se agregó correctamente.";
        Flash::success($mensaje);

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
          $tipodocs = cattipodoc::pluck('tipo','id');
          $estados = catestados::pluck('nombre','id');
        return view('clientes.show')->with(compact('clientes','estados','avatar','tipodocs'));
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

        return view('clientes.edit')->with('clientes', $clientes);
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

            return redirect(route('clientes.index'));
        }

        $clientes = $this->clientesRepository->update($request->all(), $id);

        Flash::success('Clientes actualizado correctamente.');

        return redirect(route('clientes.index'));
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

            return redirect(route('clientes.index'));
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
