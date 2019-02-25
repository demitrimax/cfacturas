<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class comprobantes extends Model
{
    //
    use SoftDeletes;
    use LogsActivity;

    public $table = 'comprobantes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'documento',
        'foliocomp',
        'nota',
        'banco_id',
        'archivo',

    ];
    protected static $logAttributes = ['*'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'documento' => 'string',
        'foliocomp' => 'string',
        'nota'      => 'string',
        'banco_id'  => 'integer',
        'archivo'   => 'string',
    ];
    public function solicitudes()
    {
      return $this->belongsToMany('App\Models\facsolicitud','factsol_comprobante','comprobante_id','solfact_id');
    }

}
