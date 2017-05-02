<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\UserInterface;

class UserController extends Controller
{

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * UserController constructor.
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @api {get} api/users Request User with Paginate
     * @apiName GetUserWithPaginate
     * @apiGroup User
     *
     * @apiParam {Number} page Paginate user lists
     */
    public function index(Request $request)
    {
        return $this->user->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }

    /**
     * @api {get} api/users/id Request Get User
     * @apiName GetUser
     * @apiGroup User
     *
     * @apiParam {Number} id id_user
     * @apiSuccess {Number} id id_user
     * @apiSuccess {Varchar} name name of user
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of user
     * @apiSuccess {Number} phone phone of user
     */
    public function show($id)
    {
        return $this->user->findById($id);
    }

    /**
     * @api {user} api/users/ Request User User
     * @apiName UserUser
     * @apiGroup User
     *
     *
     * @apiParam {Varchar} name name of user
     * @apiParam {Varchar} email email of user
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of user
     * @apiSuccess {Number} id id of user
     */
    public function store(UserCreateRequest $request)
    {
        return $this->user->create($request->all());
    }

    /**
     * @api {put} api/users/id Request Update User by ID
     * @apiName UpdateUserByID
     * @apiGroup User
     *
     *
     * @apiParam {Varchar} name name of user
     * @apiParam {Varchar} email email of user
     * @apiParam {Varchar} address address of user
     * @apiParam {Float} phone phone of user
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(UserEditRequest $request, $id)
    {
        return $this->user->update($id, $request->all());
    }

    /**
     * @api {delete} api/users/id Request Delete User by ID
     * @apiName DeleteUserByID
     * @apiGroup User
     *
     * @apiParam {Number} id id of user
     *
     *
     * @apiError UserNotFound The <code>id</code> of the User was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->user->delete($id);
    }

}