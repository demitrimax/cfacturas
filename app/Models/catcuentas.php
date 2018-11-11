<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class catcuentas
 * @package App\Models
 * @version November 7, 2018, 4:51 pm UTC
 *
 * @property \App\Models\CatBanco catBanco
 * @property \App\Models\Cliente cliente
 * @property \App\Models\Catempresa catempresa
 * @property integer banco_id
 * @property string numcuenta
 * @property integer clabeinterbancaria
 * @property string sucursal
 * @property integer cliente_id
 * @property integer empresa_id
 * @property string swift
 */
class catcuentas extends Model
{

    use SoftDeletes;
    public $table = 'catcuentas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'banco_id',
        'numcuenta',
        'clabeinterbancaria',
        'sucursal',
        'cliente_id',
        'empresa_id',
        'swift'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'banco_id' => 'integer',
        'numcuenta' => 'string',
        'clabeinterbancaria' => 'integer',
        'sucursal' => 'string',
        'cliente_id' => 'integer',
        'empresa_id' => 'integer',
        'swift' => 'string'
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
    public function catBanco()
    {
        return $this->belongsTo('App\Models\cat_bancos','banco_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo('App\Models\clientes','cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catempresa()
    {
        return $this->belongsTo('App\Models\catempresas','empresa_id');
    }
}
