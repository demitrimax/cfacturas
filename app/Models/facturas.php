<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class facturas
 * @package App\Models
 * @version December 27, 2018, 9:09 pm CST
 *
 * @property \App\Models\Cliente cliente
 * @property \App\Models\Direccione direccione
 * @property \App\Models\Catempresa catempresa
 * @property \App\Models\PagoMetodo pagoMetodo
 * @property \App\Models\PagoCondicion pagoCondicion
 * @property \App\Models\FacEstatus facEstatus
 * @property \Illuminate\Database\Eloquent\Collection facSolicitud
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer cliente_id
 * @property integer direccion_id
 * @property integer empresa_id
 * @property string concepto
 * @property integer metodopago_id
 * @property integer condicionpago_id
 * @property integer complementopago_id
 * @property string|\Carbon\Carbon fecha
 * @property integer estatus_id
 * @property string comprobante
 */
class facturas extends Model
{
    use SoftDeletes;

    public $table = 'facturacion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cliente_id',
        'direccion_id',
        'empresa_id',
        'concepto',
        'metodopago_id',
        'condicionpago_id',
        'complementopago_id',
        'fecha',
        'estatus_id',
        'comprobante'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cliente_id' => 'integer',
        'direccion_id' => 'integer',
        'empresa_id' => 'integer',
        'concepto' => 'string',
        'metodopago_id' => 'integer',
        'condicionpago_id' => 'integer',
        'complementopago_id' => 'integer',
        'estatus_id' => 'integer',
        'comprobante' => 'string'
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
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function direccione()
    {
        return $this->belongsTo(\App\Models\Direccione::class);
    }

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
    public function pagoMetodo()
    {
        return $this->belongsTo(\App\Models\PagoMetodo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pagoCondicion()
    {
        return $this->belongsTo(\App\Models\PagoCondicion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function facEstatus()
    {
        return $this->belongsTo(\App\Models\FacEstatus::class);
    }
}