<!DOCTYPE html>
<html>
<head>
	@include ('Globals.head')
	{{ HTML::style('assets/css/login.css') }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:700,400,300') }}
</head>
<body>
	<div class="containter">
		<div id="login" style="margin-top:10%;">
			<div id="triangledown" class=""></div>
			<h1 class="transparentcolor" style="margin-top: 0px;">Log in</h1>
			{{ Form::open(array('action' => 'LoginController@postLogin')) }}
			{{ Form::text('username', null, array('id'=>'username', 'placeholder'=>'Username', 'autocomplete'=>'off', 'autofocus'=>'autofocus', 'required'=>'required')) }}
			{{ Form::password('password', array('id'=>'password', 'placeholder'=>'Password', 'autocomplete'=>'off', 'required'=>'required')) }} 
			{{ Form::submit('Log In', array('class' => 'buttoncolor')) }}
			<a href="{{ URL::action('HomeController@getHome') }}" class="buttonreturn buttoncolor" id="toggle-login">Retour au site</a>
			{{ Form::close() }}
		</div>
	</div>
</body>
</html>