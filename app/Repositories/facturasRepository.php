<?php

namespace App\Repositories;

use App\Models\facturas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class facturasRepository
 * @package App\Repositories
 * @version December 27, 2018, 9:09 pm CST
 *
 * @method facturas findWithoutFail($id, $columns = ['*'])
 * @method facturas find($id, $columns = ['*'])
 * @method facturas first($columns = ['*'])
*/
class facturasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliente_id',
        'direccion_id',
        'empresa_id',
        'concepto',
        'metodopago_id',
        'condicionpago_id',
        'complementopago_id',
        'fecha',
        'estatus_id',
        'comprobante'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return facturas::class;
    }
}
