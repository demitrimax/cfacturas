<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\clientes;
use App\Models\sociocomer;
use App\Models\users;

/**
 * Class accomercial
 * @package App\Models
 * @version November 25, 2018, 5:41 pm CST
 *
 * @property \App\Models\Cliente cliente
 * @property \App\Models\Cliente cliente
 * @property \App\Models\Direccione direccione
 * @property \App\Models\Catcuenta catcuenta
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property date fechasolicitud
 * @property integer sociocomer_id
 * @property integer cliente_id
 * @property integer direccion_id
 * @property integer cuenta_id
 * @property string descripcion
 * @property string informacion
 * @property float ac_principalporc
 * @property float ac_secundarioporc
 * @property boolean autorizado
 * @property integer elab_user_id
 * @property integer aut_user_id
 * @property integer aut_user2_id
 */
class accomercial extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $table = 'acuerdoscomerciales';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fechasolicitud',
        'sociocomer_id',
        'cliente_id',
        'direccion_id',
        'cuenta_id',
        'descripcion',
        'informacion',
        'ac_principalporc',
        'ac_secundarioporc',
        'base',
        'autorizado',
        'elab_user_id',
        'aut_user_id',
        'aut_user2_id'
    ];
    protected static $logAttributes = ['*'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fechasolicitud' => 'date',
        'sociocomer_id' => 'integer',
        'cliente_id' => 'integer',
        'direccion_id' => 'integer',
        'cuenta_id' => 'integer',
        'descripcion' => 'string',
        'informacion' => 'string',
        'ac_principalporc' => 'float',
        'ac_secundarioporc' => 'float',
        'base' => 'string',
        'autorizado' => 'boolean',
        'elab_user_id' => 'integer',
        'aut_user_id' => 'integer',
        'aut_user2_id' => 'integer'
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
    public function cliente()
    {
        return $this->belongsTo('App\Models\clientes','cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sociocomer()
    {
        return $this->belongsTo('App\Models\sociocomercial','sociocomer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function direccion()
    {
        return $this->belongsTo('App\Models\direcciones','direccion_id');
    }

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
    public function elabuser()
    {
        return $this->belongsTo('App\Models\users','elab_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function autuser()
    {
        return $this->belongsTo('App\Models\users','aut_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function autuser2()
    {
        return $this->belongsTo('App\Models\users','aut_user2_id');
    }

    public function empresasfact()
    {
        return $this->hasMany('App\acempresas','acuerdoc_id');
    }

    public function getNomsocioAttribute()
    {
      $socioid = $this->sociocomer_id;
      $nomsocio = "N/D";

      if($socioid) {
        $socio = sociocomercial::where('id',$socioid)->first();
        $nomsocio = "N/D";
        //si existe
        if($socio->count()>0)
        {
          $nomsocio = $this->sociocomer->nombre;
        }

      }
      return $nomsocio;
    }
    public function getNomclienteAttribute()
    {
      $clienteid = $this->cliente_id;
      $nomcliente = "N/D";
      //el cliente no debe haberse eliminado
      if($clienteid) {
        $nomcliente = $this->cliente->nomcompleto;
      }
      return $nomcliente;
    }
    public function getNomsupervisorAttribute()
    {
      $nomsupervisor = "N/D";
      $autoriza1_id = $this->aut_user_id;
      if ($autoriza1_id)
      {
        $autoriza1 = users::where('id',$autoriza1_id)->first();
        if ($autoriza1->count()>0)
        {
          $nomsupervisor = $this->autuser->name;
        }
      }
      return $nomsupervisor;
    }
    public function getNomautorizaAttribute()
    {
      $nomautoriza = "N/D";
      $autoriza2_id = $this->aut_user2_id;
      if ($autoriza2_id)
      {
        $autoriza2 = users::where('id',$autoriza2_id)->first();
        if ($autoriza2->count()>0)
        {
          $nomautoriza = $this->autuser2->name;
        }
      }
      return $nomautoriza;
    }

}
