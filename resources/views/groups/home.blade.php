@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Groups Dashboard</div>

                    <div class="panel-body">
                        Here will be all the group info: messages, tasks, due dates, and the calendar
                        <br/><br/>
                        <a class="btn btn-primary" href="{{ url('group/create') }}">Create a group</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
