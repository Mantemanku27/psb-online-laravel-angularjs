<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Jurusan;
use App\Domain\Contracts\JurusanInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class JurusanRepository
 * @package App\Domain\Repositories
 */
class JurusanRepository extends AbstractRepository implements JurusanInterface, Crudable
{

    /**
     * @var Jurusan
     */
    protected $model;

    /**
     * JurusanRepository constructor.
     * @param Jurusan $jurusan
     */
    public function __construct(Jurusan $jurusan)
    {
        $this->model = $jurusan;
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
    $akun = $this->model
            ->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kuota', 'like', '%' . $search . '%');
                })
        
            ->paginate($limit)
            ->toArray();
        return $akun;    
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'nama'    => e($data['nama']),
            'kuota'   => e($data['kuota'])
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
            'nama'    => e($data['nama']),
            'kuota'   => e($data['kuota'])
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