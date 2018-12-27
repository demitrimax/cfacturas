<?php

namespace App\Models;

use Eloquent as Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class users
 * @package App\Models
 * @version November 10, 2018, 12:37 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 * @property string avatar
 * @property string rol
 * @property integer roles
 * @property string nombre
 * @property string apellidos
 */
class users extends Model
{
    use SoftDeletes;
    use HasRoles;
    use LogsActivity;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'avatar',
        'rol',
        'roles',
        'nombre',
        'apellidos',
        'cargo',
    ];
    protected static $logAttributes = ['*'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'             => 'integer',
        'name'           => 'string',
        'email'          => 'string',
        'password'       => 'string',
        'remember_token' => 'string',
        'avatar'         => 'string',
        'rol'            => 'string',
        'roles'          => 'integer',
        'nombre'         => 'string',
        'apellidos'      => 'string',
        'cargo'          => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public function solicitudes()
    {
      return $this->hasMany('App\Models\solicitudes','atendidopor');
    }

}
