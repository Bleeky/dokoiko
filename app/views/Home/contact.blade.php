@extends('Layouts.default')
@section('content')

<div class="container contact" style="padding-top: 50px;padding-bottom: 50px;">
	{{ Form::open(array('action' => 'HomeController@postSendMail', 'onsubmit'=>'mailButton.disabled = true; return true;', 'id'=>'formcontact')) }}
	<p class="name">
		{{ Form::text('name', null, array('placeholder'=>'Nom', 'class'=>'feedback-input mailcolor', 'required'=>'required', 'autocomplete'=>'off', 'id'=>'name')) }}
	</p>
	<p class="email">
		{{ Form::text('email', null, array('placeholder'=>'Email', 'class'=>'feedback-input mailcolor', 'required'=>'required', 'autocomplete'=>'off', 'id'=>'email')) }}
	</p>
	<p class="text">
		{{ Form::textarea('message', null, array('placeholder'=>'Message', 'class'=>'feedback-input mailcolor', 'required'=>'required', 'autocomplete'=>'off', 'id'=>'message')) }}
	</p>
	<div class="submit">
		{{ Form::submit('ENVOYER', array('id'=>'button-blue', 'name'=>'mailButton', 'class' => 'btn-mail buttoncolor')) }}
	</div>
	{{ Form::close() }}
</div>
<div id="loading" class="container contact" style="display:none; text-align: center;">
	{{ HTML::image('ressources/assets/hex.gif', null, array('style'=>'text-align: center; max-width: 100%; height: auto; margin-right: auto; margin-left: auto;')) }}
	<div class="sending buttoncolor">
		Envoi du message ....
	</div>
</div>
<div class="container contact">
	<a href="{{ URL::action('HomeController@getContact') }}" style="text-decoration:none;">
		<div id="success" class="sending buttoncolor" style="display:none;">
			
		</div>
	</a>
</div>

@stop