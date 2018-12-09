<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class catestados extends Model
{
    //
    use LogsActivity;
    protected static $logAttributes = ['*'];
    
    public function direccion() {
      return $this->hasMany('App\Models\direcciones','estado_id');
    }
    public function municipios() {
      return $this->hasMany('App\catmunicipios', 'id_edo');
    }
}
