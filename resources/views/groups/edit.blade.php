@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a group!</div>

                    <div class="panel-body">
                        <a href="{{ url('group') }}"><i class="fa fa-arrow-left">&nbsp;</i>back</a>
                        <br/>
                        <h3>Update group information</h3>
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
                                    <input class="form-control col-xs-9" type="text" id="invite-1" name="invite-1" placeholder="example@email.com" />
                                    <button id="invite-btn" class="col-xs-3 btn btn-default">Send invitation</button>
                                    <br/>
                                </div>
                                <div class="col-xs-12">
                                    <button class="btn btn-default">
                                        <i class="fa fa-plus">&nbsp;</i>Add another member
                                    </button>&nbsp;
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save">&nbsp;</i>Update group
                                    </button>
                                </div>
                                <div class="col-xs-12">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
