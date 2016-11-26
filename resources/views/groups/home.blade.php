@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $group->group_name }}
                        <a href="{{ url('/group/' . $group->id . '/edit') }}" class="pull-right "><i class="fa fa-pencil fa-btn"></i>Edit this group</a>
                    </div>

                    <div class="panel-body">
                        <div class="col-xs-12 col-md-3">
                            <h3>{{ date('l') }}</h3>
                            <p>{{ date('F') . ' ' .date('j') . ', ' . date('Y') }}</p>
                            <p><strong>Members</strong></p>
                            <hr/>
                            @foreach($members as $member)
                                <p>{{ $member->name }}</p>
                            @endforeach
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <h4>Tasks</h4>
                            <p><a href="#" class="btn btn-default"><i class="fa fa-plus fa-btn"></i>Create a task</a></p>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <h4>Messages</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
