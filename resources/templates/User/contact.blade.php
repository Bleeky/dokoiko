@extends('Layouts.default')
@section('content')

    <div class="container contact">
        @if ($errors->has('success'))
            <div class="success-request">
                {{ $errors->first('success') }}
            </div>
        @elseif ($errors->has())
            <div class="error-login">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

    </div>

    <div class="container contact">
        {!! Form::open(['action'=>'HomeController@postSendMail', 'id'=>'contact-form']) !!}
        {!! Form::text('name', null, ['placeholder'=>'Nom', 'class'=>'feedback-input contact-name', 'autocomplete'=>'off', 'id'=>'contact-name']) !!}
        {!! Form::text('email', null, ['placeholder'=>'Email', 'class'=>'feedback-input contact-email', 'autocomplete'=>'off', 'id'=>'contact-email']) !!}
        {!! Form::textarea('message', null, ['placeholder'=>'Message', 'class'=>'feedback-input contact-message', 'autocomplete'=>'off', 'id'=>'contact-message']) !!}
        {!! Form::submit('Envoyer', ['id'=>'contact-button', 'name'=>'contact-button', 'class' => 'btn-large'])!!}
        {!! Form::close() !!}
    </div>

@stop