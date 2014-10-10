<div id='website_status' class="container text-center" style="margin-top: 30px;">
<h1>Website Maintenance</h1>
<div class="btn-group btn-toggle">
	<button id="ArticlePublished" class="btn btn-xs {{ ($website->status == 0) ? 'btn-default active' : 'btn-info'}}" onclick="WebsiteStatus()">ON</button>
	<button id="ArticleNotPublished" class="btn btn-xs {{ ($website->status == 0) ? 'btn-info' : 'btn-default active'}}" onclick="WebsiteStatus()">OFF</button>
</div>
</div>