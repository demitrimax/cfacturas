<?php

namespace App\Repositories;

use App\Models\accomercial;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class accomercialRepository
 * @package App\Repositories
 * @version November 25, 2018, 5:41 pm CST
 *
 * @method accomercial findWithoutFail($id, $columns = ['*'])
 * @method accomercial find($id, $columns = ['*'])
 * @method accomercial first($columns = ['*'])
*/
class accomercialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fechasolicitud',
        'sociocomer_id',
        'cliente_id',
        'direccion_id',
        'cuenta_id',
        'descripcion',
        'informacion',
        'ac_principalporc',
        'ac_secundarioporc',
        'autorizado',
        'elab_user_id',
        'aut_user_id',
        'aut_user2_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return accomercial::class;
    }
}
