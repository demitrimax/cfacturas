<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class clientes
 * @package App\Models
 * @version October 26, 2018, 11:36 pm UTC
 *
 * @property string nombre
 * @property string apellidopat
 * @property string apellidomat
 * @property string RFC
 * @property string CURP
 * @property string avatar
 */
class clientes extends Model
{

    use SoftDeletes;
    public $table = 'clientes';



    public $fillable = [
        'nombre',
        'apellidopat',
        'apellidomat',
        'RFC',
        'CURP',
        'avatar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellidopat' => 'string',
        'apellidomat' => 'string',
        'RFC' => 'string',
        'CURP' => 'string',
        'avatar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellidopat' => 'required',
        'RFC' => 'max:15|required',
        'CURP' => 'max:18|required'
    ];

    public function datcontacto() {
      return $this->hasMany('App\Models\datcontacto','cliente_id');
    }

    public function direcciones() {
      return $this->hasMany('App\Models\direcciones','cliente_id');
    }

    public function catdocumentos() {
      return $this->hasMany('App\Models\catdocumentos','cliente_id');
    }


}