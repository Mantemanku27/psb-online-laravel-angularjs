<?php

namespace App\Http\Controllers;

/**
 * Class PageController
 *
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * Create new instance PageController
     */

    /**
     * Show page login
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['getLogin']]);

    }

    public function getLogin()
    {
        return view('login');
    }
    /**
     * @return string
     */
    public function token()
    {
        return csrf_token();
    }
    public function backoffice()
    {
        return view('welcome');

    }



}