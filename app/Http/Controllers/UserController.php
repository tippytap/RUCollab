<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Membership;
use App\Group;
use DB;
use Auth;

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
        if($request->user()->is_active){
            $user = $request->user();
            $userId = $user->id;
            $groups = [];
            $tasks = [];

            foreach($user->membership as $group){
                $group = Group::find($group->group_id);
                $tasks = $this->getTasks($userId, $group->id);
                //try to give index as an array if this doesn't work - if that does;t work make another array
                $groups[] = $group;
                $group->tasks = $tasks;
            }
            return view('userViews.index', ['groups'=>$groups]);
        }
        else{
            Auth::logout();
            return redirect('/');
        }
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
        $user = User::find($userId);
        $user->is_active = false;
        $user->save();
        Auth::logout();
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

    public function reactivateUser($userEmail){
        $user = User::where('email', $userEmail)->first();
        $user->is_active = true;
        $user->save();
        return redirect('/dashboard')->with([
            "message" => "Account Reactivated! Please Log in."
        ]);
    }

    public function userStore(Request $request, $userId){
        $this->validate($request, [
            'name' => 'present|max:255',
            'phone' => 'present|max:10'
        ]);
        $user = User::find($userId);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->save();
        return redirect("/user_edit/$userId");
    }
}
