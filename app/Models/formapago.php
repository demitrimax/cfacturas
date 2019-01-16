<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class formapago
 * @package App\Models
 * @version January 15, 2019, 8:33 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection facSolicitud
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string descripcion
 */
class formapago extends Model
{
    use SoftDeletes;

    public $table = 'pago_forma';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
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
