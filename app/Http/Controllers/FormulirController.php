<?php

namespace App\Http\Controllers;

use App\Http\Requests\Formulir\FormulirCreateRequest;
use App\Http\Requests\Formulir\FormulirEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\FormulirInterface;

class FormulirController extends Controller
{

    /**
     * @var FormulirInterface
     */
    protected $formulir;

    /**
     * FormulirController constructor.
     * @param FormulirInterface $formulir
     */
    public function __construct(FormulirInterface $formulir)
    {
        $this->formulir = $formulir;
        $this->middleware('auth');
    }

    /**
     * @api {get} api/formulirs Request Formulir with Paginate
     * @apiName GetFormulirWithPaginate
     * @apiGroup Formulir
     *
     * @apiParam {Number} page Paginate formulir lists
     */
    public function index(Request $request)
    {
        return $this->formulir->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }

    public function paginatebyid($id,Request $request)
    {
        return $this->formulir->paginatebyid($id,10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }



    /**
     * @api {get} api/formulirs/id Request Get Formulir
     * @apiName GetFormulir
     * @apiGroup Formulir
     *
     * @apiParam {Number} id id_formulir
     * @apiSuccess {Number} id id_formulir
     * @apiSuccess {Varchar} name name of formulir
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of formulir
     * @apiSuccess {Number} phone phone of formulir
     */
    public function show($id)
    {
        return $this->formulir->findById($id);
    }

    /**
     * @api {formulir} api/formulirs/ Request Formulir Formulir
     * @apiName FormulirFormulir
     * @apiGroup Formulir
     *
     *
     * @apiParam {Varchar} name name of formulir
     * @apiParam {Varchar} email email of formulir
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of formulir
     * @apiSuccess {Number} id id of formulir
     */
    public function store(FormulirCreateRequest $request)
    {
        return $this->formulir->create($request->all());
    }

    /**
     * @api {put} api/formulirs/id Request Update Formulir by ID
     * @apiName UpdateFormulirByID
     * @apiGroup Formulir
     *
     *
     * @apiParam {Varchar} name name of formulir
     * @apiParam {Varchar} email email of formulir
     * @apiParam {Varchar} address address of formulir
     * @apiParam {Float} phone phone of formulir
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(FormulirEditRequest $request, $id)
    {
        return $this->formulir->update($id, $request->all());
    }

    /**
     * @api {delete} api/formulirs/id Request Delete Formulir by ID
     * @apiName DeleteFormulirByID
     * @apiGroup Formulir
     *
     * @apiParam {Number} id id of formulir
     *
     *
     * @apiError FormulirNotFound The <code>id</code> of the Formulir was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->formulir->delete($id);
    }

    public function batasInputformulir($id)
    {
        return $this->formulir->batasInputformulir($id);
    }
    public function cekidformulir()
    {
        return $this->formulir->cekidformulir();
    }

}
