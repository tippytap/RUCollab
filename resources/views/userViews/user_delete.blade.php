@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <form action='{{url("/user_destroy/" . Auth::user()->id) }}' method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="panel-heading">
                        <h3>Are you sure you want to delete your account?</h3>
                        <p class="text-danger">This action cannot be undone</p>
                    </div>
                    <div class="panel-body">
                        <a href='{{ url("/user_edit/" . Auth::user()->id) }}' class="btn btn-default">No, take me back</a>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash">&nbsp;</i>
                            Delete Forever
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection