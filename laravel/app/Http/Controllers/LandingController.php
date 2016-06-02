<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Repositories\UserRepository as Users;

class LandingController extends Controller {

    private $users;

    public function __construct(Users $users)
    {
        $this->middleware('guest');
        $this->users = $users;
    }

    public function welcome()
    {
        return view('landing.welcome');
    }

    public function login()
    {
        return view('landing.login');
    }

    public function postLogin(Request $request)
    {
        $v = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($v->fails()) return redirect()->back()->withErrors($v->errors());

        if( ! Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')]) ) return redirect()->back()->withErrors(['error' => 'Unauthorized']);

        return redirect()->route('command.dashboard');
    }

    public function register()
    {
        return view('landing.register');
    }

    public function postRegister(Request $request)
    {
        $v = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);

        if($v->fails()) return redirect()->back()->withErrors($v->errors());

        $user = $this->users->create([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);

        if( ! $user ) return redirect()->back()->withErrors(['error' => 'Failed to create new user']);

        return redirect()->route('login');
    }

}
