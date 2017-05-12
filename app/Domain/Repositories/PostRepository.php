<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Post;
use App\Domain\Contracts\PostInterface;
use App\Domain\Contracts\Crudable;


/**
 * Class PostRepository
 * @package App\Domain\Repositories
 */
class PostRepository extends AbstractRepository implements PostInterface, Crudable
{

    /**
     * @var Post
     */
    protected $model;

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
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
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('gambar', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
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
            'judul'    => e($data['judul']),
            'gambar' => e($data['gambar']),
            'deskripsi'   => e($data['deskripsi'])
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
            'judul'    => e($data['judul']),
            'gambar' => e($data['gambar']),
            'deskripsi'   => e($data['deskripsi'])
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
