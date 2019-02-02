<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class catempresas
 * @package App\Models
 * @version November 4, 2018, 6:45 pm UTC
 *
 * @property string nombre
 * @property string correo_factura
 * @property string correo_notifica
 * @property string telefono
 * @property integer comision
 */
class catempresas extends Model
{

    use SoftDeletes;
    use LogsActivity;
    public $table = 'catempresas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'rfc',
        'telefono',
        'direccion',
        'comision',
        'cliente_id',
        'apoderadolegal',
        'giroempresa',
        'correo_factura',
        'correo_notifica',
        'logoimg',


    ];
    protected static $logAttributes = ['*'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'             => 'integer',
        'nombre'         => 'string',
        'rfc'            => 'string',
        'telefono'       => 'string',
        'direccion'      => 'string',
        'apoderadolegal' => 'string',
        'comision'       => 'float',
        'giroempresa'    => 'string',
        'correo_factura' => 'string',
        'correo_notifica'=> 'string',
        'logoimg'        => 'string',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function emp_datfiscales() {
      return $this->hasMany('App\Models\emp_datfiscales','empresa_id');
    }
    public function direcciones(){
      return $this->hasOne('App\Models\direcciones','empresa_id');
    }

    public function catdocumentos() {
      return $this->hasMany('App\Models\catdocumentos', 'empresa_id');
    }

    public function catcuentas() {
      return $this->hasMany('App\Models\catcuentas', 'empresa_id');
    }
    public function girodeempresa()
    {
      return $this->belongsTo('App\Models\catgiroempresa','giroempresa');
    }
    public function getGiroempresasAttribute()
    {
      $giro = "N/D";
      if ($this->giroempresa)
      {
        $giro = $this->girodeempresa->descripcion;
      }
      return $giro;
    }
    public function acuerdos()
    {
      return $this->BelongsToMany('App\Models\accomercial','ac_empresas','empresa_id','acuerdoc_id');
    }

}
