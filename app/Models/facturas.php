<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DatesTranslator;
use Date;

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
    use DatesTranslator;

    public $table = 'facturas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at','fecha'];


    public $fillable = [
        'cliente_id',
        'accomercial_id',
        'empresa_id',
        'observaciones',
        'metodopago_id',
        'condicionpago_id',
        'complementopago_id',
        'subtotal',
        'iva',
        'total',
        'fecha',
        'estatus_id',
        'comprobante',
        'formapago_id',
        'foliofac',
        'user_id',
        'savedas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'accomercial_id' => 'integer',
        'cliente_id' => 'integer',
        'direccion_id' => 'integer',
        'empresa_id' => 'integer',
        'observaciones' => 'string',
        'metodopago_id' => 'integer',
        'condicionpago_id' => 'integer',
        'complementopago_id' => 'integer',
        'subtotal' => 'float',
        'iva' => 'float',
        'total' => 'float',
        'estatus_id' => 'integer',
        'comprobante' => 'string',
        'formapago_id' => 'integer',
        'foliofac' => 'string',
        'user_id' => 'integer',
        'savedas' => 'string'
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
        return $this->belongsTo(\App\Models\clientes::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function acuerdo()
    {
        return $this->belongsTo('App\Models\accomercial','accomercial_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function empresa()
    {
        return $this->belongsTo(\App\Models\catempresas::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pagoMetodo()
    {
        return $this->belongsTo('App\Models\pagometodo','metodopago_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pagoForma()
    {
        return $this->belongsTo('App\Models\formapago','formapago_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function facEstatus()
    {
        return $this->belongsTo(\App\Models\facestatus::class);
    }

    public function getFechaAttribute($fecha)
    {
      return new Date($fecha);
    }
}
