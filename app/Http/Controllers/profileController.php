<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\ImageManager;
use Auth;

class profileController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }
    //
    public function index() {

    	return view('users.profile');
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
