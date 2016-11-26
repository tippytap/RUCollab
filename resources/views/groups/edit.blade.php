@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a group!</div>

                    <div class="panel-body">
                        <a href="{{ url('group/' . $group->id) }}"><i class="fa fa-arrow-left">&nbsp;</i>back</a>
                        <br/>
                        <h3>Group Admin</h3>
                        <form class="form" id="create-group" method="POST" action="{{ url('group') }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <label for="group-name">Group name:</label>
                                    <input class="form-control" type="text" id="group-name" name="group-name" value="{{ $group->group_name }}" />
                                    <br/>
                                    <label for="description">Group's purpose: </label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
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
                                            <input class="form-control" type="text" name="task[]" id="add-task" placeholder="task description" />
                                            <br/>
                                            <p>Assign: </p>
                                            @foreach($members as $member)
                                                <button class="btn btn-default"><i class="fa fa-user fa-btn"></i>{{ $member->name }}</button>
                                            @endforeach
                                            <div>
                                                <br/>
                                                <button class="btn btn-primary col-xs-12"><i class="fa fa-plus">&nbsp;</i>Add Task</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <label for="invite-1">Invite member: </label>
                                    <input class="form-control col-xs-9" type="text" id="invite-1" name="invite-1" placeholder="example@email.com" />
                                    <button id="invite-btn" class="col-xs-3 btn btn-default">Send invitation</button>
                                    <br/>
                                </div>
                                <div class="col-xs-12">
                                    <button class="btn btn-default">
                                        <i class="fa fa-plus">&nbsp;</i>Add another member
                                    </button>&nbsp;
                                </div>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary col-xs-12">
                                <i class="fa fa-save">&nbsp;</i>Update group
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
