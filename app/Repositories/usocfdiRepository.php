<?php

namespace App\Repositories;

use App\Models\usocfdi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class usocfdiRepository
 * @package App\Repositories
 * @version January 15, 2019, 9:24 pm CST
 *
 * @method usocfdi findWithoutFail($id, $columns = ['*'])
 * @method usocfdi find($id, $columns = ['*'])
 * @method usocfdi first($columns = ['*'])
*/
class usocfdiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return usocfdi::class;
    }
}
