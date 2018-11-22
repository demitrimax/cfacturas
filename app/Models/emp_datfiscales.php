<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class emp_datfiscales
 * @package App\Models
 * @version November 6, 2018, 3:48 am UTC
 *
 * @property \App\Models\Catempresa catempresa
 * @property \App\Models\Catestado catestado
 * @property \App\Models\Catmunicipio catmunicipio
 * @property integer empresa_id
 * @property string razonsocial
 * @property string RFC
 * @property string calle
 * @property string numeroExt
 * @property string numeroInt
 * @property integer estado_id
 * @property integer municipio_id
 * @property string colonia
 * @property integer codpostal
 * @property string referencias
 * @property boolean sucursal
 */
class emp_datfiscales extends Model
{
    use SoftDeletes;
    public $table = 'emp_datfiscales';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'empresa_id',
        'razonsocial',
        'RFC',
        'calle',
        'numeroExt',
        'numeroInt',
        'estado_id',
        'municipio_id',
        'colonia',
        'codpostal',
        'referencias',
        'sucursal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'empresa_id' => 'integer',
        'razonsocial' => 'string',
        'RFC' => 'string',
        'calle' => 'string',
        'numeroExt' => 'string',
        'numeroInt' => 'string',
        'estado_id' => 'integer',
        'municipio_id' => 'integer',
        'colonia' => 'string',
        'codpostal' => 'integer',
        'referencias' => 'string',
        'sucursal' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catempresa()
    {
        return $this->belongsTo(\App\Models\Catempresa::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catestado()
    {
        return $this->belongsTo(\App\Models\Catestado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catmunicipio()
    {
        return $this->belongsTo(\App\Models\Catmunicipio::class);
    }
}
