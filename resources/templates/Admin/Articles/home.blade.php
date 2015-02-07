@extends('Layouts.default')
@section('content')

    <div class="container admin-table">
        <button class="btn-square left" onclick="AddArticle('{{ URL::action('ArticleAdminController@getAddArticle') }}')"><i class="fa fa-plus"></i></button>
        {!! Form::open(array('id'=>'article-search-field', 'style'=>'float: right;')) !!}
        {!! Form::text('article-name', null, array('placeholder'=>'Search', 'class'=>'form-control',
        'autocomplete'=>'off', 'id'=>'article-name')) !!}
        {!! Form::close() !!}
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date published</th>
                </tr>
                </thead>
                @include('Admin.Articles.articles')
            </table>
        </div>
    </div>

@stop