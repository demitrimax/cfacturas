<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\DatesTranslator;

/**
 * Class cat_bancos
 * @package App\Models
 * @version November 7, 2018, 1:22 pm UTC
 *
 * @property string nombre
 * @property string denominacionsocial
 * @property string nombrecorto
 * @property string RFC
 * @property string Entidad
 * @property string grupofinancierto
 * @property string paginainternet
 * @property string logo
 * @property string email
 */
class cat_bancos extends Model
{

    use SoftDeletes;
    use LogsActivity;
    use DatesTranslator;
    public $table = 'cat_bancos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'nombre',
        'denominacionsocial',
        'nombrecorto',
        'RFC',
        'Entidad',
        'grupofinancierto',
        'paginainternet',
        'logo',
        'email'
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
        'denominacionsocial' => 'string',
        'nombrecorto' => 'string',
        'RFC' => 'string',
        'Entidad' => 'string',
        'grupofinancierto' => 'string',
        'paginainternet' => 'string',
        'logo' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
