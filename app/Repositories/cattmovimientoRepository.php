<?php

namespace App\Repositories;

use App\Models\cattmovimiento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class cattmovimientoRepository
 * @package App\Repositories
 * @version November 15, 2018, 6:48 am CST
 *
 * @method cattmovimiento findWithoutFail($id, $columns = ['*'])
 * @method cattmovimiento find($id, $columns = ['*'])
 * @method cattmovimiento first($columns = ['*'])
*/
class cattmovimientoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'descrp_corto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cattmovimiento::class;
    }
}
