@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $group->group_name }}
                        <a data-target="#description" data-toggle="modal" href="#" class="btn btn-link"><i class="fa-btn fa fa-file-text"></i>Description</a>
                        <a href="{{ url('/group/' . $group->id . '/edit') }}" class="btn btn-link pull-right "><i class="fa fa-pencil fa-btn"></i>Edit this group</a>
                    </div>

                    <div class="panel-body">
                        <div class="col-xs-12 col-md-4">
                            <h3>{{ date('l') }}</h3>
                            <p>{{ date('F') . ' ' . date('j') . ', ' . date('Y') }}</p>
                            <hr/>
                            <p><strong>Members</strong></p>
                            <ul>
                            @foreach($members as $member)
                                <li>{{ $member->name }}</li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h4>Tasks</h4>
							@foreach($groups as $g)
								@if($g->id == $group->id)
								<div>
									@foreach($g->tasks as $task)
										<h5>
                                            {{ $task->task_string }}
                                            <br/>
                                            <small>
                                                @foreach($task->users as $user)
                                                {{ $user }} &nbsp;
                                                @endforeach
                                            </small>
                                        </h5>
									@endforeach
								</div>
								@endif
							@endforeach
                            <p><a href='{{ url("/group/$group->id/edit") }}' class="btn btn-link"><i class="fa fa-plus fa-btn"></i>Create a task</a></p>
                        </div>
                        <form method="POST" action="{{ url('message') }}">
                            {!! csrf_field() !!}
                            <div class="col-xs-12 col-md-4">
                                <h4>Messages</h4>
                                <hr/>
                                <div class="col-xs-12 ">
                                    @foreach($messages as $message)
                                        <div>
                                            <span>{{ $message['message_text'] }}</span>
                                            <br/>
                                            <span><em><small>{{ $message['user'] }}</small></em></span>
                                            <hr/>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="input-group">
                                    <input type="hidden" name="group" id="group" value="{{ $group->id }}"/>
                                    <textarea class="form-control" name="message-text" id="message-text" placeholder="Type message here"></textarea>
                                    <span class="input-group-addon">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-comment"></i></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="description" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Group Description
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $group->purpose }}
                </div>
            </div>
        </div>
    </div>
@endsection
