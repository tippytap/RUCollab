@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ url('group/' . $group->id) }}"><i class="fa fa-arrow-left">&nbsp;</i>Back</a>
                <br/>
                <br/>
                <div class="panel panel-default">
                    <div class="panel-heading">Details for {{ $group->group_name }}</div>

                    <div class="panel-body">
                        <br/>
                        <form class="form" id="create-group" method="POST" action="{{ url('group/' . $group->id) }}">
                            {{ method_field("PUT") }}
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <label for="group-name">Group name:</label>
                                    <input class="form-control" type="text" id="group-name" name="group-name" value="{{ $group->group_name }}" />
                                    <br/>
                                    <label for="purpose">Group's purpose: </label>
                                    <textarea class="form-control" id="purpose" name="purpose">{{ $group->purpose }}</textarea>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Tasks</div>
                                        <div class="panel-body">
                                            <ul>
                                                {{-- TASK TEMPLATE --}}
                                                {{--<li>Do the outline |--}}
                                                    {{--<span>&nbsp;assigned:&nbsp;--}}
                                                        {{--<a href="#">Joe Dude</a>--}}
                                                    {{--</span>&nbsp;|&nbsp;--}}
                                                    {{--<a href="#" role="button"><i class="fa fa-check text-success">&nbsp;</i></a>--}}
                                                    {{--&nbsp;--}}
                                                    {{--<a href="#" role="button"><i class="fa fa-pencil">&nbsp;</i></a>--}}
                                                    {{--&nbsp;--}}
                                                    {{--<a href="#" role="button"><i class="fa fa-remove text-danger">&nbsp;</i></a>--}}
                                                {{--</li>--}}
                                            </ul>
                                            <p>Add task: </p>
                                            <textarea class="form-control" id="add-task" name="add-task" placeholder="Task description"></textarea>
                                            <br/>
                                            <p>Assign: </p>
                                            @foreach($members as $member)
                                                <button data-member="{{ $member->id }}" class="btn btn-default"><i class="fa fa-user fa-btn"></i>{{ $member->name }}</button>
                                            @endforeach
                                            <div>
                                                <br/>
                                                <button id="add-task" class="btn btn-default col-xs-12"><i class="fa fa-plus fa-btn"></i>Add Task</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="row">
                                <form class="form" id="create-group" method="GET" action='{{ url("group/groupMemberEmail/$group->id/") }}'>
                                {!! csrf_field() !!}
                                <div class="col-xs-6">
                                    <label for="invite-1">Invite member: </label>
                                    <input class="form-control " type="text" id="invite-1" name="invite-1" placeholder="example@email.com" />
                                </div>
                                <div class="col-xs-6">
                                    <br/>
                                    <button id="invite-btn" class="col-xs-6 btn btn-default"><i class="fa fa-btn fa-send"></i>Send invitation</button>
                                </div>
                                <br/>
                                </form>
                            </div>
                                {{--<div class="col-xs-12">--}}
                                    {{--<button class="btn btn-default">--}}
                                        {{--<i class="fa fa-plus">&nbsp;</i>Add another member--}}
                                    {{--</button>&nbsp;--}}
                                {{--</div>--}}
                            <br/>
                            <button type="submit" class="btn btn-primary col-xs-12">
                                <i class="fa fa-save fa-btn"></i>Update group
                            </button>
                            {{--<br/>--}}
                            {{--<br/>--}}
                            {{--<a href="{{ url('group/delete/' . $group->id) }}" class="col-xs-12 btn btn-danger">Delete Group</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
