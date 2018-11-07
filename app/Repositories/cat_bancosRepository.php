<?php

namespace App\Repositories;

use App\Models\cat_bancos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class cat_bancosRepository
 * @package App\Repositories
 * @version November 7, 2018, 1:22 pm UTC
 *
 * @method cat_bancos findWithoutFail($id, $columns = ['*'])
 * @method cat_bancos find($id, $columns = ['*'])
 * @method cat_bancos first($columns = ['*'])
*/
class cat_bancosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'denominacionsocial',
        'nombrecorto',
        'RFC',
        'Entidad',
        'grupofinancierto',
        'paginainternet',
        'logo',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cat_bancos::class;
    }
}
