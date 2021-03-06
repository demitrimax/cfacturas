<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\catgiroempresa;


/**
 * Class clientes
 * @package App\Models
 * @version October 26, 2018, 11:36 pm UTC
 *
 * @property string nombre
 * @property string apellidopat
 * @property string apellidomat
 * @property string RFC
 * @property string CURP
 * @property string avatar
 */
class clientes extends Model
{

    use SoftDeletes;
    use LogsActivity;
    use DatesTranslator;

    public $table = 'clientes';

    protected $softCascade = ['accomerciales@restrict'];

    public $fillable = [
        'nombre',
        'apellidopat',
        'apellidomat',
        'nomcomercial',
        'RFC',
        'CURP',
        'persfisica',
        'direccion',
        'telefono',
        'correo',
        'giroempresa',
        'avatar',
        'asimsal'
    ];
    protected static $logAttributes = ['*'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nomcomercial' => 'string',
        'apellidopat' => 'string',
        'apellidomat' => 'string',
        'RFC' => 'string',
        'CURP' => 'string',
        'persfisica' => 'boolean',
        'avatar' => 'string',
        'correo' => 'string',
        'telefono' => 'string',
        'giroempresa' => 'string',
        'asimsal' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function getNomcompletoAttribute()
    {
        return "{$this->nombre} {$this->apellidopat} {$this->apellidomat}";
    }

    public function getNombrerfcAttribute()
    {
      return $this->RFC.'-'.$this->nombre.' '.$this->apellidopat.' '.$this->apellidomat;
    }

    public function datcontacto() {
      return $this->hasMany('App\Models\datcontacto','cliente_id');
    }

    public function direcciones() {
      return $this->hasOne('App\Models\direcciones','cliente_id');
    }

    public function catdocumentos() {
      return $this->hasMany('App\Models\catdocumentos','cliente_id');
    }

    public function catcuentas() {
      return $this->hasMany('App\Models\catcuentas','cliente_id');
    }

    public function accomerciales()
    {
      return $this->hasMany('App\Models\accomercial', 'cliente_id');
    }
    public function saldos()
    {
      return $this->belongsToMany('App\Models\saldos');
    }
  public function getCodigogiroAttribute()
  {
    $girocod = catgiroempresa::where('descripcion', $this->giroempresa)->first();
    if ($girocod)
    {
      return $girocod->codigo;
    }
    else
    {
      $girocod = substr($this->giroempresa,0,3);
      return strtoupper($girocod);
    }

  }
  public function getPersonafisicaAttribute()
  {
    if (strlen($this->RFC)>12)
    {
      return true;
    }
    else {
      return false;
    }
  }

}
