<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DatesTranslator;

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
    use DatesTranslator;

    public $table = 'sociocomercial';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellidopat',
        'apellidomat',
        'RFC',
        'CURP',
        'avatar',
        'persfisica',
        'correo',
        'telefono',
        'comision',
        'base'
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
        'correo' => 'string',
        'telefono' => 'string',
        'comision' => 'float',
        'base' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function acuerdoscom()
    {
      return $this->hasMany('App\Models\accomercial', 'sociocomer_id');
    }

    public function documentos()
    {
      return $this->belongsToMany('App\Models\catdocumentos');
    }
    public function cuentas()
    {
      return $this->belongsToMany('App\Models\catcuentas');
    }
    public function direcciones()
    {
      return $this->hasOne('App\Models\direcciones','sociocom_id');
    }
    public function getNomcompletoAttribute()
    {
      return $this->nombre.' '.$this->apellidopat.' '.$this->apellidomat;
    }

}
