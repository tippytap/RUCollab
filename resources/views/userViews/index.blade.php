@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

				@if(count($groups) > 0)
				<div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($groups as $group)
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <thead><h3><a href="{{ url('/group/' . $group->id) }}">{{$group->group_name}}</a></h3></thead>
                                    <hr/>
                                </tr>
                                @foreach($group->tasks as $task)
                                    <tr>
                                        <td>{{ $task->task_string }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @endforeach
                    </div>
				</div>
				@else
					<div>
						<h3>No groups yet.</h3>
						<p>Make a group and invite your friends!</p>
					</div>
				@endif
        </div>
    </div>
</div>
@endsection
