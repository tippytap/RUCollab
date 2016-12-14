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
                                <div class="col-xs-12 col-sm-6">
                                    <div class="row">
                                        <label for="group-name">Group name:</label>
                                        <input class="form-control" type="text" id="group-name" name="group-name" value="{{ $group->group_name }}" />
                                        <br/>
                                        <label for="purpose">Group's purpose: </label>
                                        <textarea class="form-control" id="purpose" name="purpose">{{ $group->purpose }}</textarea>
                                        <br/>
                                        <button type="submit" class="btn btn-default col-xs-12">
                                            <i class="fa fa-save fa-btn"></i>Update group details
                                        </button>
                                    </div>
                                </div>
                        </form>
                        <form class="form" id="create-task" method="POST" action="{{ url('taskStore/' . $group->id) }}">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="panel panel-default">
                                                <div class="panel-heading">Tasks</div>
                                                <div class="panel-body">
                                                    <p>Add task: </p>
                                                    <textarea class="form-control" id="task-string" name="task-string" placeholder="Task description"></textarea>
                                                    {{--<br/>--}}
                                                    {{--<p>Assign: </p>--}}
                                                    {{--@foreach($members as $member)--}}
                                                        {{--<button data-member="{{ $member->id }}" class="btn btn-default"><i class="fa fa-user fa-btn"></i>{{ $member->name }}</button>--}}
                                                    {{--@endforeach--}}
                                                    {{--<br/>--}}
                                                    {{--<br/>--}}
                                                    {{--<p>Due Date: </p>--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class='col-sm-12'>--}}
                                                                {{--<input type='text' class="form-control" id='datetimepicker4' />--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    <div>
                                                        <br/>
                                                        <button type="submit" id="add-task" class="btn btn-info col-xs-12"><i class="fa fa-plus fa-btn"></i>Add Task</button>
                                                    </div>
                                                </div>
                                                </div>
                                    </div>
                        </form>
                        <form class="form" id="create-group" method="GET" action='{{ url("group/groupMemberEmail/$group->id/") }}'>
                            {!! csrf_field() !!}
                            <div class="row">
                                <label for="invite-1" class="col-xs-12">Invite member: </label>
                                <div class="col-sm-8">
                                    <input class="form-control " type="text" id="invite-1" name="invite-1" placeholder="example@email.com" />
                                </div>
                                <button id="invite-btn" class="col-xs-12 col-sm-3 btn btn-default"><i class="fa fa-btn fa-send"></i>Send invitation</button>
                            </div>
                            <br/>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
