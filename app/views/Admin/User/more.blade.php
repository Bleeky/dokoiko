<tbody id="users_list">
                    @foreach($users as $user)
                    <tr>
                        <td style="vertical-align: middle;">{{ $user->name }}</td>
                        <td style="text-align: center; vertical-align: middle;"><a onclick="EditUser({{ $user->id . ',' . '\'' . $user->name . '\'' . ',' . '\'' . $user->password . '\''}});" class="btn btn-info">Edit</a></td>
                        <td style="text-align: center; vertical-align: middle;"><a onclick="DeleteUser({{ $user->id }});" class="btn btn-danger">Delete</a></td>
                    </tr>
					@endforeach
</tbody>