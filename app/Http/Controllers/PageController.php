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
        $this->middleware('guest', ['only' => ['landingpage','getLogin','signup']]);

    }

    public function landingpage()
    {
        return view('landingpage');

    }

    /**
     * @return string
     */
    public function token()
    {
        return csrf_token();
    }
    public function signup()
    {
        return view('signup');

    }
    public function getLogin()
    {
        return view('login');
    }
    public function pendaftaran()
    {
        return view('welcome');

    }

}
