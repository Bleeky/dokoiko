<!DOCTYPE html>
<html>
<head>
	@include ('Globals.head')
	{{ HTML::style('css/login.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:700,400,300') }}
</head>
<body>
	<div class="containter">
		<div id="login" style="margin-top:10%;">
			<div id="triangledown"></div>
			<h1 style="margin-top: 0px;">Log in</h1>
			{{ Form::open(array('action' => 'AdminController@postLogin')) }}
			{{ Form::text('username', null, array('id'=>'username', 'placeholder'=>'Username', 'autocomplete'=>'off', 'autofocus'=>'autofocus', 'required'=>'required')) }}
			{{ Form::password('password', array('id'=>'password', 'placeholder'=>'Password', 'autocomplete'=>'off', 'required'=>'required')) }} 
			{{ Form::submit('Log In') }}
			<a href="{{ URL::action('HomeController@getIndex') }}" class="buttonreturn" id="toggle-login">Retour au site</a>
			{{ Form::close() }}
		</div>
	</div>
</body>
</html>