@extends('Layouts.default')
@section('content')

<div class="page-container">
<div class="container" id="recent_daily" style="padding-top: 13px;">
	<div class="row">
		<div class="text-center">
			@if (strstr($picture->image, "http://") == false && strstr($picture->image, "https://") == false)
			{{ HTML::image('ressources/pictures/large/' . $picture->image, null, array('class'=>'img-responsive img-thumbnail top-img', 'id'=>'daily_img')) }}
            @else
			{{ HTML::image($picture->image, null, array('class'=>'img-responsive img-thumbnail top-img', 'id'=>'daily_img')) }}
            @endif
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
			<div class="daily-comment text-center">
				<h3 id="title">{{ $picture->title }}</h3>
				<p id="comment">{{ $picture->content }}</p>
			</div>
		</div>
	</div>
</div>

<div class="container" style="padding-top: 13px; padding-bottom: 13px; max-width: 1000px;" id="comments">
				<div id="disqus_thread"></div>
				<script type="text/javascript">
					var disqus_shortname = 'requiemforatrip';
					var disqus_title = '{{ $picture->title }}';
	                var disqus_identifier = '{{ $picture->id }}';
                    var disqus_url = 'http://localhost:8000/picture/' + '{{ $picture->id }}';
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
</div>
</div>

@stop