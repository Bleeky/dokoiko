<div class="weblogo backgroundcolor1" style="height: 300px;">
    <div style="position: relative; top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(-50%);">
        <a href="{{ URL::action('HomeController@getHome') }}">
            {{ HTML::image('ressources/assets/Dokoiko.png', null, array('style' => 'max-height: 300px; max-width: 600px;')) }}
        </a>
    </div>
</div>

<div class="transparentcolor">
    <div class="container" id="dropbtn" style="display:none;">
        <a id="showmenu" class="btn-dailys"><i style="padding: 13px;" id="iconmenu" class="fa fa-close fa-bars fa-2x"></i></a>
    </div>
</div>

<div id="nav-container">
	<div id='cssmenu' class="transparentcolor">
		<ul>
			<li><a href="{{ URL::action('HomeController@getHome') }}"><span>Clichés</span></a></li>
			<li><a href="{{ URL::action('ArticleController@getHome') }}"><span>Articles</span></a></li>
			<li><a href="{{ URL::action('HomeController@getVideos') }}"><span>Vidéos</span></a></li>
			<li><a href="{{ URL::action('HomeController@getPays') }}"><span>Les pays</span></a></li>
			<li><a href="{{ URL::action('HomeController@getContact') }}"><span>Contact</span></a></li>
		</ul>
	</div>
</div>
<div id="nav-containerfix" style="visibility: hidden;" class="f-nav">
	<div id='cssmenu' class="transparentcolor">
		<ul>
			<li><a href="{{ URL::action('HomeController@getHome') }}"><span>Clichés</span></a></li>
			<li><a href="{{ URL::action('ArticleController@getHome') }}"><span>Articles</span></a></li>
			<li><a href="{{ URL::action('HomeController@getVideos') }}"><span>Vidéos</span></a></li>
			<li><a href="{{ URL::action('HomeController@getPays') }}"><span>Les pays</span></a></li>
			<li><a href="{{ URL::action('HomeController@getContact') }}"><span>Contact</span></a></li>
		</ul>
	</div>
</div>