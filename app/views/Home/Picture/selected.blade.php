<div class="container" id="recent_daily" style="padding-top: 13px;">
	<div class="row">
		<div class="text-center">
			<div class="switchbutton">
				<div class="left" style="margin-right: 10px;">
					<button id="morerecent" class="btn-circle-large btn-dailys buttoncolor" onclick="PreviousPicture({{ $picture->id }});"><i class="fa fa-arrow-left"></i></button>
				</div>
			</div>
			@if (strstr($picture->image, "http://") == false && strstr($picture->image, "https://") == false)
			{{ HTML::image('ressources/pictures/large/' . $picture->image, null, array('class'=>'top-img', 'id'=>'daily_img')) }}
            @else
			{{ HTML::image($picture->image, null, array('class'=>'top-img', 'id'=>'daily_img')) }}
            @endif
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

DISQUS.reset({
            reload: true,
            config: function () {
                this.page.identifier = '{{ $picture->id }}';
                this.page.url = 'http://localhost:8000/picture/' + '{{ $picture->id }}';
                this.page.title = '{{ $picture->title }}';
            }
        });

	$('#author').show();
	$('#comments').hide();

	var actual = {{ $picture->id }};
	if (actual == last) {$('#morerecent').css('visibility', ' hidden');}
	else {$('#morerecent').show();}
	if (actual == first) {$('#lessrecent').css('visibility', ' hidden');}
	else {$('#lessrecent').show();}
</script>