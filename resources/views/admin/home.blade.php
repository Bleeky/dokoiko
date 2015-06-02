@extends('layouts.default')
@section('content')

    <div class="container">
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

     <div class="text-center separator">
        <div class="separator-text">Welcome {!! $user->username !!} !</div>
    </div>

    <div class="container">
        {!! HTML::image('Content/author/' . $user->image, null, (['class' => 'admin-image'])) !!}
    </div>

    <div class="container">

        {!! Form::open(['action'=>'AdminController@postUpdateAdminUserInfos', 'id'=>'author-infos',
        'class'=>'admin-form', 'files'=>'true']) !!}
        <div class="form-group">
            <label>Author full-name</label>
            {!! Form::text('author-name', $user->full_name, array('class'=>'form-control',
            'autocomplete'=>'off', 'id'=>'author-name', 'autocomplete'=>'off')) !!}
        </div>
        <div class="form-group">
            <label>Author description</label>
            {!! Form::textarea('author-description', $user->description, array('class'=>'form-control description',
            'autocomplete'=>'off', 'id'=>'author-description', 'autocomplete'=>'off')) !!}
        </div>
        <div class="form-group">
            <label>Author image</label>
            {!! Form::file('author-picture') !!}
        </div>
        {!! Form::submit('Update informations', ['id'=>'update-author-button', 'name'=>'update-author-button', 'class' =>
        'btn-large'])!!}
        {!! Form::close() !!}


        {!! Form::open(['action'=>'AdminController@postUpdateAdminUserSettings', 'id'=>'author-settings',
        'class'=>'form-horizontal admin-form', 'files'=>'true']) !!}
        <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>

            <div class="col-sm-10">
                {!! Form::text('author-username', $user->username, array('class'=>'form-control',
                'autocomplete'=>'off', 'id'=>'author-username', 'autocomplete'=>'off')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
                {!! Form::password('author-password', array('class'=>'form-control',
                'autocomplete'=>'off', 'id'=>'author-password')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password confirmation</label>

            <div class="col-sm-10">
                {!! Form::password('author-password-two', array('class'=>'form-control',
                'autocomplete'=>'off', 'id'=>'author-password-two')) !!}
            </div>
        </div>
        {!! Form::submit('Update settings', ['id'=>'update-author-settings-button', 'name'=>'update-author-settings-button',
        'class' =>
        'btn-large'])!!}
        {!! Form::close() !!}

    </div>
    <hr style="border:solid 0.5px #d2caca;">

@stop