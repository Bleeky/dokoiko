@extends ('Layouts.admindefault')
@section('content')

@include('Admin.Home.status')


<div class="container" style="padding-top: 40px; padding-bottom: 50px;">
@include('Admin.Home.tweet')
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

$(document).on('submit', '#tweet', function(e) {
        $.post(
            $(this).prop('action'),
            {
                "_token": $( this ).find('input[name=_token]' ).val(),
                "message": $('#message').val()
            },
            function(data) {
                $(data).replaceAll("#twitter").hide().fadeIn("slow");
            },
            'html'
        );
        return false;
});

</script>

@stop