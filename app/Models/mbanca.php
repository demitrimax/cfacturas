<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\DatesTranslator;

/**
 * Class mbanca
 * @package App\Models
 * @version November 15, 2018, 7:06 am CST
 *
 * @property \App\Models\Catcuenta catcuenta
 * @property \App\Models\Cattmovimiento cattmovimiento
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer cuenta_id
 * @property string toperacion
 * @property integer tmovimiento
 * @property string concepto
 * @property float monto
 * @property string|\Carbon\Carbon fecha
 * @property float saldo
 * @property integer user_id
 */
class mbanca extends Model
{
    use SoftDeletes;
    use LogsActivity;
    use DatesTranslator;

    public $table = 'mbanca';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'cuenta_id',
        'toperacion',
        'tmovimiento',
        'concepto',
        'monto',
        'metodo',
        'referencia',
        'fecha',
        'saldo',
        'user_id'
    ];
    protected static $logAttributes = ['*'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cuenta_id' => 'integer',
        'toperacion' => 'string',
        'tmovimiento' => 'integer',
        'concepto' => 'string',
        'metodo' => 'string',
        'referencia' => 'string',
        'monto' => 'float',
        'saldo' => 'float',
        'fecha' => 'date',
        'user_id' => 'integer'
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
    public function catcuenta()
    {
        return $this->belongsTo('App\Models\catcuentas','cuenta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cattmovimiento()
    {
        return $this->belongsTo('App\Models\cattmovimiento','tmovimiento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo('App\Models\users', 'user_id');
    }
}
