@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit user information</div>
                <div class="panel-body">
					<div id="form">
						<form action="{{ url('/user_store/' . Auth::user()->id) }}" method="post" name="" class="form">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<fieldset>
                                <div>
                                    <label for="name">Name:</label>
                                    <input name="name" class="form-control" value="{{ $user->name }}" />
                                </div>
                                <div>
                                    <br/>
                                    <label for="phone">Phone number:</label>
                                    <input name="phone" class="form-control" value="{{ $user->phone }}" />
                                </div>
                                <div>
                                    <br/>
                                    <label>Email</label>
                                    <p>{{ $user->email }}</p>
                                </div>
							</fieldset>
                            <br/>
                            <button type="submit" name="regbutton" type="button" class="btn btn-primary">
                                <i class="fa fa-save">&nbsp;</i>
                                Update Information
                            </button>
						</form>
                        <br/>
                        <a href="{{ url('/user_delete') }}" class="btn btn-danger">
                            <i class="fa fa-trash">&nbsp;</i>
                            Deactivate Account
                        </a>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection