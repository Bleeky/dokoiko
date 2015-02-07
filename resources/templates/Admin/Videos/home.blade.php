@extends('Layouts.default')
@section('content')

    <div class="container admin-table">
        <button class="btn-square left" onclick="AddVideo('{{ URL::action('VideoAdminController@getAddVideo') }}')"><i class="fa fa-plus"></i></button>
        {!! Form::open(array('id'=>'video-search-field', 'style'=>'float: right;')) !!}
        {!! Form::text('video-name', null, array('placeholder'=>'Search', 'class'=>'form-control',
        'autocomplete'=>'off', 'id'=>'video-name')) !!}
        {!! Form::close() !!}
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                </tr>
                </thead>
                @include('Admin.Videos.videos')
            </table>
        </div>
    </div>


@stop