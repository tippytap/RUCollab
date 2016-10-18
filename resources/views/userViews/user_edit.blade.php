@extends('layouts.app')

@section('content')
    <style>
#form {
    background-color: #FFF;
    height: 600px;
    width: 600px;
    margin-right: auto;
    margin-left: auto;
    margin-top: 0px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 0px;
    text-align:center;
}
label {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 18px;
    color: #333;
    height: 20px;
    width: 200px;
    margin-top: 10px;
    margin-left: 10px;
    text-align: right;
    clear: both;
    float:left;
    margin-right:15px;
}
input {
    height: 20px;
    width: 300px;
    border: 1px solid #000;
    margin-top: 10px;
    float: left;
}
input[type=button] {
    float:none;
}
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit user information</div>
                <div class="panel-body">
					<div id="form">
						<form action="" method="post" name="registration" class="register">
							<fieldset>
								<label for="Student">Name:</label>
								<input name="Student" />
								<label for="Phone_Number">Phone number:</label>
								<input name="Phone_Number" />
								<label for="Email">Email:</label>
								<input name="Email" />
								<label for="Username">Username:</label>
								<input name="Username" />
								<label for="Password">Password:</label>
								<input name="Password" type="password" />
							</fieldset>
								{{--<input name="delbutton" type="button" class="button" value="Delete Account" />--}}
                            <button type="submit" name="regbutton" type="button" class="btn btn-primary">Update Information</button>
						</form>
                        <br/>
                        <a href="{{ url('/user_delete') }}" class="btn btn-danger">Delete Account</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection