<?php

namespace App\Repositories;

use App\Models\facestatus;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class facestatusRepository
 * @package App\Repositories
 * @version December 21, 2018, 4:15 pm CST
 *
 * @method facestatus findWithoutFail($id, $columns = ['*'])
 * @method facestatus find($id, $columns = ['*'])
 * @method facestatus first($columns = ['*'])
*/
class facestatusRepository extends BaseRepository
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
        return facestatus::class;
    }
}
