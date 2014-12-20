<div id="alldailys">
    <div style="display: table-row">
    @foreach ($pictures as $count => $picture)
    @if ($count == 4)
    	</div><div style="display: table-row">
    @endif
	<article style="display: table-cell;">
		<a onclick="RequestRefresh({{ $picture->id }});" style="text-decoration:none;">
		   	@if (strstr($picture->image, "http://") == false && strstr($picture->image, "https://") == false)
			{{ HTML::image('ressources/pictures/small/' . $picture->image, null, array('class'=>'img-responsive nothovered clichelist', 'id'=>'daily_img')) }}
			@else
			{{ HTML::image($picture->image, null, array('class'=>'img-responsive nothovered clichelist', 'id'=>'daily_img')) }}
            @endif
			<header>
				<h3 id="title">{{ $picture->title }}</h3>
			</header>
			<p id="date">{{ $picture->getDate() }}</p>
		</a>
	</article>
	@endforeach
</div>
</div>