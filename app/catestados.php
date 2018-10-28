<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catestados extends Model
{
    //
    public function direccion() {
      return $this->hasMany('App\Models\direcciones','estado_id');
    }
}
