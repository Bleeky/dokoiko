<div class="container pictures" id="latest-daily">
    <div class="row pictures">
        <div class="text-center">
            <div class="picture-navigation-btn">
                <button id="button-more-recent-picture" class="btn-square left"
                        onclick="PreviousPicture('{{ $picture->id }}', '{{ URL::action('HomeController@getPreviousPicture') }}');">
                    <i class="fa fa-arrow-left"></i></button>
            </div>
            @if (strstr($picture->image, "http://") == false && strstr($picture->image, "https://") == false)
                {!! HTML::image('content/pictures/large/' . $picture->image, null, (['class'=>'main-picture'])) !!}
            @else
                {!! HTML::image($picture->image, null, (['class'=>'main-picture'])) !!}
            @endif
            <div class="picture-navigation-btn">
                <button id="button-older-picture" class="btn-square right"
                        onclick="NextPicture('{{ $picture->id }}', '{{ URL::action('HomeController@getNextPicture') }}');">
                    <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="row pictures">
        <div class="text-center">
            <div class="picture-title">{{ $picture->title }}</div>
            <div class="picture-content">{{ $picture->content }}</div>
        </div>
    </div>
</div>

<script>
    DISQUS.reset({
        reload: true,
        config: function () {
            this.page.identifier = '{{ $picture->id }}';
            this.page.url = "{{ action('HomeController@getPicture', $picture->id) }}";
            this.page.title = "{{ $picture->title }}";
        }
    });

    $('#btn-picture-comments').show();
    $('.disqus').hide();

    var actual = '{{ $picture->id }}';
    if (actual == MostRecentPictureID) {
        $('#button-more-recent-picture').css('visibility', ' hidden');
    }
    else {
        $('#button-more-recent-picture').show();
    }
    if (actual == OldestPictureID) {
        $('#button-older-picture').css('visibility', ' hidden');
    }
    else {
        $('#button-older-picture').show();
    }
</script>