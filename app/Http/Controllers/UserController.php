<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {
        return view('userViews.index');
    }
	/**
	* Show the page to edit user information
	*
	* @return View
	*/
	public function userEdit(Request $request, $userId)
    {
        $user = User::find($userId);
        return view('userViews.user_edit', ['user' => $user]);
    }
	/**
	* Show the page to edit user information
	*
	* @return View
	*/
	public function userDelete()
    {
        return view('userViews.user_delete');
    }

    /**
     * Finds the user and destroys it
     *
     * @return Redirect
     */
    public function userDestroy(Request $request, $userId)
    {
        User::destroy($userId);
        return redirect('/');
    }

	/**
	* Show the page to edit user information
	*
	* @return View
	*/
	public function home()
    {
        return view('userViews.home');
    }
}
