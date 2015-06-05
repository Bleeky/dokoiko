<tbody id="places-table">
@foreach($places as $place)
    <tr>
        <td>{{ $place->formatted_address }}</td>
        <td style="text-align: center;"><a
                    href=""
                    class="btn btn-info">Edit</a></td>
        <td style="text-align: center;"><a
                    onclick="setCurrentPlace('{{ URL::action('PlaceAdminController@postSetCurrentPlace') }}', '{{ $place->id }}', '{{ csrf_token() }}')"
                    class="btn btn-success">Set as current</a></td>
        <td style="text-align: center;"><a
                    onclick="deletePlace('{{ URL::action('PlaceAdminController@postDeletePlace') }}', '{{ $place->id }}', '{{ csrf_token() }}')"
                    class="btn btn-danger">Delete</a></td>
    </tr>
@endforeach
</tbody>
