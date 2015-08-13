@extends('layouts.default')
@section('content')

    <div class="container admin-table">
        <button class="btn-square left" onclick="AddPicture('{{ URL::action('PictureAdminController@getAddPicture') }}')"><i class="fa fa-plus"></i></button>
        {!! Form::open(array('id'=>'picture-search-field', 'style'=>'float: right;')) !!}
        {!! Form::text('picture-name', null, array('placeholder'=>'Search', 'class'=>'form-control',
        'autocomplete'=>'off', 'id'=>'picture-name')) !!}
        {!! Form::close() !!}
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Date published</th>
                </tr>
                </thead>
                @include('admin.pictures.pictures')
            </table>
        </div>
    </div>

    <div class="container">
        <button id="button-older-pictures-table" class="btn-square left" onclick="PreviousSetOfPicturesAdmin('{{ URL::action('PictureAdminController@getSetOfPictures') }}')"><i
                    class="fa fa-arrow-left"></i></button>
        <button id="button-more-recent-pictures-table" class="btn-square right" onclick="NextSetOfPicturesAdmin('{{ URL::action('PictureAdminController@getSetOfPictures') }}')"><i
                    class="fa fa-arrow-right"></i></button>
    </div>

    <script>
        GetNumberOfPicturesAdmin('{{ URL::action('PictureAdminController@getNumberOfPictures') }}')
    </script>

@stop
