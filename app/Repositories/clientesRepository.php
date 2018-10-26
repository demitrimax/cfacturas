<?php

namespace App\Repositories;

use App\Models\clientes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class clientesRepository
 * @package App\Repositories
 * @version October 26, 2018, 11:36 pm UTC
 *
 * @method clientes findWithoutFail($id, $columns = ['*'])
 * @method clientes find($id, $columns = ['*'])
 * @method clientes first($columns = ['*'])
*/
class clientesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellidopat',
        'apellidomat',
        'RFC',
        'CURP'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return clientes::class;
    }
}
