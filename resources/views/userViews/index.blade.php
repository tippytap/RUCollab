@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
					
                <div class="panel-body">
                    <table style="width:50%; float:left; top:0; bottom:0; left:100; right:0; border:0px">
						<tr style="height:10%;">
							<td>Groups</td>
						</tr>
						@foreach($groups as $group)
							<tr>
								<td><a href="{{ url('/group/' . $group->group_id) }}">{{$group->group_name}}</a></td>
							</tr>
						@endforeach
					</table>
					<table style="width:50%; float:right; top:0; bottom:0; left:0; right:0; border:0px">
						<tr>
							<td>Tasks</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
						<tr>
							<td>Tasks and descriptions from database here</td>
						</tr>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
