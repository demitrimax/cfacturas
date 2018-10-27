<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class datcontacto
 * @package App\Models
 * @version October 27, 2018, 5:48 am UTC
 *
 * @property string tipo
 * @property string contacto
 * @property integer cliente_id
 */
class datcontacto extends Model
{

    public $table = 'datcontactos';



    public $fillable = [
        'tipo',
        'contacto',
        'cliente_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipo' => 'string',
        'contacto' => 'string',
        'cliente_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required',
        'contacto' => 'required|unique:datcontactos|max:65'
    ];


}
