<div class="container" id="recent_daily" style="padding-top: 13px;">
	<div class="row">
		<div class="text-center">
			<div class="switchbutton">
				<div class="left" style="margin-right: 10px;">
					<button id="morerecent" class="btn-circle-large btn-dailys buttoncolor" onclick="PreviousPicture({{ $picture->id }});"><i class="fa fa-arrow-left"></i></button>
				</div>
			</div>
			{{ HTML::image('ressources/pictures/large/' . $picture->image, null, array('class'=>'img-responsive img-thumbnail top-img', 'id'=>'daily_img')) }}
			<div class="switchbutton">
				<div class="right" style="margin-left: 10px;">
					<button id="lessrecent" class="btn-circle-large btn-dailys buttoncolor" onclick="NextPicture({{ $picture->id }});"><i class="fa fa-arrow-right"></i></button>
				</div>
			</div>
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

<script>
	var actual = {{ $picture->id }};
	if (actual == last) {$('#morerecent').css('visibility', ' hidden');}
	else {$('#morerecent').show();}
	if (actual == first) {$('#lessrecent').css('visibility', ' hidden');}
	else {$('#lessrecent').show();}
</script>