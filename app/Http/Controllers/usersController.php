<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateusersRequest;
use App\Http\Requests\UpdateusersRequest;
use App\Repositories\usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;


class usersController extends AppBaseController
{
    /** @var  usersRepository */
    private $usersRepository;

    public function __construct(usersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the users.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usersRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->usersRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created users in storage.
     *
     * @param CreateusersRequest $request
     *
     * @return Response
     */
    public function store(CreateusersRequest $request)
    {
        $input = $request->all();

        //$users = $this->usersRepository->create($input);

        $usuario = new User();
            $usuario->name = $input['name'];
            $usuario->email = $input['email'];
            $usuario->rol = $input['rol'];
            $usuario->password = Hash::make($input['password']);
            $usuario->nombre = $input['nombre'];
            $usuario->apellidos= $input['apellidos'];
            $usuario->cargo = $input['cargo'];
            $usuario->save();

        Flash::success('Usuario guardado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified users in storage.
     *
     * @param  int              $id
     * @param UpdateusersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusersRequest $request)
    {
        $users = $this->usersRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($users)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        //$users = $this->usersRepository->update($request->all(), $id);
        $usuario =  User::find($id);
            $usuario->name = $input['name'];
            $usuario->email = $input['email'];
            $usuario->rol = $input['rol'];
            $usuario->password = Hash::make($input['password']);
            $usuario->nombre = $input['nombre'];
            $usuario->apellidos= $input['apellidos'];
            $usuario->cargo = $input['cargo'];
            $usuario->save();
        Flash::success('Usuario actualizado correctamente');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Usuario borrado correctamente.');

        return redirect(route('users.index'));
    }
}
