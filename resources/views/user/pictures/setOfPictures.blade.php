<div id="set-of-pictures">
    @if (count($pictures) > 1)
    <div style="display: table-row">
    @endif
        @foreach ($pictures as $count => $picture)
            @if ($count == 4)
    </div>
    <div style="display: table-row">
        @endif
        <div class="grid-picture" style="display: table-cell;">
            <a onclick="RequestRefresh('{{ $picture->id }}', '{{ URL::action('HomeController@getSelectedPicture') }}');"
               style="text-decoration:none;">
                @if (strstr($picture->image, "http://") == false && strstr($picture->image, "https://") == false)
                    {!! HTML::image('content/pictures/small/' . $picture->image, null, (['class'=>'img-responsive']))
                    !!}
                @else
                    {!! HTML::image($picture->image, null, (['class'=>'img-responsive'])) !!}
                @endif
                <div class="grid-picture-title">{{ $picture->title }}</div>
            </a>
        </div>
        @endforeach
    @if (count($pictures) > 1)
    </div>
    @endif
</div>
