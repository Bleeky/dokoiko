@extends('Layouts.default')
@section('content')

{{ HTML::script('assets/js/jquery.waitforimages.min.js') }}
{{ HTML::script('assets/js/jquery.prettyembed.min.js') }}


<div class="page-container">
<div class="container">

<ul class="videos" style="text-align: center;">
    @foreach($videos as $video)
	<li class="videobox">
		<div class="title">{{ $video->title }}</div>
			<div class="pretty-embed video" data-pe-videoid="{{ $video->youtubeid }}" data-pe-fitvids="true"></div>
	</li>
	@endforeach
</ul>

</div>
</div>

<script>
$(document).ready(function() {
	$().prettyEmbed({ previewSize: 'hd',showInfo: false,showControls: true,loop: false,colorScheme: 'white',showRelated: false });
});
</script>

@stop