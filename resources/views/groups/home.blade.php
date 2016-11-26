@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $group->group_name }}</div>

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
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <h4>Messages</h4>
                        </div>
                        {{--<table style="width:33%; float:left; top:0; bottom:0; left:100; right:0; border:0px">--}}
						{{--<tr style="height:10%;">--}}
							{{--<td>{{ date('l') }}</td>--}}
						{{--</tr>--}}
						{{--<tr>--}}
							{{--<td>Maybe a calendar</td>--}}
						{{--</tr>--}}
					{{--</table>--}}
					{{--<table style="width:33%; float:left; top:0; bottom:0; left:0; right:0; border:0px">--}}
						{{--<tr>--}}
							{{--<td>Tasks</td>--}}
						{{--</tr>--}}
						{{--<tr>--}}
							{{--<td>Tasks and descriptions from database here</td>--}}
						{{--</tr>--}}
					{{--</table>--}}
					{{--<table style="width:34%; float:left; top:0; bottom:0; left:0; right:0; border:0px">--}}
						{{--<tr>--}}
							{{--<td>Messages</td>--}}
						{{--</tr>--}}
						{{--<tr>--}}
							{{--<td>Messages from database here</td>--}}
						{{--</tr>--}}
					{{--</table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
