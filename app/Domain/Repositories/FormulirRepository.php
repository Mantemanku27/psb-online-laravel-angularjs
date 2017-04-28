<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Formulir;
use App\Domain\Contracts\FormulirInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class FormulirRepository
 * @package App\Domain\Repositories
 */
class FormulirRepository extends AbstractRepository implements FormulirInterface, Crudable
{

    /**
     * @var Formulir
     */
    protected $model;

    /**
     * FormulirRepository constructor.
     * @param Formulir $formulir
     */
    public function __construct(Formulir $formulir)
    {
        $this->model = $formulir;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param int $limit
     * @param int $page
     * @param array $column
     * @param string $field
     * @param string $search
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginate($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // query to aql
        return parent::paginate($limit, $page, $column, 'asal_sekolah', $search);
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'asal_sekolah'    => e($data['asal_sekolah']),
            'n_bi'   => e($data['n_bi']),
            'n_mtk' => e($data['n_mtk']),
            'n_ipa' => e($data['n_ipa']),
            'n_ing'   => e($data['n_ing']),
            'biodatas_id'   => e($data['biodatas_id'])
        ]);

    }

    /**
     * @param $id
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        return parent::update($id, [
            'asal_sekolah'    => e($data['asal_sekolah']),
            'n_bi'   => e($data['n_bi']),
            'n_mtk' => e($data['n_mtk']),
            'n_ipa' => e($data['n_ipa']),
            'n_ing'   => e($data['n_ing']),
            'biodatas_id'   => e($data['biodatas_id'])
        ]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }


    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findById($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }

}