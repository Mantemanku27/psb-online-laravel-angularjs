<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Panitia;
use App\Domain\Contracts\PanitiaInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class PanitiaRepository
 * @package App\Domain\Repositories
 */
class PanitiaRepository extends AbstractRepository implements PanitiaInterface, Crudable
{

    /**
     * @var Panitia
     */
    protected $model;

    /**
     * PanitiaRepository constructor.
     * @param Panitia $panitia
     */
    public function __construct(Panitia $panitia)
    {
        $this->model = $panitia;
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
                    ->orWhere('nip', 'like', '%' . $search . '%');
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
            'nip'   => e($data['nip']),
            'jurusan'   => e($data['jurusan'])
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
            'nip'   => e($data['nip']),
            'jurusan'   => e($data['jurusan'])
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
    public function ceknamapanitia($id)
    {
        $pribadi1 = $this->model
            ->where('jurusan', $id)
            ->first();
        if ($pribadi1 != null) {
            return $pribadi1;
        } else {
            return null;
        }
    }


}
