@extends('Layouts.admindefault')
@section('content')

	<div class="container" style="padding-top: 50px; padding-bottom: 30px;">
		<div class="left">
			<button class="btn-circle-large btn-dailys buttoncolor" onclick="AddUser();"><i class="fa fa-plus"></i></button>
		</div>
	</div>


	<div class="container">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				@include('Admin.User.more')
			</table>
		</div>
	</div>

<script>
function AddUser() {
		bootbox.dialog({
				onEscape: function() {},
				title: "Adding a new user",
				message: '<div class="row">' +
					'<div class="col-md-12">' +
					'<form class="form-horizontal">' +
					'<div class="form-group"> ' +
					'<label class="col-md-4 control-label" for="title">Name</label> ' +
					'<div class="col-md-4"> ' +
					'<input id="username" name="username" type="text" placeholder="Name" class="form-control input-md">' +
					'</div>' +
					'</div>' +
					'<div class="form-group"> ' +
					'<label class="col-md-4 control-label" for="awesomeness">Password</label> ' +
					'<div class="col-md-4"> ' +
					'<input id="password" name="password" type="text" placeholder="Password" class="form-control input-md">' +
					'</div>' +
					'</div>' +
					'<div class="form-group"> ' +
					'<label class="col-md-4 control-label" for="title">Description</label> ' +
					'<div class="col-md-4"> ' +
					'<input id="description" name="description" type="text" placeholder="Description" class="form-control input-md">' +
					'</div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label class="col-md-4 control-label" for="awesomeness">Status</label>' +
				    '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
					'<input type="radio" name="status" id="status" value="author" checked="checked">Author</label>' +
					'</div>' +
					'<div class="radio"><label for="awesomeness-1">' +
					'<input type="radio" name="status" id="status" value="admin">Admin</label>' +
					'</div>' +
					'</div> </div>' +
					'</div>' +
					'</form></div></div>',
				buttons: {
					success: {
						label: "Save",
						className: "btn-success",
						callback: function () {
							var name = $('#username').val();
							var password = $('#password').val();
							var description = $('#description').val();
							var status = $("input[name='status']:checked").val();
							$.ajax({
								url: '{{ URL::action('AdminController@postAddUser') . '/' }}' + name + '/' + password + '/' + description + '/' + status,
								type: 'POST',
								dataType: 'html',
								success : function(code_html, statut){
									$(code_html).replaceAll("#users_list").hide().fadeIn("slow");
								}
							});
						}
					},
					failure: {
						label: "Cancel",
						className: "btn-warning"
					}
				}
			}
		);
	}
	function EditUser(id, username, password, description, status) {
		bootbox.dialog({
					onEscape: function() {},
					title: "Editing a user",
					message: '<div class="row">' +
						'<div class="col-md-12"> ' +
						'<form class="form-horizontal"> ' +
						'<div class="form-group"> ' +
						'<label class="col-md-4 control-label" for="title">Name</label> ' +
						'<div class="col-md-4"> ' +
						'<input id="username" name="username" type="text" value="' + username + '" class="form-control input-md"> ' +
						'</div> ' +
						'</div> ' +
						'<div class="form-group"> ' +
						'<label class="col-md-4 control-label" for="awesomeness">Password</label> ' +
						'<div class="col-md-4"> ' +
						'<input id="password" name="password" type="text" value="' + password + '" class="form-control input-md"> ' +
						'</div> ' +
						'</div>' +
						'<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="title">Description</label> ' +
                        '<div class="col-md-4">' +
                        '<input id="description" name="description" type="text" value="' + description + '" class="form-control input-md">' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="col-md-4 control-label" for="awesomeness">Status</label>' +
      				    '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
                        '<input type="radio" name="status" id="status" value="author" checked="checked">Author</label>' +
                        '</div>' +
                        '<div class="radio"><label for="awesomeness-1">' +
                        '<input type="radio" name="status" id="status" value="admin">Admin</label>' +
                        '</div>' +
                        '</div></div>' +
						'</div>' +
						'</form></div></div>',
					buttons: {
						success: {
							label: "Save",
							className: "btn-success",
							callback: function () {
								var name = $('#username').val();
								var password = $('#password').val();
								var description = $('#description').val();
    							var status = $("input[name='status']:checked").val();
								$.ajax({
									url: '{{ URL::action('AdminController@postEditUser') . '/' }}' + id + '/' + name + '/' + password + '/' + description + '/' + status,
									type: 'POST',
									dataType: 'html',
									success : function(code_html, statut){
										$(code_html).replaceAll("#users_list").hide().fadeIn("slow");
									}
								});
							}
						},
						failure: {
							label: "Cancel",
							className: "btn-warning"
						}
					}
				}
			);
	}
	function DeleteVideo(id) {
		bootbox.confirm("Are you sure?", function(result) {
			if (result == true) {
				$.ajax({
					url: '{{ URL::action('AdminController@postDeleteUser') . '/' }}' + id,
					type: 'POST',
					dataType: 'html',
					success : function(code_html, statut){
						$(code_html).replaceAll("#users_list").hide().fadeIn("slow");
					}
				});
			}
		});
	}
</script>

@stop