<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class cattmovimiento
 * @package App\Models
 * @version November 15, 2018, 6:48 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection Mbanca
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string descripcion
 * @property string descrp_corto
 */
class cattmovimiento extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $table = 'cattmovimiento';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'descrp_corto'
    ];
    protected static $logAttributes = ['*'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'descrp_corto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mbancas()
    {
        return $this->hasMany(\App\Models\Mbanca::class);
    }
}
