@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a group!</div>

                    <div class="panel-body">
                        <a href="{{ url('group') }}"><- back</a>
                        <br/>
                        Here you will enter group information
                        <form class="form" id="create-group" method="POST" action="{{ url('group') }}">
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
                                <div class="col-xs-12">
                                    <label for="invite-1">Invite member: </label>
                                    <input class="form-control" type="text" id="invite-1" name="invite-1" placeholder="example@email.com" />
                                    <br/>
                                    <button class="btn btn-default">Add another member</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
