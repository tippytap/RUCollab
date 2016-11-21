@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Groups Dashboard</div>

                    <div class="panel-body">
                        <table style="width:33%; float:left; top:0; bottom:0; left:100; right:0; border:0px">
						<tr style="height:10%;">
							<td>Calendar</td>
						</tr>
						<tr>
							<td>Maybe a calendar</td>
						</tr>
					</table>
					<table style="width:33%; float:left; top:0; bottom:0; left:0; right:0; border:0px">
						<tr>
							<td>Tasks</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
					</table>
					<table style="width:34%; float:left; top:0; bottom:0; left:0; right:0; border:0px">
						<tr>
							<td>Messages</td>
						</tr>
						<tr>
							<td>Messages from database here</td>
						</tr>
					</table>
                        <br/><br/>
                        <a class="btn btn-primary" href="{{ url('group/create') }}">Create a group</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
