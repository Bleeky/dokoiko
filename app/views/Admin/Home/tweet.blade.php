<div id="twitter" class="container contact" style="padding-top: 50px;padding-bottom: 30px;">
    {{ Form::open(array('id' => 'tweet', 'action' => 'AdminController@postTweet')) }}
    <p class="text">
        {{ Form::textarea('message', null, array('placeholder'=>'@Tweet', 'class'=>'feedback-input', 'required'=>'required', 'autocomplete'=>'off', 'id'=>'message')) }}
    </p>
    <div class="submit">
        {{ Form::submit('ENVOYER', array('id'=>'button-blue', 'name'=>'mailButton')) }}
    </div>
    {{ Form::close() }}
</div>