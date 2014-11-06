@extends('Layouts.default')
@section('content')

{{ HTML::script('assets/js/jquery.waitforimages.min.js') }}
{{ HTML::script('assets/js/jquery.prettyembed.min.js') }}


<div class="page-container">
<div class="container">

<ul class="videos" style="text-align: center;">
    {{--@foreach($videos as $video)--}}
	<li class="videobox">
		<div class="title">A la découverte de Tokyo !</div>
			<div class="pretty-embed video" data-pe-videoid="ZXYo5ojdt_k" data-pe-fitvids="true"></div>
	</li>
	{{--@endforeach--}}
	<li class="videobox">
		<div class="title">Ceci est un titre</div>
		<div class="pretty-embed video" data-pe-videoid="yzLTZLoJ9hE" data-pe-fitvids="true"></div>
	</li>
	<li class="videobox">
		<div class="title">Ceci est un titre</div>
		<div class="pretty-embed video" data-pe-videoid="ItffNZtUYXA" data-pe-fitvids="true"></div>
	</li>
	<li class="videobox">
		<div class="title">Ceci est un titre</div>
		<div class="pretty-embed video" data-pe-videoid="cbZ7SWYCBSY" data-pe-fitvids="true"></div>
	</li>
</ul>

</div>
</div>

<script>
$(document).ready(function() {
	$().prettyEmbed({ previewSize: 'hd',showInfo: false,showControls: true,loop: false,colorScheme: 'white',showRelated: false });
});
</script>

@stop