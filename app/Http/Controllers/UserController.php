<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
     * @return \
     */
    public function index()
    {
        return view('userViews.index');
    }
	/**
	* Show the page to edit user information
	*
	* @reutn \
	*/
	public function userEdit()
    {
        return view('userViews.user_edit');
    }
	/**
	* Show the page to edit user information
	*
	* @reutn \
	*/
	public function userDelete()
    {
        return view('userViews.user_delete');
    }
	/**
	* Show the page to edit user information
	*
	* @reutn \
	*/
	public function home()
    {
        return view('userViews.home');
    }
}
