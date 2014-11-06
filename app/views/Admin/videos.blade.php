@extends('Layouts.admindefault')
@section('content')

	<div class="container" style="padding-top: 50px; padding-bottom: 30px;">
		<div class="left">
			<button class="btn-circle-large btn-dailys buttoncolor" onclick="AddVideo();"><i class="fa fa-plus"></i></button>
		</div>
		{{ Form::open(array('id'=>'search_video', 'style'=>'float: right;')) }}
		{{ Form::text('name_video', null, array('placeholder'=>'Search', 'class'=>'form-control', 'autocomplete'=>'off', 'id'=>'name_video')) }}
		{{ Form::close() }}
	</div>


	<div class="container">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
                @include('Admin.Video.more')
			</table>
		</div>
	</div>

<script>
function AddVideo() {
        bootbox.dialog({
                title: "Adding a new video",
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="title">Title</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="title" name="title" type="text" placeholder="Title" class="form-control input-md"> ' +
                    '</div> ' +
                    '</div> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="awesomeness">Youtube Adress</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="youtubeid" name="youtubeid" type="text" placeholder="" class="form-control input-md"> ' +
                    '</div> ' +
                    '</div> </div>' +
                    '</form> </div>  </div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            var title = $('#title').val();
                            var youtubeid = $('#youtubeid').val();
                    		$.ajax({
                    			url: '{{ URL::action('AdminController@postAddVideo') . '/' }}' + title + '/' + youtubeid,
                    			type: 'POST',
                    			dataType: 'html',
                    			success : function(code_html, statut){
                    				$(code_html).replaceAll("#videos_list").hide().fadeIn("slow");
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
	function EditVideo(id, title, youtubeid) {
	    bootbox.dialog({
                    title: "Editing a video",
                    message: '<div class="row">  ' +
                        '<div class="col-md-12"> ' +
                        '<form class="form-horizontal"> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="title">Title</label> ' +
                        '<div class="col-md-4"> ' +
                        '<input id="title" name="title" type="text" value="' + title + '" class="form-control input-md"> ' +
                        '</div> ' +
                        '</div> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="awesomeness">Youtube Adress</label> ' +
                        '<div class="col-md-4"> ' +
                        '<input id="youtubeid" name="youtubeid" type="text" value="' + youtubeid + '" class="form-control input-md"> ' +
                        '</div> ' +
                        '</div> </div>' +
                        '</form> </div>  </div>',
                    buttons: {
                        success: {
                            label: "Save",
                            className: "btn-success",
                            callback: function () {
                                var title = $('#title').val();
                                var youtubeid = $('#youtubeid').val();
                        		$.ajax({
                        			url: '{{ URL::action('AdminController@postEditVideo') . '/' }}' + id + '/' + title + '/' + youtubeid,
                        			type: 'POST',
                        			dataType: 'html',
                        			success : function(code_html, statut){
                        				$(code_html).replaceAll("#videos_list").hide().fadeIn("slow");
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
					url: '{{ URL::action('AdminController@postDeleteVideo') . '/' }}' + id,
					type: 'POST',
					dataType: 'html',
					success : function(code_html, statut){
						$(code_html).replaceAll("#videos_list").hide().fadeIn("slow");
					}
				});
			}
		});
	}
	function VideoStatus(id) {
		$.ajax({
			url: '{{ URL::action('AdminController@postVideoStatus') . '/'}}' + id,
			type: 'post',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#videos_list").hide().fadeIn("slow");
			}
		});
	}
	$("#search_video").submit(function(e) {
    		e.preventDefault();
    	});

    	$(document).ready(function () {
    		$("#name_video").keyup(function () {
    			$field = $(this);
    			$("#videos_list").html("");
    			if ($field.val().length >= 1) {
    				$.ajax({
    					type: "GET",
    					dataType: 'html',
    					url: '{{ URL::action('AdminController@getSearchVideo') . '/' }}' + $(this).val(),
    					success: function (code_html, statut) {
    						$(code_html).replaceAll("#videos_list").hide().fadeIn("slow");
    					}
    				})
    			}
    			else {
    				$.ajax({
    					type: "GET",
    					dataType: 'html',
    					url: '{{ URL::action('AdminController@getLoadDefaultVideos') }}',
    					success: function (code_html, statut) {
    						$(code_html).replaceAll("#videos_list").hide().fadeIn("slow");
    					}
    				})
    			}
    		})
    	});
</script>

@stop