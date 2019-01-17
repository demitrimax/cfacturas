<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\ImageManager;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

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
      return back();
    }
}
