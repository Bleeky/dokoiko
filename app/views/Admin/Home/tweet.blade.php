<div id="twitter" style="text-align: center;">
    {{ Form::open(array('id' => 'tweet', 'action' => 'AdminController@postTweet')) }}
    <p class="text">
        {{ Form::textarea('message', null, array('placeholder'=>'@Tweet', 'class'=>'feedback-input mailcolor contact-message', 'required'=>'required', 'autocomplete'=>'off', 'id'=>'message')) }}
    </p>
    <div style="text-align: center; margin-bottom: 10px;">
        {{ Form::file('picture') }}
    </div>
    <div class="submit">
        {{ Form::submit('TWEET', array('id'=>'button-blue', 'name'=>'mailButton', 'class'=>'btn-mail buttoncolor')) }}
    </div>
    {{ Form::close() }}
</div>