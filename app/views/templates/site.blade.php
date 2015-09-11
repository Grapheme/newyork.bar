<?
/**
 * MENU_PLACEMENTS: main_menu=Основное меню|footer_menu=Нижнее меню|banquets_menu=Банкетное меню
 */
?>
        <!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    @include(Helper::layout('head'))
    @yield('style')
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class="top-shadow"></div>
<div id="container" class="cf">
    @include(Helper::layout('header'))
    <div id="main" role="main">
        @include(Helper::layout('navigation'))
        @section('content')
            {{ @$content }}
        @show
    </div>

    @section('footer')
        @include(Helper::layout('footer'))
    @show
</div>
@include(Helper::layout('scripts'))

@section('overlays')
@show

@section('scripts')
@show
</body>
</html>