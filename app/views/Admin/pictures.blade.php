@extends('Layouts.admindefault')
@section('content')

<div id="HomePictureMenu">
	<div class="container" style="padding-top: 50px; padding-bottom: 30px;">
		<div class="left">
			<button class="btn-circle-large btn-dailys buttoncolor" onclick="AddPicture();"><i class="fa fa-plus"></i></button>
		</div>
		{{ Form::open(array('id'=>'search_picture', 'style'=>'float: right;')) }}
		{{ Form::text('name_picture', null, array('placeholder'=>'Search', 'class'=>'form-control', 'autocomplete'=>'off', 'id'=>'name_picture')) }}
		{{ Form::close() }}
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				@include('Admin.Picture.more')
			</table>
		</div>
	</div>

	<div class="container" style="text-align: center; padding-bottom: 50px;">
		<div class="left">
			<button id="morerecent" class="btn-circle-large btn-dailys buttoncolor" onclick="PreviousSetOfPictures();"><i class="fa fa-arrow-left"></i></button>
		</div>
		<div class="right">
			<button id="morerecent" class="btn-circle-large btn-dailys buttoncolor" onclick="NextSetOfPictures();"><i class="fa fa-arrow-right"></i></button>
		</div>
	</div>
</div>

<script type="text/javascript">
	var offset = 0;
	function NextSetOfPictures() {
		if ((offset + 10) < total) {
			offset = offset + 10;
		}
		$.ajax({
			url: '{{ URL::action('AdminController@getSetOfPictures') . '/' }}' + offset,
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#pictures_list").hide().fadeIn("slow");
			}
		});
	}
	function PreviousSetOfPictures() {
		if ((offset) > 0) {
			offset = offset - 10
		}
		$.ajax({
			url: '{{ URL::action('AdminController@getSetOfPictures') . '/' }}' + offset,
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#pictures_list").hide().fadeIn("slow");
			}
		});
	}
	function AddPicture() {
		$.ajax({
			url: '{{ URL::action('AdminController@getAddPicture') }}',
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#HomePictureMenu").hide().fadeIn("slow");
			}
		});
	}
	function EditPicture(id) {
		$.ajax({
			url: '{{ URL::action('AdminController@getEditPicture') . '/' }}' + id,
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#HomePictureMenu").hide().fadeIn("slow");
			}
		});
	}
	function DeletePicture(id) {
		bootbox.confirm("Are you sure?", function(result) {
			if (result == true) {
				$.ajax({
					url: '{{ URL::action('AdminController@postDeletePicture') . '/' }}' + id,
					type: 'POST',
					dataType: 'html',
					success : function(code_html, statut){
						$(code_html).replaceAll("#pictures_list").hide().fadeIn("slow");
					}
				});
			}
		}); 
	}
	function PictureStatus(id) {
		$.ajax({
			url: '{{ URL::action('AdminController@postPictureStatus') . '/'}}' + id + '/' + offset,
			type: 'post',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#pictures_list").hide().fadeIn("slow");
			}		
		});
	}

    function CountPictures() {
	$.ajax({
		url : '{{ URL::action('AdminController@getPictureTotal') }}',
		type : 'GET',
		dataType : 'json',
		success : function (result) {
			total = result['total'];
		},
		error : function () {
			alert("Error : could not count pictures.");
		}
	});
    }

    CountPictures();

	$("#search_picture").submit(function(e) {
		e.preventDefault();
	});

	$(document).ready(function () {
		$("#name_picture").keyup(function () {
			$field = $(this);
			$("#pictures_list").html("");
			if ($field.val().length >= 1) {
				$.ajax({
					type: "GET",
					dataType: 'html',
					url: '{{ URL::action('AdminController@getSearchPicture') . '/' }}' + $(this).val(),
					success: function (code_html, statut) {
						$(code_html).replaceAll("#pictures_list").hide().fadeIn("slow");
					}
				})
			}
			else {
				$.ajax({
					type: "GET",
					dataType: 'html',
					url: '{{ URL::action('AdminController@getLoadDefaultPictures') }}',
					success: function (code_html, statut) {
						$(code_html).replaceAll("#pictures_list").hide().fadeIn("slow");
					}
				})		
			}
		})
	});
</script>

@stop