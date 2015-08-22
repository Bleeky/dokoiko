<div class="text-center logo-container">
    <div class="logo-position">
        <a href="{{ URL::action('ArticleController@getHome') }}">
            {!! HTML::image('content/doko-logo.png', null, (['class' => 'logo-size'])) !!}
        </a>
    </div>
</div>

New contact from : {{ $contact['name'] }}

{{ $contact['message'] }}

Message from : {{ $contact['email'] }}
