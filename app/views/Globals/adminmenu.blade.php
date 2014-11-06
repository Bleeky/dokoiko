<div id="nav-container">
	<div id='cssmenu' class="transparentcolor">
		<ul>
			<li><a href="{{ URL::action('AdminController@getIndex') }}"><span>Home</span></a></li>
			<li><a href="{{ URL::action('AdminController@getPictures') }}"><span>Pictures</span></a></li>
			<li><a href="{{ URL::action('AdminController@getArticles') }}"><span>Articles</span></a></li>
			<li><a href="{{ URL::action('AdminController@getVideos') }}"><span>Videos</span></a></li>
			<li><a href="{{ URL::action('LoginController@getLogout') }}"><span>Logout</span></a></li>
		</ul>
	</div>
</div>
