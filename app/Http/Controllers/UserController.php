<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Membership;
use App\Group;
use DB;

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
    public function index(Request $request)
    {		
		$user = $request->user();
		$userId = $user->id;
		$groups = [];
		$tasks = [];
		
		foreach($user->membership as $group){
			$group = Group::find($group->group_id);
			$tasks = $this->getTasks($userId, $group->id);
			$groups[] = $group;
			$group->tasks = $tasks;
		}
		return view('userViews.index', ['groups'=>$groups]);		
    }
	
	/**
	* Get the tasks for a group
	*/
	public function getTasks($userId, $groupId){
		$task = DB::table('assignments')
				->join('tasks', 'tasks.task_id', '=', 'assignments.task_id')
				->select('assignments.group_id', 'tasks.task_id', 'tasks.task_string')
				->where([
							["assignments.user_id", "=", $userId], 
							["assignments.group_id", "=", $groupId],
							["tasks.is_completed", "=", "false"]
						])->get();
		return $task;
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
	/**
	* Show the page to edit user information
	*
	* @return View
	*/
	public function userUpdate(Request $request, $userID)
    {
        $user = User::find($userID);
		$user->name = $request->input('name');
		$user->phone = $request->input('phone');
		$user->email = $request->input('email');
        $user->save();
		return redirect("/userEdit/$userID");
    }
}
