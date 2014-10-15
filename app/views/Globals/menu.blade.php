<div class="weblogo backgroundcolor1" style="height: 300px;">
	<a href="{{ URL::action('HomeController@getIndex') }}">
		{{ HTML::image('ressources/assets/Dokoiko.png', null, array('style' => 'max-height: 300px;')) }}
	</a>
</div>

<div id="nav-container">
	<div id='cssmenu' class="transparentcolor">
		<ul>
			<li><a href="{{ URL::action('HomeController@getIndex') }}"><span>Un jour une photo</span></a></li>
			<li><a href="{{ URL::action('ArticleController@getIndex') }}"><span>Articles</span></a></li>
			<li><a href="{{ URL::action('HomeController@getPays') }}"><span>Les pays</span></a></li>
			<li><a href="{{ URL::action('HomeController@getContact') }}"><span>Contact</span></a></li>
		</ul>
	</div>
</div>
<div id="nav-containerfix" style="visibility: hidden;" class="f-nav">
	<div id='cssmenu' class="transparentcolor">
		<ul>
			<li><a href="{{ URL::action('HomeController@getIndex') }}"><span>Un jour une photo</span></a></li>
			<li><a href="{{ URL::action('ArticleController@getIndex') }}"><span>Articles</span></a></li>
			<li><a href="{{ URL::action('HomeController@getPays') }}"><span>Les pays</span></a></li>
			<li><a href="{{ URL::action('HomeController@getContact') }}"><span>Contact</span></a></li>
		</ul>
	</div>
</div>