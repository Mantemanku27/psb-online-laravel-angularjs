<?php

namespace App\Http\Controllers;

use App\Http\Requests\Panitia\PanitiaCreateRequest;
use App\Http\Requests\Panitia\PanitiaEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\PanitiaInterface;

class PanitiaController extends Controller
{

    /**
     * @var PanitiaInterface
     */
    protected $panitia;

    /**
     * PanitiaController constructor.
     * @param PanitiaInterface $panitia
     */
    public function __construct(PanitiaInterface $panitia)
    {
        $this->panitia = $panitia;
        $this->middleware('auth');
    }

    /**
     * @api {get} api/panitias Request Panitia with Paginate
     * @apiName GetPanitiaWithPaginate
     * @apiGroup Panitia
     *
     * @apiParam {Number} page Paginate panitia lists
     */
    public function index(Request $request)
    {
        return $this->panitia->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }

    /**
     * @api {get} api/panitias/id Request Get Panitia
     * @apiName GetPanitia
     * @apiGroup Panitia
     *
     * @apiParam {Number} id id_panitia
     * @apiSuccess {Number} id id_panitia
     * @apiSuccess {Varchar} name name of panitia
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of panitia
     * @apiSuccess {Number} phone phone of panitia
     */
    public function show($id)
    {
        return $this->panitia->findById($id);
    }

    /**
     * @api {panitia} api/panitias/ Request Panitia Panitia
     * @apiName PanitiaPanitia
     * @apiGroup Panitia
     *
     *
     * @apiParam {Varchar} name name of panitia
     * @apiParam {Varchar} email email of panitia
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of panitia
     * @apiSuccess {Number} id id of panitia
     */
    public function store(PanitiaCreateRequest $request)
    {
        return $this->panitia->create($request->all());
    }

    /**
     * @api {put} api/panitias/id Request Update Panitia by ID
     * @apiName UpdatePanitiaByID
     * @apiGroup Panitia
     *
     *
     * @apiParam {Varchar} name name of panitia
     * @apiParam {Varchar} email email of panitia
     * @apiParam {Varchar} address address of panitia
     * @apiParam {Float} phone phone of panitia
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(PanitiaEditRequest $request, $id)
    {
        return $this->panitia->update($id, $request->all());
    }

    /**
     * @api {delete} api/panitias/id Request Delete Panitia by ID
     * @apiName DeletePanitiaByID
     * @apiGroup Panitia
     *
     * @apiParam {Number} id id of panitia
     *
     *
     * @apiError PanitiaNotFound The <code>id</code> of the Panitia was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->panitia->delete($id);
    }

}
