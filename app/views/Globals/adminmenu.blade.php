<div id="nav-container">
	<div id='cssmenu'>
		<ul>
			<li><a href="{{ URL::action('AdminController@getHome') }}"><span>Home</span></a></li>
			<li><a href="{{ URL::action('AdminController@getPictures') }}"><span>Pictures</span></a></li>
			<li><a href="{{ URL::action('AdminController@getArticles') }}"><span>Articles</span></a></li>
			<li><a href="{{ URL::action('AdminController@getLogout') }}"><span>Logout</span></a></li>
		</ul>
	</div>
</div>
<div id="nav-containerfix" style="visibility: hidden;" class="f-nav">
	<div id='cssmenu'>
		<ul>
			<li><a href="{{ URL::action('AdminController@getHome') }}"><span>Home</span></a></li>
			<li><a href="{{ URL::action('AdminController@getPictures') }}"><span>Pictures</span></a></li>
			<li><a href="{{ URL::action('AdminController@getArticles') }}"><span>Articles</span></a></li>
			<li><a href="{{ URL::action('AdminController@getLogout') }}"><span>Logout</span></a></li>
		</ul>
	</div>
</div>