<?php

namespace App\Repositories;

use App\Models\catcuentas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catcuentasRepository
 * @package App\Repositories
 * @version November 7, 2018, 4:51 pm UTC
 *
 * @method catcuentas findWithoutFail($id, $columns = ['*'])
 * @method catcuentas find($id, $columns = ['*'])
 * @method catcuentas first($columns = ['*'])
*/
class catcuentasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'banco_id',
        'numcuenta',
        'clabeinterbancaria',
        'sucursal',
        'cliente_id',
        'empresa_id',
        'swift'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return catcuentas::class;
    }
}
