<?php

namespace App\Repositories;

use App\Models\pagometodo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class pagometodoRepository
 * @package App\Repositories
 * @version December 20, 2018, 7:26 am CST
 *
 * @method pagometodo findWithoutFail($id, $columns = ['*'])
 * @method pagometodo find($id, $columns = ['*'])
 * @method pagometodo first($columns = ['*'])
*/
class pagometodoRepository extends BaseRepository
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
        return pagometodo::class;
    }
}
