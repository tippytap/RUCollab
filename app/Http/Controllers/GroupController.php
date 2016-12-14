<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Assignment;
use App\Task;
use App\Group;
use App\Membership;
use App\User;
use DB;

use Mail;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $groupName = $request->input('group-name');
        $user = $request->user();
        $group = Group::create([
            'group_name' => $groupName,
            'formed_date' => time(),
            'purpose' => $request->input('purpose')
        ]);
        $membership = Membership::create([
            'user_id' => $user->id,
            'group_id' => $group->getAttribute('id')
        ]);
        $group->update(['group_leader_id' => $membership->getAttribute('user_id')]);

        return redirect('/dashboard');
    }

    public function hasMany(Request $request, $groupId)
    {
        $group = Group::find($groupId);
        echo $group->membership()->where('user_id', 1)->get();
    }

    public function show(Request $request, $groupId)
    {
		$user = $request->user();
		$userId = $user->id;
        $group = Group::find($groupId);
		$assignment = Assignment::where('group_id', $groupId);
        $members = $this->getMembers($groupId);
        $messages = [];
		$groups = [];
		$tasks = [];
        foreach($group->messages as $message){
            $m = [
                'user' => User::find($message->user_id)->name,
                'message_text' => $message->message_string,
                'date' => $message->time_created
            ];
            $messages[] = $m;
        }
		
		foreach($user->membership as $g){
			$g = Group::find($g->group_id);
			$tasks = $this->getTasks($userId, $group->id);
			$groups[] = $g;
			$g->tasks = $tasks;
		}
        return view('groups.home', ['group' => $group, 'members' => $members, 'groups' => $groups, 'messages' => $messages]);
    }

	public function getTasks($userId, $groupId){
		$task = DB::table('assignments')
				->join('tasks', 'tasks.task_id', '=', 'assignments.task_id')
				->select('assignments.group_id', 'tasks.task_id', 'tasks.task_string')
				->where([ 
							["assignments.group_id", "=", $groupId],
							["tasks.is_completed", "=", "false"]
						])->get();
		return $task;
	}
	
	/**
     * Store a newly created task resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function taskstore(Request $request, $groupId)
    {
        $taskString = $request->input('task-string');
        $task = Task::create([
            'task_string' => $taskString,
            'user' => $request->input('user-id'),
        ]);
		
        return redirect('/group/');
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = false)
    {
        $group = Group::find($id);
        return view('groups.edit', ['group' => $group, 'members' => $this->getMembers($id)]);
    }

    private function getMembers($id){
        $group = Group::find($id);
        $members = [];
        foreach($group->membership as $member){
            $members[] = User::find($member->user_id);
        }
        return $members;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->group_name = $request->input('group-name');
        $group->purpose = $request->input('purpose');
        $group->save();
        return redirect("group/$id/edit")->with(['group' => $group, 'members' => $this->getMembers($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
//        $members = $group->membership;
//        foreach($members as $member){
//            $m = Membership::where('user_id', $member->user_id)->first();
//            $m->delete();
////            $member->delete();
//        }
//        Group::destroy($id);
        return redirect('/');
    }

    public function delete(Request $request, $id){
        $group = Group::find($id);
        return view('groups.delete', ['group' => $group]);
    }

    public function groupMemberAdd(Request $request, $groupId, $userId){
        $user = User::findOrFail($userId);
        Membership::create([
            'user_id' => $user->id,
            'group_id' => $groupId
        ]);
        return redirect("/group/$groupId");
    }

    public function groupMemberEmail(Request $request, $groupId){
        $this->validate($request, [
            'invite-1' => 'required|max:255',
        ]);
        $user = User::where('email', $request->input('invite-1'))->first();
        $group = Group::findOrFail($groupId);
        Mail::send('email.addMember', ['user' => $user, 'group' => $group], function ($mail) use ($user, $group){
            $mail->from('erikmiller6@gmail.com', 'RUCollab');
            $mail->to($user->email, $user->name)->subject('Join ' . $group->group_name);
        });
        return redirect("/group/$groupId/edit");
    }
}
