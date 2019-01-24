<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DatesTranslator;

/**
 * Class blog
 * @package App\Models
 * @version January 15, 2019, 10:57 am CST
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection facSolicitud
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string titulo
 * @property string copete
 * @property string cuerpo
 * @property integer usuario_id
 */
class blog extends Model
{
    use SoftDeletes;
    use DatesTranslator;

    public $table = 'blog';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'copete',
        'cuerpo',
        'usuario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titulo' => 'string',
        'copete' => 'string',
        'cuerpo' => 'string',
        'usuario_id' => 'integer'
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
    public function user()
    {
        return $this->belongsTo('App\Models\users','usuario_id');
    }
}
