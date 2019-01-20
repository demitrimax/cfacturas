<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class sociocomercial
 * @package App\Models
 * @version January 19, 2019, 11:43 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string nombre
 * @property string RFC
 * @property string CURP
 * @property string avatar
 * @property boolean persfisica
 * @property string direccion
 * @property string correo
 * @property string telefono
 */
class sociocomercial extends Model
{
    use SoftDeletes;

    public $table = 'sociocomercial';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'RFC',
        'CURP',
        'avatar',
        'persfisica',
        'direccion',
        'correo',
        'telefono',
        'comision'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'RFC' => 'string',
        'CURP' => 'string',
        'avatar' => 'string',
        'persfisica' => 'boolean',
        'direccion' => 'string',
        'correo' => 'string',
        'telefono' => 'string',
        'comision' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'nombre' => 'required',
      'RFC' => 'required',
      'comision' => 'required'

    ];


}
