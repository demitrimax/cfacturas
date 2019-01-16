<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class facsolicitud extends Model
{
    //
    use SoftDeletes;
    use LogsActivity;

    public $table = 'fac_solicitud';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at','fecha'];

    public $fillable = [
        'nombre',
        'correo',
        'telefono',
        'rfc',
        'condicion',
        'usocfdi',
        'metodo',
        'forma',
        'concepto',
        'comentario',
        'adjunto',
        'fecha',
    ];
    //protected static $logFillable = true;
    protected static $logAttributes = ['*'];

    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'correo' => 'string',
        'telefono' => 'string',
        'rfc' => 'string',
        'usocfdi' => 'integer',
        'condicion' => 'string',
        'metodo' => 'integer',
        'forma' => 'integer',
        'concepto' => 'string',
        'comentario' =>'string',
        'adjunto' => 'string',
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
    public function usodecfdi()
    {
      return $this->belongsTo('App\Models\usocfdi','usocfdi');
    }
    public function GetUsocdecfdicodAttribute()
    {
      return $this->usodecfdi->codigo.' '.$this->usodecfdi->descripcion;
    }
    public function pagometodo()
    {
      return $this->belongsTo('App\Models\pagometodo','metodo');
    }
    public function formadepago()
    {
      return $this->belongsTo('App\Models\formapago','forma');
    }

}
