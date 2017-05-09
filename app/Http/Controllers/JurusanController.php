<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jurusan\JurusanCreateRequest;
use App\Http\Requests\Jurusan\JurusanEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\JurusanInterface;

class JurusanController extends Controller
{

    /**
     * @var JurusanInterface
     */
    protected $jurusan;

    /**
     * JurusanController constructor.
     * @param JurusanInterface $jurusan
     */
    public function __construct(JurusanInterface $jurusan)
    {
        $this->jurusan = $jurusan;
        $this->middleware('auth');
    }

    /**
     * @api {get} api/jurusans Request Jurusan with Paginate
     * @apiName GetJurusanWithPaginate
     * @apiGroup Jurusan
     *
     * @apiParam {Number} page Paginate jurusan lists
     */
    public function index(Request $request)
    {
        return $this->jurusan->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }

    /**
     * @api {get} api/jurusans/id Request Get Jurusan
     * @apiName GetJurusan
     * @apiGroup Jurusan
     *
     * @apiParam {Number} id id_jurusan
     * @apiSuccess {Number} id id_jurusan
     * @apiSuccess {Varchar} name name of jurusan
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of jurusan
     * @apiSuccess {Number} phone phone of jurusan
     */
    public function show($id)
    {
        return $this->jurusan->findById($id);
    }

    /**
     * @api {jurusan} api/jurusans/ Request Jurusan Jurusan
     * @apiName JurusanJurusan
     * @apiGroup Jurusan
     *
     *
     * @apiParam {Varchar} name name of jurusan
     * @apiParam {Varchar} email email of jurusan
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of jurusan
     * @apiSuccess {Number} id id of jurusan
     */
    public function store(JurusanCreateRequest $request)
    {
        return $this->jurusan->create($request->all());
    }

    /**
     * @api {put} api/jurusans/id Request Update Jurusan by ID
     * @apiName UpdateJurusanByID
     * @apiGroup Jurusan
     *
     *
     * @apiParam {Varchar} name name of jurusan
     * @apiParam {Varchar} email email of jurusan
     * @apiParam {Varchar} address address of jurusan
     * @apiParam {Float} phone phone of jurusan
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(JurusanEditRequest $request, $id)
    {
        return $this->jurusan->update($id, $request->all());
    }

    /**
     * @api {delete} api/jurusans/id Request Delete Jurusan by ID
     * @apiName DeleteJurusanByID
     * @apiGroup Jurusan
     *
     * @apiParam {Number} id id of jurusan
     *
     *
     * @apiError JurusanNotFound The <code>id</code> of the Jurusan was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->jurusan->delete($id);
    }


    public function getList()
    {
        return $this->jurusan->getList();
    }

    public function getListjursanbypendaftaran($id)
    {
        return $this->jurusan->getListjursanbypendaftaran($id);
    }

    
}