<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pagocondicion
 * @package App\Models
 * @version December 20, 2018, 1:19 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string nombre
 * @property string descripcion
 */
class pagocondicion extends Model
{
    use SoftDeletes;

    public $table = 'pago_condicion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
