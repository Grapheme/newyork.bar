<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

<div class="left-shadow"></div>
<div class="right-shadow"></div>

<header role="main" class="cf">
    <div class="hours">
        {{ Config::get('app.settings.main.tpl_header_work_times') }}
    </div>
    @if(Route::currentRouteName() == 'mainpage')
        <div id="logo"><img src="{{ asset(Config::get('site.theme_path').'/images/logo.png') }}"
                            alt="Ресторан-бар «Нью-Йорк»"/></div>
    @else
        <a id="logo" href="{{ pageurl('mainpage') }}">
            <img src="{{ asset(Config::get('site.theme_path').'/images/logo.png') }}" alt="Ресторан-бар «Нью-Йорк»"/>
        </a>
    @endif
    @if(count(Config::get('app.locales')) > 1)
        @foreach(Config::get('app.locales') as $locale => $locale_name)
            @if(Route::getRoutes()->hasNamedRoute(Route::currentRouteName()))
                <a href="{{ URL::route(Route::currentRouteName(), ['lang' => $locale]) }}" class="{{ $locale }}">
                    <img src="{{ asset(Config::get('site.theme_path').'/images/'.$locale.'.png') }}"
                         alt="{{ $locale_name }}" title="{{ $locale_name }}"/>
                </a>
            @endif
        @endforeach
    @endif
    <address>
        {{ Config::get('app.settings.main.tpl_header_contacts') }}
    </address>
</header>