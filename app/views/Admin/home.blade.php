@extends ('Layouts.admindefault')
@section('content')

<div class="container text-center" style="margin-top: 30px;">
<h1>Website Maintenance</h1>
<div class="btn-group btn-toggle">
	<button id="ArticlePublished" class="btn btn-xs btn-default active">ON</button>
	<button id="ArticleNotPublished" class="btn btn-xs btn-info">OFF</button>
</div>
</div>

@stop