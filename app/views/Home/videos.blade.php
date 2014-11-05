@extends('Layouts.default')
@section('content')

{{ HTML::script('assets/js/jquery.waitforimages.min.js') }}
{{ HTML::script('assets/js/jquery.prettyembed.min.js') }}


<div class="page-container">

<div class="container">
<ul class="videos" style="text-align: center;">
    <li class="videobox">
        <div class="title">Ceci est un titre</div>
        <div class="pretty-embed" data-pe-videoid="9fUMzkODtbg" data-pe-fitvids="true"></div>
    </li>
    <li class="videobox">
        <div class="title">Ceci est un titre</div>
        <div class="pretty-embed" data-pe-videoid="9fUMzkODtbg" data-pe-fitvids="true"></div>
    </li>
    <li class="videobox">
        <div class="title">Ceci est un titre</div>
        <div class="pretty-embed" data-pe-videoid="9fUMzkODtbg" data-pe-fitvids="true"></div>
    </li>
    {{--<li class="videobox">--}}
        {{--<div class="title">Ceci est un titre</div>--}}
        {{--<iframe width="100%" height="315" src="//www.youtube.com/embed/9fUMzkODtbg" frameborder="0" allowfullscreen></iframe>--}}
    {{--</li>--}}
    {{--<li class="videobox">--}}
        {{--<div class="title">Ceci est un titre</div>--}}
        {{--<iframe width="100%" height="315" src="//www.youtube.com/embed/9fUMzkODtbg" frameborder="0" allowfullscreen></iframe>--}}
    {{--</li>--}}
</ul>

</div>

</div>

<script>
$(document).ready(function() {
$().prettyEmbed({ previewSize: 'hd',
                          showInfo: false,
                          showControls: true,
                          loop: false,
                          colorScheme: 'dark',
                          showRelated: false });

});

</script>
@stop