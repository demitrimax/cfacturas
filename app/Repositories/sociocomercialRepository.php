<?php

namespace App\Repositories;

use App\Models\sociocomercial;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class sociocomercialRepository
 * @package App\Repositories
 * @version January 19, 2019, 11:43 pm CST
 *
 * @method sociocomercial findWithoutFail($id, $columns = ['*'])
 * @method sociocomercial find($id, $columns = ['*'])
 * @method sociocomercial first($columns = ['*'])
*/
class sociocomercialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'RFC',
        'CURP',
        'avatar',
        'persfisica',
        'direccion',
        'correo',
        'telefono'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sociocomercial::class;
    }
}
