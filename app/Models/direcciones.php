<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\DatesTranslator;
use App\Models\clientes;

/**
 * Class direcciones
 * @package App\Models
 * @version October 28, 2018, 1:38 am UTC
 *
 * @property integer cliente_id
 * @property string RFC
 * @property string razonsocial
 * @property string calle
 * @property string numeroExt
 * @property string numeroInt
 * @property integer estado_id
 * @property integer municipio_id
 * @property string colonia
 * @property integer codpostal
 * @property string referencias
 */
class direcciones extends Model
{

    use SoftDeletes;
    use LogsActivity;
    use DatesTranslator;
    public $table = 'direcciones';



    public $fillable = [
        'cliente_id',
        'sociocomer_id',
        'empresa_id',
        'RFC',
        'razonsocial',
        'calle',
        'numeroExt',
        'numeroInt',
        'estado_id',
        'municipio_id',
        'colonia',
        'codpostal',
        'referencias',
        'ciudad',
    ];
    protected static $logAttributes = ['*'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cliente_id'   => 'integer',
        'empresa_id'   => 'integer',
        'sociocomer_id'=> 'integer',
        'RFC'          => 'string',
        'razonsocial'  => 'string',
        'calle'        => 'string',
        'numeroExt'    => 'string',
        'numeroInt'    => 'string',
        'estado_id'    => 'integer',
        'municipio_id' => 'integer',
        'colonia'      => 'string',
        'codpostal'    => 'integer',
        'referencias'  => 'string',
        'ciudad'       => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function clientes() {
      return $this->belongsTo('App\Models\clientes', 'cliente_id');
    }
    public function estados() {
      return $this->belongsTo('App\catestados','estado_id');
    }
    public function municipios() {
      return $this->belongsTo('App\catmunicipios','municipio_id');
    }

    public function getClientenombreAttribute()
    {
      $cliente = clientes::find($this->cliente_id);
      $clientenom = 'N/D';
      if(!empty($cliente))
      {
        $clientenom = $cliente->nombre.' '.$cliente->apellidopat.' '.$cliente->apellidomat;
      }
      return $clientenom;
    }

}
