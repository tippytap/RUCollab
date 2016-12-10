@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }}, your lovely presence is emphatically requested in
                    the group, {{ $group->group_name }}!
                </div>

                <div class="panel-body">
                    <p>To accept, please follow this link:</p>
                    <a href="{{ url('group/groupMemberAdd/' . $group->id . '/' . $user->id) }}">
                        {{ url('group/groupMemberAdd/' . $group->id . '/' . $user->id) }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
