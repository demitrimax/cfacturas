<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class direcciones
 * @package App\Models
 * @version October 28, 2018, 1:38 am UTC
 *
 * @property integer cliente_id
 * @property string calle
 * @property string numeroExt
 * @property string numeroInt
 * @property integer estado_id
 * @property integer municipio_id
 * @property string colonia
 * @property integer codpostal
 * @property string referencias
 */
class direcciones extends Model
{

    public $table = 'direcciones';
    


    public $fillable = [
        'cliente_id',
        'calle',
        'numeroExt',
        'numeroInt',
        'estado_id',
        'municipio_id',
        'colonia',
        'codpostal',
        'referencias'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cliente_id' => 'integer',
        'calle' => 'string',
        'numeroExt' => 'string',
        'numeroInt' => 'string',
        'estado_id' => 'integer',
        'municipio_id' => 'integer',
        'colonia' => 'string',
        'codpostal' => 'integer',
        'referencias' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente_id' => 'required',
        'calle' => 'required',
        'estado_id' => 'required',
        'municipio_id' => 'required'
    ];

    
}
