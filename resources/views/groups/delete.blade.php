@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Are you sure you want to delete this group?</h4>
                    </div>

                    <div class="panel-body">
                        <h5><em>This action cannot be undone</em></h5>
                        <a href="{{ url('group/' . $group->id . '/edit') }}" class="btn btn-default pull-left">No, take me back</a>
                        <form method="POST" action="{{ url('group/' . $group->id) }}">
                            {{ method_field('delete') }}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger pull-left">
                                <i class="fa fa-btn fa-trash"></i>
                                Delete Group Forever
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
