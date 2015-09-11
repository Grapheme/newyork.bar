<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>
<?
/**
 * META TITLE
 */
if (isset($page) && is_object($page)) {
    if (isset($page->seos) && is_object($page->seos) && isset($page->seos[Config::get('app.locale')]) && is_object($page->seos[Config::get('app.locale')]) && $page->seos[Config::get('app.locale')]->title) {
        $page_title = $page->seos[Config::get('app.locale')]->title;
    } else {
        $page_title = $page->name;
    }
} elseif (isset($seo) && is_object($seo) && $seo->title) {
    $page_title = $seo->title;
} elseif (!isset($page_title)) {
    $page_title = Config::get('site.seo.default_title');
}
/**
 * META DESCRIPTION
 */
if (isset($page->seos) && is_object($page->seos) && isset($page->seos[Config::get('app.locale')]) && is_object($page->seos[Config::get('app.locale')]) && $page->seos[Config::get('app.locale')]->description) {
    $page_description = $page->seos[Config::get('app.locale')]->description;
} elseif (isset($seo) && is_object($seo) && $seo->description) {
    $page_description = $seo->description;
} elseif (!isset($page_description)) {
    $page_description = Config::get('site.seo.default_description');
}
/**
 * META KEYWORDS
 */
if (isset($page->seos) && is_object($page->seos) && isset($page->seos[Config::get('app.locale')]) && is_object($page->seos[Config::get('app.locale')]) && $page->seos[Config::get('app.locale')]->keywords) {
    $page_keywords = $page->seos[Config::get('app.locale')]->keywords;
} elseif (isset($seo) && is_object($seo) && $seo->keywords) {
    $page_keywords = $seo->keywords;
} elseif (!isset($page_keywords)) {
    $page_keywords = Config::get('site.seo.default_keywords');
}
/**
 * SEO H1
 */
if (isset($page->seos) && is_object($page->seos) && isset($page->seos[Config::get('app.locale')]) && is_object($page->seos[Config::get('app.locale')]) && $page->seos[Config::get('app.locale')]->h1) {
    $page_h1 = $page->seos[Config::get('app.locale')]->h1;
} elseif (isset($seo) && is_object($seo) && $seo->h1) {
    $page_h1 = $seo->h1;
} elseif (!isset($page_h1) && isset($page) && is_object($page)) {
    $page_h1 = $page->name;
} else {
    $page_h1 = NULL;
}
?>
@section('title'){{{ $page_title }}}@stop
@section('description'){{{ $page_description }}}@stop
@section('keywords'){{{ $page_keywords }}}@stop
@section('h1'){{{ $page_h1 }}}@stop
@section('meta_og')
    <meta property="og:title" content="{{{ $page_title }}}" />
    <meta property="og:description" content="{{{ $page_description }}}" />
    <meta property="og:url" content="{{ URL::to('/') }}" />
    <meta property="og:image" content="{{ asset(Config::get('site.theme_path').'/images/og-image.png') }}" />
    <link rel="image_src" href="{{ asset(Config::get('site.theme_path').'/images/og-image.png') }}" />
@stop
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">

<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="google-site-verification" content="_AZr0SF3uEysb2YphYZS8BAqq5DCMgx2_ph5qNJP2GA" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{ asset(Config::get('site.theme_path').'/images/favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset(Config::get('site.theme_path').'/images/apple-touch-icon.png') }}">
@yield('meta_og')

{{ HTML::style(Config::get('site.theme_path').'/css/global.css') }}
{{ HTML::style(Config::get('site.theme_path').'/css/layout.css', array('media'=>'all and (min-width: 33.236em)')) }}
{{ HTML::style(Config::get('site.theme_path').'/css/alerts.css') }}
{{ HTML::script(Config::get('site.theme_path').'/js/libs/modernizr-1.7.min.js') }}