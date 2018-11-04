<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class catdocumentos
 * @package App\Models
 * @version October 28, 2018, 10:30 pm UTC
 *
 * @property string tipodoc
 * @property string archivo
 * @property string nota
 */
class catdocumentos extends Model
{

    public $table = 'catdocumentos';



    public $fillable = [
        'tipodoc',
        'archivo',
        'nota'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipodoc' => 'string',
        'archivo' => 'string',
        'nota' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipodoc' => 'required',
        'archivo' => 'required'
    ];

    public function clientes()
    {
          return $this->belongsTo('App\Models\clientes', 'id');
    }
    public function cattipodoc()
    {
          return $this->belongsTo('App\Models\cattipodoc','tipodoc');
    }


}
