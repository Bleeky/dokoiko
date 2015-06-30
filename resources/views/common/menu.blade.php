@if (!Auth::check())
    <div class="text-center logo-container">
        <div class="logo-position">
            <a href="{{ URL::action('ArticleController@getHome') }}">
                {!! HTML::image('Content/doko-logo.png', null, (['class' => 'logo-size'])) !!}
            </a>
        </div>
    </div>

    <div class="container toggle-bar" id="toggle-bar" style="display:none;">
        <a class="btn-toggle-menu"><i style="padding: 13px;"
                                               class="fa fa-close fa-bars fa-2x"></i></a>
    </div>

    <div id="menu" class="dokomenu">
        <ul>
            <li><a href="{{ URL::action('ArticleController@getHome') }}"><span>Articles</span></a></li>
            <li><a href="{{ URL::action('HomeController@getHome') }}"><span>Photos</span></a></li>
            <li><a href="{{ URL::action('HomeController@getVideos') }}"><span>Vidéos</span></a></li>
            <li><a href="{{ URL::action('HomeController@getPays') }}"><span>Voyages</span></a></li>
            <li><a href="{{ URL::action('HomeController@getContact') }}"><span>Contact</span></a></li>
        </ul>
    </div>

    <div id="menu-fixed" class="dokomenu menu-fixed" style="visibility: hidden;">
        <ul>
            <li><a href="{{ URL::action('ArticleController@getHome') }}"><span>Articles</span></a></li>
            <li><a href="{{ URL::action('HomeController@getHome') }}"><span>Photos</span></a></li>
            <li><a href="{{ URL::action('HomeController@getVideos') }}"><span>Vidéos</span></a></li>
            <li><a href="{{ URL::action('HomeController@getPays') }}"><span>Voyages</span></a></li>
            <li><a href="{{ URL::action('HomeController@getContact') }}"><span>Contact</span></a></li>
        </ul>
    </div>
@else
    <div class="dokomenu">
        <ul>
            <li><a href="{{ URL::action('AdminController@getIndex') }}"><span>Home</span></a></li>
            @if (Auth::user()->privileges == "super")
                <li><a href="{{ URL::action('PictureAdminController@getHome') }}"><span>Pictures</span></a></li>
            @endif
            <li><a href="{{ URL::action('ArticleAdminController@getHome') }}"><span>Articles</span></a></li>
            @if (Auth::user()->privileges == "super")
                <li><a href="{{ URL::action('VideoAdminController@getHome') }}"><span>Videos</span></a></li>
                <li><a href="{{ URL::action('UserAdminController@getHome') }}"><span>Users</span></a></li>
                <li><a href="{{ URL::action('PlaceAdminController@getHome') }}"><span>Places</span></a></li>
            @endif
            <li><a href="{{ URL::action('AuthenticationController@getLogout') }}"><span>Logout</span></a></li>
        </ul>
    </div>
@endif
