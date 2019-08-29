<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CmsService;

class UserController extends Controller {

    public function index() {
        return view('login');
    }

    /**
     * check login credetail
     * @param Request $request
     */
    public function postLogin(Request $request) {

        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect('add-employee');
        }
        return redirect()
                        ->back()
                        ->with("messageWarning", "Invalid Email or Password.")
                        ->withInput();
    }

    public function dashBoard() {

        return view('dashboard');
    }

    /**
     * logout with destory session
     */
    public function userLogout() {

        \Session::flush();
        \Cache::flush();
        \Auth::logout();
        return redirect('/');
    }

}
