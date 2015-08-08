@extends('layouts.default')
@section('content')

    <div class="text-center separator">
        <div class="separator-text">Le cliché du moment</div>
    </div>

    <div class="container pictures" id="latest-daily">
        <div class="row pictures">
            <div class="text-center">
                <div class="picture-navigation-btn">
                    <button id="button-more-recent-picture" style="visibility: hidden;" class="btn-square left"
                            onclick="PreviousPicture('{{ $pictures->first()->id }}', '{{ URL::action('HomeController@getPreviousPicture') }}');"><i class="fa fa-arrow-left"></i>
                    </button>
                </div>
                @if (strstr($pictures->first()->image, "http://") == false && strstr($pictures->first()->image, "https://") == false)
                    {!! HTML::image('content/pictures/large/' . $pictures->first()->image, null, (['class'=>'main-picture'])) !!}
                @else
                    {!! HTML::image($pictures->first()->image, null, (['class'=>'main-picture'])) !!}
                @endif
                <div class="picture-navigation-btn">
                    <button id="button-older-picture" class="btn-square right"
                            onclick="NextPicture('{{ $pictures->first()->id }}', '{{ URL::action('HomeController@getNextPicture') }}');"><i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row pictures">
            <div class="text-center">
                <div class="picture-title">{{ $pictures->first()->title }}</div>
                <div class="picture-content">{{ $pictures->first()->content }}</div>
            </div>
        </div>
    </div>

    <div class="container disqus">
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            var disqus_shortname = 'requiemforatrip';
            var disqus_title = "{{ $pictures->first()->title }}";
            var disqus_identifier = '{{ $pictures->first()->id }}';
            var disqus_url = "{{ action('HomeController@getPicture', $pictures->first()->id) }}";
            (function () {
                var dsq = document.createElement('script');
            dsq.type = 'text/javascript';
                dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <!-- <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by
                Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a> -->
    </div>

    <div class="text-center separator">
        <div class="separator-text">Plus de clichés</div>
    </div>

    <div class="container pictures">
        <button id="more-recent-set-of-pictures" class="btn-square left" style="margin-left: 10px; display: none;"
                onclick="PreviousSetOfPictures('{{ URL::action('HomeController@getSetOfPictures') }}');"><i class="fa fa-arrow-left"></i>
        </button>
        <button id="older-set-of-pictures" class="btn-square right" style="margin-right: 10px;"
                onclick="NextSetOfPictures('{{ URL::action('HomeController@getSetOfPictures') }}');"><i class="fa fa-arrow-right"></i>
        </button>
    </div>

    <div class="container pictures">
        @include('user.pictures.setOfPictures')
    </div>

    <script>
        GetNumberOfPictures('{{ URL::action('HomeController@getNumberOfPictures') }}')
    </script>

@stop
