@extends ('Layouts.admindefault')
@section('content')

@include('Admin.Home.status')

<div class="container contact" style="padding-top: 50px;padding-bottom: 30px;">
	{{ Form::open(array('action' => 'AdminController@postTweet')) }}
	<div class="submit">
		{{ Form::submit('ENVOYER', array('id'=>'button-blue', 'name'=>'mailButton')) }}
	</div>
	{{ Form::close() }}
</div>

<script>
function WebsiteStatus(){
        $.ajax({
			url: '{{ URL::action('AdminController@postWebsiteStatus') }}',
			type: 'post',
			dataType: 'html',
			success : function(code_html, statut){
				$(code_html).replaceAll("#website_status").hide().fadeIn("slow");
			}
		});
}

</script>

@stop