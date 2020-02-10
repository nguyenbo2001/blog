<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('guest')->except('show');

        $this->middleware(function($request, $next) {
            echo 'Middleware Closure Controller';
            return $next($request);
        });
    }

    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return Response
     */
    public function show($id) {
        return view('users.profile', ['user' => User::findOrFail($id)]);
    }
}
