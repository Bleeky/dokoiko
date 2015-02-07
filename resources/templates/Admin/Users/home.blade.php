@extends('Layouts.default')
@section('content')

    <div class="container admin-table">
        <button class="btn-square left" onclick="AddUser('{{ URL::action('UserAdminController@getAddUser') }}')"><i
                    class="fa fa-plus"></i></button>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                @include('Admin.Users.users')
            </table>
        </div>
    </div>

@stop