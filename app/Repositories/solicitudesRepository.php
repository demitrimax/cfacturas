<?php

namespace App\Repositories;

use App\Models\solicitudes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class solicitudesRepository
 * @package App\Repositories
 * @version December 8, 2018, 10:07 pm CST
 *
 * @method solicitudes findWithoutFail($id, $columns = ['*'])
 * @method solicitudes find($id, $columns = ['*'])
 * @method solicitudes first($columns = ['*'])
*/
class solicitudesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'correo',
        'telefono',
        'rfc',
        'condicion',
        'metodo',
        'forma',
        'concepto',
        'comentario',
        'adjunto',
        'atendido',
        'fecha',
        'atendidopor',
        'facturaid'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return solicitudes::class;
    }
}
