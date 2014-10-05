<tbody id="pictures_list">
	@foreach($pictures as $picture)
	<tr class="{{ ($picture->status == 1) ? 'success' : 'danger'}}">
		<td>{{ $picture->title }}</td>
		<td>{{ $picture->getDate() }}</td>
		<td style="text-align: center;"><a onclick="EditPicture({{ $picture->id }});" class="btn btn-info">Edit</a></td>
		<td style="text-align: center;"><a onclick="DeletePicture({{ $picture->id }});" class="btn btn-danger">Delete</a></td>
		<td style="text-align: center;">
			<div class="btn-group btn-toggle"> 
				<button id="picturePublished" class="btn btn-xs {{ ($picture->status == 0) ? 'btn-default active' : 'btn-info'}}" onclick="PictureStatus({{ $picture->id }})">ON</button>
				<button id="pictureNotPublished" class="btn btn-xs {{ ($picture->status == 0) ? 'btn-info	' : 'btn-default active'}}" onclick="PictureStatus({{ $picture->id }})">OFF</button>
			</div>
		</td>
	</tr>
	@endforeach
</tbody>