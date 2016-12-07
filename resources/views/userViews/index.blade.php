@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
					
                <div class="panel-body">
					<!--<div class="col-md-6">-->
						@foreach($groups as $group)
							<table style="width:400px; height:250px; float:left; top:0; bottom:0; left:100; right:0; border:1px solid black">
								<tr>
									<td><a href="{{ url('/group/' . $group->id) }}">{{$group->group_name}}</a></td>
								</tr>
								@foreach($group->tasks as $task)
									<tr>
										<td>
										<td>{{ $task->task_string }}</td>
									</tr>
								@endforeach
							</table>
						@endforeach
						<!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
