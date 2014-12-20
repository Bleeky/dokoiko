<div id='website_status' class="container text-center" style="margin-top: 26px;">
    <div style="font-weight: 100; font-size: 30px; color: #222;">Website Maintenance</div>
    <div class="btn-group btn-toggle">
        <button id="ArticlePublished" class="btn btn-xs {{ ($website->status == 0) ? 'btn-default active' : 'btn-info'}}" onclick="WebsiteStatus()">ON</button>
        <button id="ArticleNotPublished" class="btn btn-xs {{ ($website->status == 0) ? 'btn-info' : 'btn-default active'}}" onclick="WebsiteStatus()">OFF</button>
    </div>
</div>