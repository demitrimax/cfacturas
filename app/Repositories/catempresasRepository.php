<?php

namespace App\Repositories;

use App\Models\catempresas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catempresasRepository
 * @package App\Repositories
 * @version November 4, 2018, 6:45 pm UTC
 *
 * @method catempresas findWithoutFail($id, $columns = ['*'])
 * @method catempresas find($id, $columns = ['*'])
 * @method catempresas first($columns = ['*'])
*/
class catempresasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'correo_factura',
        'correo_notifica',
        'telefono',
        'comision'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return catempresas::class;
    }
}
