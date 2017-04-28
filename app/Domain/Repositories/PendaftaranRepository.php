<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Pendaftaran;
use App\Domain\Contracts\PendaftaranInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class PendaftaranRepository
 * @package App\Domain\Repositories
 */
class PendaftaranRepository extends AbstractRepository implements PendaftaranInterface, Crudable
{

    /**
     * @var Pendaftaran
     */
    protected $model;

    /**
     * PendaftaranRepository constructor.
     * @param Pendaftaran $pendaftaran
     */
    public function __construct(Pendaftaran $pendaftaran)
    {
        $this->model = $pendaftaran;
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
        return parent::paginate($limit, $page, $column, 'status', $search);
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'no_pilihan'    => e($data['no_pilihan']),
            'status'   => e($data['status']),
            'jurusans_id'   => e($data['jurusans_id']),
            'formulirs_id'   => e($data['formulirs_id'])
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
            'no_pilihan'    => e($data['no_pilihan']),
            'status'   => e($data['status']),
            'jurusans_id'   => e($data['jurusans_id']),
            'formulirs_id'   => e($data['formulirs_id'])
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