<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\User;
use App\Domain\Contracts\UserInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class UserRepository
 * @package App\Domain\Repositories
 */
class UserRepository extends AbstractRepository implements UserInterface, Crudable
{

    /**
     * @var User
     */
    protected $model;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
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

// Searching Data
    public function paginate($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // query to aql
    $akun = $this->model
            ->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('telepon', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
                })
        
            ->paginate($limit)
            ->toArray();
        return $akun;    
    }
// end searching data

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'nama'    => e($data['nama']),
            'telepon' => e($data['telepon']),
            'email' => e($data['email']),
            'password' => bcrypt(e($data['password'])),
            'level'   => e($data['level'])
        ]);

    }

// Register
    public function createsiswa(array $data)
    {
        try {
        // execute sql insert
        User::create([
            'nama'    => e($data['nama']),
            'telepon' => e($data['telepon']),
            'email' => e($data['email']),
            'password' => bcrypt(e($data['password'])),
            'level'   => 1
        ]);   
        session()->flash('auth_messagee', 'Pendaftaran Berhasil!, Silahkan untuk login.');
            return redirect()->route('login');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . UserRepository::class . ' method : create | ' . $e);
            session()->flash('auth_messagee', 'Cek Ulang Pengguna, Simpan Data Gagal!');
            return redirect()->route('login');
            // return $this->createError();
        }     
    }
// end register

    /**
     * @param $id
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        return parent::update($id, [
            'nama'    => e($data['nama']),
            'telepon' => e($data['telepon']),
            'email' => e($data['email']),
            'level'   => e($data['level'])
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