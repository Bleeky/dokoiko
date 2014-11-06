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
                title: "This is a form in a modal.",
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Name</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md"> ' +
                    '<span class="help-block">Here goes your name</span> </div> ' +
                    '</div> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label> ' +
                    '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
                    '<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="checked"> ' +
                    'Really awesome </label> ' +
                    '</div><div class="radio"> <label for="awesomeness-1"> ' +
                    '<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"> Super awesome </label> ' +
                    '</div> ' +
                    '</div> </div>' +
                    '</form> </div>  </div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            var name = $('#name').val();
                            var answer = $("input[name='awesomeness']:checked").val()
                        }
                    }
                }
            }
        );
		{{--$.ajax({--}}
			{{--url: '{{ URL::action('AdminController@postAddVideo') }}',--}}
			{{--type: 'GET',--}}
			{{--dataType: 'html',--}}
			{{--success : function(code_html, statut){--}}
				{{--$(code_html).replaceAll("#HomeVideoMenu").hide().fadeIn("slow");--}}
			{{--}--}}
		{{--});--}}
	}
	function EditVideo(id) {
		$.ajax({
			url: '{{ URL::action('AdminController@postEditVideo') . '/' }}' + id,
			type: 'GET',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#HomeVideoMenu").hide().fadeIn("slow");
			}
		});
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