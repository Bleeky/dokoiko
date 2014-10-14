<div id="facebook" style="margin-top: 50px; width: 60%; float: right;">
    {{ Form::open(array('id' => 'face', 'action' => 'AdminController@postFacebook')) }}
    <p class="text">
        {{ Form::textarea('message', null, array('placeholder'=>'@Facebook', 'class'=>'feedback-input', 'required'=>'required', 'autocomplete'=>'off', 'id'=>'message')) }}
    </p>
    <div style="text-align: center; margin-bottom: 10px;">
        {{ Form::file('picture') }}
    </div>
    <div class="submit">
        {{ Form::submit('ENVOYER', array('id'=>'button-blue', 'name'=>'mailButton')) }}
    </div>
    {{ Form::close() }}
</div>