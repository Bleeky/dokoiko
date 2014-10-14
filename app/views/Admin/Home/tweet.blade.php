<div id="twitter" style="width: 60%;">
    {{ Form::open(array('id' => 'tweet', 'action' => 'AdminController@postTweet')) }}
    <p class="text">
        {{ Form::textarea('message', null, array('placeholder'=>'@Tweet', 'class'=>'feedback-input', 'required'=>'required', 'autocomplete'=>'off', 'id'=>'message')) }}
    </p>
    <div style="text-align: center; margin-bottom: 10px;">
        {{ Form::file('picture') }}
    </div>
    <div class="submit">
        {{ Form::submit('ENVOYER', array('id'=>'button-blue', 'name'=>'mailButton')) }}
    </div>
    {{ Form::close() }}
</div>