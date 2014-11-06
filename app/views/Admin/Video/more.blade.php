<tbody id="videos_list">
                    @foreach($videos as $video)
                    <tr class="{{ ($video->status == 1) ? 'success' : 'danger'}}">
                        <td style="vertical-align: middle;">{{ $video->title }}</td>
                        <td style="text-align: center; vertical-align: middle;"><a onclick="EditVideo({{ $video->id . ',' . '\'' . $video->title . '\'' . ',' . '\'' . $video->youtubeid . '\''}});" class="btn btn-info">Edit</a></td>
                        <td style="text-align: center; vertical-align: middle;"><a onclick="DeleteVideo({{ $video->id }});" class="btn btn-danger">Delete</a></td>
                        <td style="text-align: center; vertical-align: middle;">
                            <div class="btn-group btn-toggle">
                                <button id="videoPublished" class="btn btn-xs {{ ($video->status == 0) ? 'btn-default active' : 'btn-info'}}" onclick="VideoStatus({{ $video->id }})">ON</button>
                                <button id="videoNotPublished" class="btn btn-xs {{ ($video->status == 0) ? 'btn-info	' : 'btn-default active'}}" onclick="VideoStatus({{ $video->id }})">OFF</button>
                            </div>
                        </td>
                    </tr>
					@endforeach
</tbody>