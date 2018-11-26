<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class acempresas extends Model
{
    //
    use SoftDeletes;
    public $table = 'ac_empresas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'acuerdoc_id',
        'empresa_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'acuerdo_id' => 'integer',
        'empresa_id' => 'integer',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function acuerdoc()
    {
      return $this->belongsTo('App\Models\accomercial','acuerdo_id');
    }
    public function empresa()
    {
      return $this->belongsTo('App\Models\catempresas','empresa_id');
    }
}
