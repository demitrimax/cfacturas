<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\ImageManager;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }
    //
    public function index() {
      $user = User::find(Auth::user()->id);
    	return view('users.profile')->with(compact('user'));
    }

     public function avatarchange(Request $request)
    {
      //guardar la imagen en el sistema de archivos
      $manager = new ImageManager;
      $file = $request->file('avatarimg');
      $path = public_path() . '/avatar/';
      $filename = uniqid().$file->getClientOriginalName();
      //cambiar el tamaño de la imagen
      $image = $manager->make($file)->resize(400, 400)->save($path.$filename);
      //$file->move($path,$filename);
      //guardar el registro de la Imagen
      $avatar = User::find(Auth::user()->id);
      $avatar->avatar = $filename;
      $avatar->save(); //INSERT
      Alert::success('Foto de perfil actualizada');
      return back();
    }
    public function storebio(Request $request)
    {
      $rules = [
        'biotext' =>  'required|min:20',
      ];
      $messages = [
        'biotext.min'         => 'Al menos 20 caracteres',
        'biotext.required'    => 'Es requerido un texto de biografia.',
      ];

        $this->validate($request, $rules, $messages);

      $input = $request->all();
      $usuario = User::find(Auth::user()->id);
      $usuario->bio = $request['biotext'];
      $usuario->save();
      Alert::success('Se ha actualizado su biografia');
      return back();
    }
    public function password(Request $request)
    {
      $rules = [
        'passanterior' =>  'required',
        'password'     => 'required|confirmed|min:6|max:15',
      ];
      $messages = [
        'password.min'          => 'Al menos 6 caracteres',
        'password.max'          => 'Máximo 15 caracteres',
        'password.confirmed'    => 'Las contraseñas no coinciden.',
        'password.required'     => 'El campo password es requerido.',
        'passanterior.required' => 'Se requiere la contraseña anterior',
      ];

        $this->validate($request, $rules, $messages);

      if (Hash::check($request->get('passanterior'), Auth::user()->password)) {
        $input = $request->all();
        $usuario = User::find(Auth::user()->id);
        $usuario->password = Hash::make($request['password']);
        $usuario->save();
        Alert::success('Se ha actualizado su password');
        return back();
        }
        else {
          Alert::error('La contraseña anterior no coincide', 'No coincide');
          return back();
        }
    }
}
