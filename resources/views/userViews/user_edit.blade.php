@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit user information</div>
                <div class="panel-body">
					<div id="form">
						<form action="" method="post" name="" class="form">
							<fieldset>
                                <div>
                                    <label for="Student">Name:</label>
                                    <input name="Student" class="form-control" placeholder="{{ $user->name }}" />
                                </div>
                                <div>
                                    <br/>
                                    <label for="Phone_Number">Phone number:</label>
                                    <input name="Phone_Number" class="form-control" placeholder="" />
                                </div>
                                <div>
                                    <br/>
                                    <label for="Email">Email:</label>
                                    <input name="Email" class="form-control" placeholder="{{ $user->email }}" />
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