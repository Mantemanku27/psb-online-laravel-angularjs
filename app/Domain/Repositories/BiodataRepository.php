<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Biodata;
use App\Domain\Contracts\BiodataInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class BiodataRepository
 * @package App\Domain\Repositories
 */
class BiodataRepository extends AbstractRepository implements BiodataInterface, Crudable
{

    /**
     * @var Biodata
     */
    protected $model;

    /**
     * BiodataRepository constructor.
     * @param Biodata $biodata
     */
    public function __construct(Biodata $biodata)
    {
        $this->model = $biodata;
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
            ->join('users', 'biodatas.users_id', '=', 'users.id')
            ->where(function ($query) use ($search) {
                $query->where('biodatas.nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('biodatas.email', 'like', '%' . $search . '%')
                    ->orWhere('users.nama', 'like', '%' . $search . '%');
                    
                })
            ->select('biodatas.*')
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
            'nama_lengkap'    => e($data['nama_lengkap']),
            'email'   => e($data['email']),
            'jk' => e($data['jk']),
            'agama' => e($data['agama']),
            'tempat_lahir' => e($data['tempat_lahir']),
            'tanggal_lahir' => e($data['tanggal_lahir']),
            'alamat' => e($data['alamat']),
            'desa' => e($data['desa']),
            'kecamatan' => e($data['kecamatan']),
            'kabupaten' => e($data['kabupaten']),
            'provinsi' => e($data['provinsi']),
            'jurusan'   => e($data['jurusan']),
            'users_id'   => e($data['users_id'])
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
            'nama_lengkap'    => e($data['nama_lengkap']),
            'email'   => e($data['email']),
            'jk' => e($data['jk']),
            'agama' => e($data['agama']),
            'tempat_lahir' => e($data['tempat_lahir']),
            'tanggal_lahir' => e($data['tanggal_lahir']),
            'alamat' => e($data['alamat']),
            'desa' => e($data['desa']),
            'kecamatan' => e($data['kecamatan']),
            'kabupaten' => e($data['kabupaten']),
            'provinsi' => e($data['provinsi']),
            'jurusan'   => e($data['jurusan']),
            'users_id'   => e($data['users_id'])
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