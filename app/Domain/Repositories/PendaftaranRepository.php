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

     
        $akun = $this->model
            ->join('jurusans', 'pendaftarans.jurusans_id', '=', 'jurusans.id')
            ->join('formulirs', 'pendaftarans.formulirs_id', '=', 'formulirs.id')
            ->where(function ($query) use ($search) {
                $query->where('pendaftarans.no_pilihan', 'like', '%' . $search . '%')
                    ->orWhere('pendaftarans.status', 'like', '%' . $search . '%')
                    ->orWhere('jurusans.nama', 'like', '%' . $search . '%')
                    ->orWhere('formulirs.asal_sekolah', 'like', '%' . $search . '%');

            })
            ->select('pendaftarans.*')
            ->paginate($limit)
            ->toArray();
        return $akun;
    }

    public function paginatebyid($id, $limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // query to aql
        $akun = $this->model
            ->join('jurusans', 'pendaftarans.jurusans_id', '=', 'jurusans.id')
            ->join('formulirs', 'pendaftarans.formulirs_id', '=', 'formulirs.id')
            ->where('formulirs.id', $id)
            ->where(function ($query) use ($search) {
                $query->where('pendaftarans.no_pilihan', 'like', '%' . $search . '%')
                    ->orWhere('pendaftarans.status', 'like', '%' . $search . '%')
                    ->orWhere('jurusans.nama', 'like', '%' . $search . '%')
                    ->orWhere('formulirs.asal_sekolah', 'like', '%' . $search . '%');

            })
            ->select('pendaftarans.*')
            ->paginate($limit)
            ->toArray();
        return $akun;
    }

    public function batasInputPendaftaran($id)
    {
        $pribadi1 = $this->model
            ->where('formulirs_id', $id)
            ->where('user_id', session('user_id'))
            ->count();
        if ($pribadi1 <= 1) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {

        $pribadi = $this->model
            ->where('formulirs_id', e($data['formulirs_id']))
            ->where('user_id', session('user_id'))
            ->first();
//        dump($pribadi);
        if ($pribadi == null) {
            $no_pilihan = 1;
        } else if ($pribadi->no_pilihan == 1) {
            $no_pilihan = 2;
        } else if ($pribadi->no_pilihan == 2) {
            $no_pilihan = 1;
        }

        // execute sql insert
        return parent::create([
            'no_pilihan' => $no_pilihan,
            'status' => 0,
            'jurusans_id' => e($data['jurusans_id']),
            'formulirs_id' => e($data['formulirs_id']),
            'user_id' => session('user_id')

            // execute sql insert

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

            'no_pilihan' => e($data['no_pilihan']),
//            'status' => e($data['status']),
            'jurusans_id' => e($data['jurusans_id']),
//            'formulirs_id' => e($data['formulirs_id'])


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
