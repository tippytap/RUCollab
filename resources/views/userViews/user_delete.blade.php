@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Are you sure you want to delete you account?</div>
                <div class="panel-body">
                    <input name="yesButton" type="button" class="button" value="Yes" />
					<input name="noButton" type="button" class="button" value="No" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection