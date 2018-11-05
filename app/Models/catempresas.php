<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class catempresas
 * @package App\Models
 * @version November 4, 2018, 6:45 pm UTC
 *
 * @property string nombre
 * @property string correo_factura
 * @property string correo_notifica
 * @property string telefono
 * @property integer comision
 */
class catempresas extends Model
{

    use SoftDeletes;
    public $table = 'catempresas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'correo_factura',
        'correo_notifica',
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
        'correo_factura' => 'string',
        'correo_notifica' => 'string',
        'telefono' => 'string',
        'comision' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
