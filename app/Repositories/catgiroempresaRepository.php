<?php

namespace App\Repositories;

use App\Models\catgiroempresa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catgiroempresaRepository
 * @package App\Repositories
 * @version January 21, 2019, 12:29 am CST
 *
 * @method catgiroempresa findWithoutFail($id, $columns = ['*'])
 * @method catgiroempresa find($id, $columns = ['*'])
 * @method catgiroempresa first($columns = ['*'])
*/
class catgiroempresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'codigo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return catgiroempresa::class;
    }
}
