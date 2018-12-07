<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facsolicitud extends Model
{
    //
    use SoftDeletes;

    public $table = 'fac_solicitud';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
        'correo',
        'telefono',
        'rfc',
        'condicion',
        'metodo',
        'forma',
        'concepto',
        'comentario',
        'adjunto',
        'fecha',
    ];

    protected $casts = [
        'id' => 'integer',
        'nombre' => 'integer',
        'correo' => 'string',
        'telefono' => 'string',
        'rfc' => 'string',
        'condicion' => 'string',
        'metodo' => 'string',
        'forma' => 'string',
        'concepto' => 'string',
        'comentario' =>'string',
        'adjunto' => 'string',
        'fecha' => 'date',

    ];

}
