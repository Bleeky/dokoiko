<!DOCTYPE html>
<html>
<head>
    @include ('Common.header')
</head>
<body class="login-background">

<div class="login">
    <div class="triangle-down"></div>
    <div class="login-text">Login</div>

    @if ($errors->has())
        <div class="error-login">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    {!! Form::open(array('action' => 'AuthenticationController@postAuthenticate')) !!}
    {!! Form::text('username', null, array('id'=>'username', 'placeholder'=>'Username', 'autocomplete'=>'off',
    'autofocus'=>'autofocus')) !!}
    {!! Form::password('password', array('id'=>'password', 'placeholder'=>'Password', 'autocomplete'=>'off')) !!}
    {!! Form::submit('Login', array('class' => 'btn-large')) !!}
    <a href="{{ URL::action('ArticleController@getHome') }}" class="btn-large">Retour au site</a>
    {!! Form::close() !!}
</div>

</body>
</html>