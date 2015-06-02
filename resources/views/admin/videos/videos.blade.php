<tbody id="videos-table">
@foreach($videos as $video)
    <tr>
        <td>{{ $video->title }}</td>
        <td style="text-align: center;"><a onclick="EditVideo('{{ URL::action('VideoAdminController@postEditVideo') }}', '{{ $video->id }}', '{{ $video->title }}', '{{ $video->youtubeid }}', '{{ csrf_token() }}')" class="btn btn-info">Edit</a></td>
        <td style="text-align: center;"><a onclick="DeleteVideo('{{ URL::action('VideoAdminController@postDeleteVideo') }}', '{{ $video->id }}', '{{ csrf_token() }}')" class="btn btn-danger">Delete</a></td>
        <td style="text-align: center;" onclick="ChangeVideoStatus('{{ URL::action('VideoAdminController@getChangeVideoStatus') }}', '{{ $video->id }}')">
            <div class="btn-group btn-toggle">
                <button id="videoPublished" class="btn btn-xs {{ ($video->status == 0) ? 'btn-default active' : 'btn-warning'}}">ON</button>
                <button id="videoNotPublished" class="btn btn-xs {{ ($video->status == 0) ? 'btn-warning' : 'btn-default active'}}">OFF</button>
            </div>
        </td>
    </tr>
@endforeach
</tbody>