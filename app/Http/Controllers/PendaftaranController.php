<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pendaftaran\PendaftaranCreateRequest;
use App\Http\Requests\Pendaftaran\PendaftaranEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\PendaftaranInterface;

class PendaftaranController extends Controller
{

    /**
     * @var PendaftaranInterface
     */
    protected $pendaftaran;

    /**
     * PendaftaranController constructor.
     * @param PendaftaranInterface $pendaftaran
     */
    public function __construct(PendaftaranInterface $pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
        $this->middleware('auth');
    }

    /**
     * @api {get} api/pendaftarans Request Pendaftaran with Paginate
     * @apiName GetPendaftaranWithPaginate
     * @apiGroup Pendaftaran
     *
     * @apiParam {Number} page Paginate pendaftaran lists
     */
    public function index(Request $request)
    {
        return $this->pendaftaran->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }

    public function paginatebyid($id,Request $request)
    {
        return $this->pendaftaran->paginatebyid($id,10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }



    /**
     * @api {get} api/pendaftarans/id Request Get Pendaftaran
     * @apiName GetPendaftaran
     * @apiGroup Pendaftaran
     *
     * @apiParam {Number} id id_pendaftaran
     * @apiSuccess {Number} id id_pendaftaran
     * @apiSuccess {Varchar} name name of pendaftaran
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of pendaftaran
     * @apiSuccess {Number} phone phone of pendaftaran
     */
    public function show($id)
    {
        return $this->pendaftaran->findById($id);
    }

    /**
     * @api {pendaftaran} api/pendaftarans/ Request Pendaftaran Pendaftaran
     * @apiName PendaftaranPendaftaran
     * @apiGroup Pendaftaran
     *
     *
     * @apiParam {Varchar} name name of pendaftaran
     * @apiParam {Varchar} email email of pendaftaran
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of pendaftaran
     * @apiSuccess {Number} id id of pendaftaran
     */
    public function store(PendaftaranCreateRequest $request)
    {
        return $this->pendaftaran->create($request->all());
    }

    /**
     * @api {put} api/pendaftarans/id Request Update Pendaftaran by ID
     * @apiName UpdatePendaftaranByID
     * @apiGroup Pendaftaran
     *
     *
     * @apiParam {Varchar} name name of pendaftaran
     * @apiParam {Varchar} email email of pendaftaran
     * @apiParam {Varchar} address address of pendaftaran
     * @apiParam {Float} phone phone of pendaftaran
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(PendaftaranEditRequest $request, $id)
    {
        return $this->pendaftaran->update($id, $request->all());
    }

    /**
     * @api {delete} api/pendaftarans/id Request Delete Pendaftaran by ID
     * @apiName DeletePendaftaranByID
     * @apiGroup Pendaftaran
     *
     * @apiParam {Number} id id of pendaftaran
     *
     *
     * @apiError PendaftaranNotFound The <code>id</code> of the Pendaftaran was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->pendaftaran->delete($id);
    }

    public function batasInputPendaftaran($id)
    {
        return $this->pendaftaran->batasInputPendaftaran($id);
    }

}
