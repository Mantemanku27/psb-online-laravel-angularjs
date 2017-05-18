<?php

namespace App\Http\Controllers;
use App\Domain\Repositories\JurusanRepository;

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
    public function __construct(JurusanRepository $jurusan)
    {
        $this->middleware('guest', ['only' => ['landingpage','getLogin','signup']]);
        $this->jurusan=$jurusan;
    }

    public function landingpage()
    {
        $getlist=$this->jurusan->getList();
        // dump($getlist);
        return view('landingpage')->with([
            'getlist'=>$getlist
        ]);

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

public function confirm($confirmation_code)
    {
        $users = \DB::table('users')
            ->where('confirmation_code', $confirmation_code)
            ->count();

        if ($users == 0) {
            session()->flash('auth_message', 'maaf user konfirmasi email tidak berlaku lagi');
            return redirect()->route('login');

        } else {
            $user = \DB::table('users')
                ->where('confirmation_code', $confirmation_code)
                ->first();
            $userupdate = User::find($user->id);

            $userupdate->is_aktif = 1;
            $userupdate->confirmation_code = 0;
            $userupdate->save();
            session()->flash('auth_messagee', 'User berhasil dikonfirmasi ');
            return redirect()->route('login');

        }
    }

}
