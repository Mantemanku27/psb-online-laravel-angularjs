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

        if (session('level') == 0) {
            $akun = $this->model
                ->join('biodatas', 'formulirs.biodatas_id', '=', 'biodatas.id')
                ->where(function ($query) use ($search) {
                    $query->where('formulirs.asal_sekolah', 'like', '%' . $search . '%')
                        ->orWhere('biodatas.nama_lengkap', 'like', '%' . $search . '%');

                })
                ->select('formulirs.*')
                ->paginate($limit)
                ->toArray();
            return $akun;
        }
        if (session('level') == 1) {
            $akun = $this->model
                ->join('biodatas', 'formulirs.biodatas_id', '=', 'biodatas.id')
                ->join('users', 'biodatas.users_id', '=', 'users.id')
                ->where('users.id', session('user_id'))
                ->where(function ($query) use ($search) {
                    $query->where('formulirs.asal_sekolah', 'like', '%' . $search . '%')
                        ->orWhere('biodatas.nama_lengkap', 'like', '%' . $search . '%');

                })
                ->select('formulirs.*')
                ->paginate($limit)
                ->toArray();
            return $akun;
        }

    }

    public function paginatebyid($id, $limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // query to aql
        if (session('level') == 0) {
            $akun = $this->model
                ->join('biodatas', 'formulirs.biodatas_id', '=', 'biodatas.id')
                ->where('biodatas.id', $id)
                ->where(function ($query) use ($search) {
                    $query->where('formulirs.asal_sekolah', 'like', '%' . $search . '%')
                        ->orWhere('biodatas.nama_lengkap', 'like', '%' . $search . '%');

                })
                ->select('formulirs.*')
                ->paginate($limit)
                ->toArray();
            return $akun;
        }
        if (session('level') == 1) {
            $akun = $this->model
                ->join('biodatas', 'formulirs.biodatas_id', '=', 'biodatas.id')
                ->join('users', 'biodatas.users_id', '=', 'users.id')
                ->where('users.id', session('user_id'))
                ->where('biodatas.id', $id)
                ->where(function ($query) use ($search) {
                    $query->where('formulirs.asal_sekolah', 'like', '%' . $search . '%')
                        ->orWhere('biodatas.nama_lengkap', 'like', '%' . $search . '%');

                })
                ->select('formulirs.*')
                ->paginate($limit)
                ->toArray();
            return $akun;

        }

    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createdata($filedata,array $data)
    {
        // execute sql insert
        return parent::create([

            'asal_sekolah' => e($data['asal_sekolah']),
            'n_bi' => e($data['n_bi']),
            'n_mtk' => e($data['n_mtk']),
            'n_ipa' => e($data['n_ipa']),
            'n_ing' => e($data['n_ing']),
            'foto_ijazah' => $filedata,
            'biodatas_id' => e($data['biodatas_id']),
            'user_id' => session('user_id')
        ]);

    }

    /**
     * @param $id
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        $arr2 = str_replace('-', '', e($data['foto_ijazah']));

        $fileName1 = date('dmYhi') . $arr2;

        $cari = Formulir::find($id);
        if ($cari->foto_ijazah== e($data['foto_ijazah'])) {
            $filename2 = $cari->foto_ijazah;

        } else {
            $filename2 = $fileName1;
            \File::delete(public_path() . '/assets/ijazah/' . $cari->foto_ijazah);

        }

        return parent::update($id, [

            'asal_sekolah' => e($data['asal_sekolah']),
            'n_bi' => e($data['n_bi']),
            'n_mtk' => e($data['n_mtk']),
            'n_ipa' => e($data['n_ipa']),
            'n_ing' => e($data['n_ing']),
            'foto_ijazah' => $filename2,
            'biodatas_id' => e($data['biodatas_id']),
            
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


    public function batasInputformulir($id)
    {
        $pribadi1 = $this->model
            ->where('biodatas_id', $id)
            ->where('user_id', session('user_id'))
            ->count();
        if ($pribadi1 == 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function cekidformulir()
    {

        $baru = $this->model
            ->orderBy('created_at', 'DESC')
            ->select('id')
            ->limit(1)
            ->get();
        $result = [];
        foreach ($baru as $key => $value) {
            $result[] = $value->id;
        }

        // --> Flatten  array
        $array_id = [];
        $array_length = count($result);
        for ($i = 0; $i <= $array_length - 1; $i++) {
            array_push($array_id, $result[$i]);
        }
        $hasil = $array_id[0];
        return $hasil;
    }

}
