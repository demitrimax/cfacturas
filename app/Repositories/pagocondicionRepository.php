<?php

namespace App\Repositories;

use App\Models\pagocondicion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pagocondicionRepository
 * @package App\Repositories
 * @version December 20, 2018, 1:19 am CST
 *
 * @method pagocondicion findWithoutFail($id, $columns = ['*'])
 * @method pagocondicion find($id, $columns = ['*'])
 * @method pagocondicion first($columns = ['*'])
*/
class pagocondicionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return pagocondicion::class;
    }
}
