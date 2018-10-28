<?php

namespace App\Repositories;

use App\Models\direcciones;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class direccionesRepository
 * @package App\Repositories
 * @version October 28, 2018, 1:38 am UTC
 *
 * @method direcciones findWithoutFail($id, $columns = ['*'])
 * @method direcciones find($id, $columns = ['*'])
 * @method direcciones first($columns = ['*'])
*/
class direccionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliente_id',
        'calle',
        'numeroExt',
        'numeroInt',
        'estado_id',
        'municipio_id',
        'colonia',
        'codpostal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return direcciones::class;
    }
}
