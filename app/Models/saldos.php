<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class saldos extends Model
{
    //
    use SoftDeletes;
    use LogsActivity;

    public $table = 'saldos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'monto',
        'fecha',
        'toperacion',
        'tmovimiento',
        'user_id',
        'observaciones'
    ];
    protected static $logAttributes = ['*'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'monto'          => 'float',
        'fecha'          => 'date',
        'toperacion'     => 'string',
        'tmovimiento'    => 'integer',
        'user_id'        => 'integer',
        'observaciones'  => 'string',

    ];

    public function empresas()
    {
      return $this->belongsToMany('App\Models\catempresas');
    }
    public function clientes()
    {
      return $this->belongsToMany('App\Models\clientes');
    }
    public function socios()
    {
      return $this->belongsToMany('App\Models\sociocomercial');
    }
    public function cattmovimiento()
    {
        return $this->belongsTo('App\Models\cattmovimiento','tmovimiento');
    }

}
