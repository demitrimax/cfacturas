<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class solicitudes
 * @package App\Models
 * @version December 8, 2018, 10:07 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string nombre
 * @property string correo
 * @property string telefono
 * @property string rfc
 * @property string condicion
 * @property string metodo
 * @property string forma
 * @property string concepto
 * @property string comentario
 * @property string adjunto
 * @property boolean atendido
 * @property string|\Carbon\Carbon fecha
 * @property integer atendidopor
 * @property integer facturaid
 */
class solicitudes extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $table = 'fac_solicitud';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'user_id',
        'correo',
        'telefono',
        'rfc',
        'condicion',
        'metodo',
        'forma',
        'concepto',
        'comentario',
        'adjunto',
        'atendido',
        'fecha',
        'atendidopor',
        'facturaid'
    ];

     protected static $logAttributes = ['*'];
     //protected static $logFillable = true;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'nombre' => 'string',
        'correo' => 'string',
        'telefono' => 'string',
        'rfc' => 'string',
        'condicion' => 'string',
        'metodo' => 'string',
        'forma' => 'string',
        'concepto' => 'string',
        'comentario' => 'string',
        'adjunto' => 'string',
        'atendido' => 'boolean',
        'atendidopor' => 'integer',
        'facturaid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function getSemaforofechaAttribute()
    {
      $now = now();
      $colorattribute = '';
      if ( $this->created_at->diffInDays($now) < 3 )
      {
        $colorattribute = 'success';
      }
      if ( $this->created_at->diffInDays($now) >= 3 )
      {
        $colorattribute = 'primary';
      }
      if ( $this->created_at->diffInDays($now) >= 5 )
      {
        $colorattribute = 'warning';
      }
      if ( $this->created_at->diffInDays($now) >= 10 )
      {
        $colorattribute = 'danger';
      }

      return $colorattribute;
    }

    public function usuario()
    {
      return $this->belongsTo('App\Models\users','user_id');
    }


}
