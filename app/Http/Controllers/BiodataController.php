<?php

namespace App\Http\Controllers;

use App\Http\Requests\Biodata\BiodataCreateRequest;
use App\Http\Requests\Biodata\BiodataEditRequest;
use App\Http\Requests\Biodata\FotoFormRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\BiodataInterface;

class BiodataController extends Controller
{

    /**
     * @var BiodataInterface
     */
    protected $biodata;

    /**
     * BiodataController constructor.
     * @param BiodataInterface $biodata
     */
    public function __construct(BiodataInterface $biodata)
    {
        $this->biodata = $biodata;
        // login pengaman
        $this->middleware('auth');

    }

    /**
     * @api {get} api/biodatas Request Biodata with Paginate
     * @apiName GetBiodataWithPaginate
     * @apiGroup Biodata
     *
     * @apiParam {Number} page Paginate biodata lists
     */
    public function index(Request $request)
    {
        return $this->biodata->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }


    /**
     * @api {get} api/biodatas/id Request Get Biodata
     * @apiName GetBiodata
     * @apiGroup Biodata
     *
     * @apiParam {Number} id id_biodata
     * @apiSuccess {Number} id id_biodata
     * @apiSuccess {Varchar} name name of biodata
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of biodata
     * @apiSuccess {Number} phone phone of biodata
     */
    public function show($id)
    {
        return $this->biodata->findById($id);
    }

    /**
     * @api {biodata} api/biodatas/ Request Biodata Biodata
     * @apiName BiodataBiodata
     * @apiGroup Biodata
     *
     *
     * @apiParam {Varchar} name name of biodata
     * @apiParam {Varchar} email email of biodata
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of biodata
     * @apiSuccess {Number} id id of biodata
     */
    public function store(Request $request)
    {
        $arr1 = str_replace('-', '', $request->foto);

        $fileName1 = date('dmYhi') . $arr1;

        return $this->biodata->createdata($fileName1,$request->all());
    }

    /**
     * @api {put} api/biodatas/id Request Update Biodata by ID
     * @apiName UpdateBiodataByID
     * @apiGroup Biodata
     *
     *
     * @apiParam {Varchar} name name of biodata
     * @apiParam {Varchar} email email of biodata
     * @apiParam {Varchar} address address of biodata
     * @apiParam {Float} phone phone of biodata
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(Request $request, $id)
    {
        return $this->biodata->update($id, $request->all());
    }

    /**
     * @api {delete} api/biodatas/id Request Delete Biodata by ID
     * @apiName DeleteBiodataByID
     * @apiGroup Biodata
     *
     * @apiParam {Number} id id of biodata
     *
     *
     * @apiError BiodataNotFound The <code>id</code> of the Biodata was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->biodata->delete($id);
    }

    public function batasInputBiodata()
    {
        return $this->biodata->batasInputBiodata();
    }

    public function cekidbiodata()
    {
        return $this->biodata->cekidbiodata();
    }

    public function Upload1(FotoFormRequest $request)
    {
        $file1 = $request->file('foto');

        $original_name1 = $file1->getClientOriginalName();
        $arr1 = str_replace('-', '', $original_name1);

        $fileName1 = date('dmYhi'). $arr1;
        $destinationPath = public_path() . '/assets/foto';
        $file1->move($destinationPath, $fileName1);
        return response()->json(['created' => true], 200);
    }

}
