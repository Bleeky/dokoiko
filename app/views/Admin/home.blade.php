@extends ('Layouts.admindefault')
@section('content')

@include('Admin.Home.status')

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