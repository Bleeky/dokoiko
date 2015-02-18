<div id="searched-table">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $place->formatted_address }}</td>
                <td style="text-align: center;"><a
                            onclick="addPlace('{{ URL::action('PlaceAdminController@postAddNewPlace') }}', '{{ $place->json_data }}', '{{ csrf_token() }}')"
                            class="btn btn-success">Add</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
