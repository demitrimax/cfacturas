<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class catgiroempresa
 * @package App\Models
 * @version January 21, 2019, 12:29 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string descripcion
 * @property string codigo
 */
class catgiroempresa extends Model
{
    use SoftDeletes;

    public $table = 'catgiroempresa';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'codigo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'codigo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
