<?php

namespace App\Repositories;

use App\Models\catdocumentos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catdocumentosRepository
 * @package App\Repositories
 * @version October 28, 2018, 10:30 pm UTC
 *
 * @method catdocumentos findWithoutFail($id, $columns = ['*'])
 * @method catdocumentos find($id, $columns = ['*'])
 * @method catdocumentos first($columns = ['*'])
*/
class catdocumentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipodoc',
        'archivo',
        'nota'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return catdocumentos::class;
    }
}
