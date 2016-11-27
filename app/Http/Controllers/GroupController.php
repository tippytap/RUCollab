<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Group;
use App\Membership;
use App\User;

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
        $group = Group::find($groupId);
        $members = $this->getMembers($groupId);
        $messages = [];
        foreach($group->messages as $message){
            $m = [
                'user' => User::find($message->user_id)->name,
                'message_text' => $message->message_string,
                'date' => $message->time_created
            ];
            $messages[] = $m;
        }
        return view('groups.home', ['group' => $group, 'members' => $members, 'messages' => $messages]);
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
        $members = $group->membership;
        foreach($members as $member){
            $member->delete();
        }
        Group::destroy($id);
        return redirect('/');
    }

    public function delete(Request $request, $id){
        $group = Group::find($id);
        return view('groups.delete', ['group' => $group]);
    }
}
