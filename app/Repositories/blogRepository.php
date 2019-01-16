<?php

namespace App\Repositories;

use App\Models\blog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class blogRepository
 * @package App\Repositories
 * @version January 15, 2019, 10:57 am CST
 *
 * @method blog findWithoutFail($id, $columns = ['*'])
 * @method blog find($id, $columns = ['*'])
 * @method blog first($columns = ['*'])
*/
class blogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'copete',
        'cuerpo',
        'usuario_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return blog::class;
    }
}
