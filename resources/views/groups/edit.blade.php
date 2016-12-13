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
                                            <p>Add task: </p>
                                            <textarea class="form-control" id="task-string" name="task-string" placeholder="Task description"></textarea>
                                            <br/>
                                            <p>Assign: </p>
                                            @foreach($members as $member)
                                                <button data-member="{{ $member->id }}" class="btn btn-default"><i class="fa fa-user fa-btn"></i>{{ $member->name }}</button>
                                            @endforeach
											<br/>
											<br/>
                                            <p>Due Date: </p>
											<div id="ARDT" class="container" > 
												<div class="row">
													<div class='col-sm-4'>
														<div class="form-group">
															<div class='input-group date' id='datetimepicker1'>
																<input type='text' class="form-control" />
																<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
													</div>
														<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
													<script type="text/javascript" src="js/script.js">
														$(function () {
															$('#datetimepicker1').datepicker();
														});
													</script>
														<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
														<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
														<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
														<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
														<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
													
												</div>
											</div>
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
