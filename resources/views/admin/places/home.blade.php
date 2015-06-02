@extends('layouts.default')
@section('content')

    <div class="container" style="width: 50%;">

        <input type="text" class="form-control" id="place" placeholder="Place" autocomplete="off">

        <div style="margin-top: 13px; text-align: center;">
            <button onclick="searchPlace('{{ URL::action('PlaceAdminController@postSearchPlace') }}', '{{ csrf_token() }}')" type="submit"
                    id="search" class="btn btn-success">Search
            </button>
        </div>

        <div id="searched-table">
        </div>

    </div>

    <hr style="border:solid 0.5px #d2caca;">

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Address</th>
                </tr>
                </thead>
                @include('Admin.Places.places')
            </table>
        </div>
    </div>

@stop