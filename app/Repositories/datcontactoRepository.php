<?php

namespace App\Repositories;

use App\Models\datcontacto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class datcontactoRepository
 * @package App\Repositories
 * @version October 27, 2018, 5:48 am UTC
 *
 * @method datcontacto findWithoutFail($id, $columns = ['*'])
 * @method datcontacto find($id, $columns = ['*'])
 * @method datcontacto first($columns = ['*'])
*/
class datcontactoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'contacto',
        'cliente_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return datcontacto::class;
    }
}
