<!DOCTYPE html>
<title>Dokoiko</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Découvrir, voyager et partager : bienvenue sur Dokoiko."/>

{{--<link rel="icon" href="{{ asset('ressources/assets/ico.png') }}"/>--}}

{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300|Source+Sans+Pro:200') !!}

{!! HTML::style('css/dependencies.css') !!}
{!! HTML::style('css/app.css') !!}

@if (Auth::check())
    {!! HTML::style('css/admin.css') !!}
@endif

{!! HTML::script('js/dependencies.min.js') !!}
{!! HTML::script('js/tooltipster.min.js') !!}
{!! HTML::script('js/bootbox.min.js') !!}
{!! HTML::script('js/dokoiko.min.js') !!}

@if (Auth::check())
    {!! HTML::script('js/admin.min.js') !!}
@endif