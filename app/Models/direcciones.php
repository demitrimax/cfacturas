<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class direcciones
 * @package App\Models
 * @version October 28, 2018, 1:38 am UTC
 *
 * @property integer cliente_id
 * @property string RFC
 * @property string razonsocial
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

    use SoftDeletes;
    public $table = 'direcciones';



    public $fillable = [
        'cliente_id',
        'RFC',
        'razonsocial',
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
        'cliente_id'   => 'integer',
        'RFC'          => 'string',
        'razonsocial'  => 'string',
        'calle'        => 'string',
        'numeroExt'    => 'string',
        'numeroInt'    => 'string',
        'estado_id'    => 'integer',
        'municipio_id' => 'integer',
        'colonia'      => 'string',
        'codpostal'    => 'integer',
        'referencias'  => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente_id'    => 'required',
        'RFC'           => 'required|unique:direcciones',
        'razonsocial'   => 'required',
        'calle'         => 'required',
        'estado_id'     => 'required',
        'municipio_id'  => 'required',
        'numeroExt'     => 'max:5',
        'numeroInt'     => 'max:5',
        'codpostal'     => 'numeric',
    ];

    public function clientes() {
      return $this->belongsTo('App\Models\clientes', 'cliente_id');
    }
    public function estados() {
      return $this->belongsTo('App\catestados','estado_id');
    }
    public function municipios() {
      return $this->belongsTo('App\catmunicipios','municipio_id');
    }

}
