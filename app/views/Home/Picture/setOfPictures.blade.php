<div class="row" id="alldailys">
	<div class="container">
		@foreach ($pictures as $count => $picture)
		@if ($count == 4)
	</div><div class="container">
	@endif
	<article>
		<a onclick="RequestRefresh({{ $picture->id }});" style="text-decoration:none;">
			{{ HTML::image('ressources/pictures/small/' . $picture->image, null, array('class'=>'img-responsive nothovered clichelist', 'id'=>'daily_img')) }}
			<header>
				<h3 id="title">{{ $picture->title }}</h3>
			</header>
			<p id="date">{{ $picture->getDate() }}</p>
		</a>
	</article>
	@endforeach
</div>
</div>