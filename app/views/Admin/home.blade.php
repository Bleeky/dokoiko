@extends ('Layouts.admindefault')
@section('content')
			<div class="text-center separator" style="margin-top: 26px;">
				<div class="separator-text">{{ "Welcome " .  Auth::user()->username . " !"}}</div>
		    </div>

<div class="container" style="padding-bottom: 50px;">
<div style="font-weight: 100; font-size: 30px; color: #222; text-align: center; margin-bottom: 13px;">Un Petit Tweet ?</div>
@include('Admin.Home.tweet')
<div style="margin-bottom: 26px; margin-top: 26px;">
<hr style="color: #000; width: 100%;">
</div>
@include('Admin.Home.status')
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