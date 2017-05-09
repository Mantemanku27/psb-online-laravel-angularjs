<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\PostInterface;

class PostController extends Controller
{

    /**
     * @var PostInterface
     */
    protected $post;

    /**
     * PostController constructor.
     * @param PostInterface $post
     */
    public function __construct(PostInterface $post)
    {
        $this->post = $post;
        $this->middleware('auth');
    }

    /**
     * @api {get} api/posts Request Post with Paginate
     * @apiName GetPostWithPaginate
     * @apiGroup Post
     *
     * @apiParam {Number} page Paginate post lists
     */
    public function index(Request $request)
    {
        return $this->post->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('term'));
    }

    /**
     * @api {get} api/posts/id Request Get Post
     * @apiName GetPost
     * @apiGroup Post
     *
     * @apiParam {Number} id id_post
     * @apiSuccess {Number} id id_post
     * @apiSuccess {Varchar} name name of post
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of post
     * @apiSuccess {Number} phone phone of post
     */
    public function show($id)
    {
        return $this->post->findById($id);
    }

    /**
     * @api {post} api/posts/ Request Post Post
     * @apiName PostPost
     * @apiGroup Post
     *
     *
     * @apiParam {Varchar} name name of post
     * @apiParam {Varchar} email email of post
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of post
     * @apiSuccess {Number} id id of post
     */
    public function store(PostCreateRequest $request)
    {
        return $this->post->create($request->all());
    }

    /**
     * @api {put} api/posts/id Request Update Post by ID
     * @apiName UpdatePostByID
     * @apiGroup Post
     *
     *
     * @apiParam {Varchar} name name of post
     * @apiParam {Varchar} email email of post
     * @apiParam {Varchar} address address of post
     * @apiParam {Float} phone phone of post
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(PostEditRequest $request, $id)
    {
        return $this->post->update($id, $request->all());
    }

    /**
     * @api {delete} api/posts/id Request Delete Post by ID
     * @apiName DeletePostByID
     * @apiGroup Post
     *
     * @apiParam {Number} id id of post
     *
     *
     * @apiError PostNotFound The <code>id</code> of the Post was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->post->delete($id);
    }

}