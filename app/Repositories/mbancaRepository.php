<?php

namespace App\Repositories;

use App\Models\mbanca;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class mbancaRepository
 * @package App\Repositories
 * @version November 15, 2018, 7:06 am CST
 *
 * @method mbanca findWithoutFail($id, $columns = ['*'])
 * @method mbanca find($id, $columns = ['*'])
 * @method mbanca first($columns = ['*'])
*/
class mbancaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cuenta_id',
        'toperacion',
        'tmovimiento',
        'concepto',
        'monto',
        'fecha',
        'saldo',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return mbanca::class;
    }
}
