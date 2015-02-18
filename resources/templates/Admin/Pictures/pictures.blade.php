<tbody id="pictures-table">
@foreach($pictures as $picture)
    <tr>
        <td>{{ $picture->title }}</td>
        @if ($picture->date == 0)
            <td>Not published</td>
        @else
            <td>{{ $picture->getDate() }}</td>
        @endif
        <td style="text-align: center;"><a
                    href="{{ URL::action('PictureAdminController@getEditPicture', array($picture->id)) }}"
                    class="btn btn-info">Edit</a></td>
        <td style="text-align: center;"><a
                    onclick="DeletePicture('{{ URL::action('PictureAdminController@postDeletePicture') }}', '{{ $picture->id }}', '{{ csrf_token() }}')"
                    class="btn btn-danger">Delete</a></td>
        <td style="text-align: center;"
            onclick="ChangePictureStatus('{{ URL::action('PictureAdminController@getChangePictureStatus') }}', '{{ $picture->id }}')">
            <div class="btn-group btn-toggle">
                <button id="picturePublished"
                        class="btn btn-xs {{ ($picture->status == 0) ? 'btn-default active' : 'btn-warning'}}">ON
                </button>
                <button id="pictureNotPublished"
                        class="btn btn-xs {{ ($picture->status == 0) ? 'btn-warning' : 'btn-default active'}}">OFF
                </button>
            </div>
        </td>
    </tr>
@endforeach
</tbody>