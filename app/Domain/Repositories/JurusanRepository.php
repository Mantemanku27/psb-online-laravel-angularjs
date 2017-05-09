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

            'nama' => e($data['nama']),
            'kuota' => e($data['kuota'])

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

            'nama' => e($data['nama']),
            'kuota' => e($data['kuota'])

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


    public function getList()

    {
        // query to aql
        $akun = $this->model->get()->toArray();
        // if data null
        if (null == $akun) {
            // set response header not found
            return $this->errorNotFound('Data belum tersedia');
        }

        return $akun;

    }

    public function getListjursanbypendaftaran($id)
    {

        // query to aql
        $cari_rincian = \DB::table('pendaftarans')
            ->join('jurusans', 'pendaftarans.jurusans_id', '=', 'jurusans.id')
            ->where('pendaftarans.formulirs_id', $id)->where('jurusans.kuota', '>=', 1)->whereNull('pendaftarans.deleted_at')->select('pendaftarans.jurusans_id')->get();
        $result = [];
        foreach ($cari_rincian as $key => $value) {
            $result[] = $value->jurusans_id;
        }

        // --> Flatten  array
        $array_id = [];
        $array_length = count($result);
        for ($i = 0; $i <= $array_length - 1; $i++) {
            array_push($array_id, $result[$i]);
        }

        $provinsi = $this->model
            ->whereNotIn('jurusans.id', function ($q) use ($array_id) {
                $q->select('pendaftarans.jurusans_id')
                    ->from('pendaftarans')
                    ->whereIn('pendaftarans.jurusans_id', $array_id)
                    ->groupBy('pendaftarans.jurusans_id');
            })
            ->get()
            ->toArray();
        return $provinsi;
    }


}