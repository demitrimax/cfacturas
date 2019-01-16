<?php

namespace App\Repositories;

use App\Models\formapago;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class formapagoRepository
 * @package App\Repositories
 * @version January 15, 2019, 8:33 pm CST
 *
 * @method formapago findWithoutFail($id, $columns = ['*'])
 * @method formapago find($id, $columns = ['*'])
 * @method formapago first($columns = ['*'])
*/
class formapagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return formapago::class;
    }
}
