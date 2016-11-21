@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a group!</div>

                    <div class="panel-body">
                        <br/>
                        Here you will enter group information
                        <form class="form" id="create-group" method="POST" action="{{ url('group') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="user" value="{{ Auth::user()->id }}"/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <br/>
                                    <label for="group-name">Group name:</label>
                                    <input class="form-control" type="text" id="group-name" name="group-name" />
                                    <br/>
                                </div>
                                <div class="col-xs-12">
                                    <label for="description">Group's purpose: </label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                    <br/>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-plus">&nbsp;</i>Create Group
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
