<?php

namespace App\Repositories;

use App\Models\emp_datfiscales;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class emp_datfiscalesRepository
 * @package App\Repositories
 * @version November 6, 2018, 3:48 am UTC
 *
 * @method emp_datfiscales findWithoutFail($id, $columns = ['*'])
 * @method emp_datfiscales find($id, $columns = ['*'])
 * @method emp_datfiscales first($columns = ['*'])
*/
class emp_datfiscalesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'empresa_id',
        'razonsocial',
        'RFC',
        'calle',
        'numeroExt',
        'numeroInt',
        'estado_id',
        'municipio_id',
        'colonia',
        'codpostal',
        'referencias'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return emp_datfiscales::class;
    }
}
