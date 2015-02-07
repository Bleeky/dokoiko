@extends('Layouts.default')
@section('content')

    {!! HTML::script('js/videos_dependencies.min.js') !!}

    <div class="container">
        <div class="videos" style="text-align: center;">
            @foreach($videos as $video)
                <div class="video-container">
                    <div class="video-box">
                        <div class="title">{{ $video->title }}</div>
                        <div id="prettyvideo" class="pretty-embed video" data-pe-videoid="{{ $video->youtubeid }}"
                             data-pe-fitvids="true"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $().prettyEmbed({previewSize: 'hd', showInfo: false, showControls: true, loop: false, showRelated: false});
        });

        function HandleGrid() {
            var msnry;
            var container = document.querySelector('.videos');
            imagesLoaded( container, function() {
                msnry = new Masonry(container, {});
            });
        }

        $(document).ready(HandleGrid);
        $(window).resize(HandleGrid);
    </script>

@stop