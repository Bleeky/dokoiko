<tbody id="users-table">
@foreach($users as $user)
    @if ($user->username != Auth::user()->username)
        <tr>
            <td>{{ $user->username }}</td>
            <td style="text-align: center;"><a
                        onclick="EditUser('{{ URL::action('UserAdminController@postEditUser') }}', '{{ $user->id }}', '{{ $user->privileges }}', '{{ $user->username }}', '{{ csrf_token() }}')"
                        class="btn btn-primary">Privileges</a></td>
            <td style="text-align: center;"><a
                        onclick="DeleteUser('{{ URL::action('UserAdminController@postDeleteUser') }}', '{{ $user->id }}', '{{ csrf_token() }}')"
                        class="btn btn-danger">Delete</a></td>
        </tr>
    @endif
@endforeach
</tbody>