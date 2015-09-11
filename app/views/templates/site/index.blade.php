<?
/**
 * TITLE: Главная страница
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
<?php
$sliders = Dic::valuesBySlug('slider_in_main', function ($query) {
    $query->orderBy("dictionary_values.lft");
}, 'all', TRUE);
$images = array();
if (count($sliders)):
    $images_ids = array();
    foreach ($sliders as $index => $slider):
        if (!empty($slider->slide)):
            $images_ids[] = $slider->slide;
        endif;
    endforeach;
    if (!empty($images_ids)):
        foreach (Photo::whereIn('id', $images_ids)->get() as $image):
            $images[$image->id] = $image->name;
        endforeach;
    endif;
endif;
?>
@extends(Helper::layout())
@section('style')
@stop
@section('content')
    @if(count($sliders))
        <div id="carousel" class="cf" style="margin-bottom: 0;">
            <div class="photo-wrapper clear">
                @foreach($sliders as $slider)
                    @if(isset($slider->slide) && isset($images[$slider->slide]))
                        <a class="promo-banner"
                           href="{{ !empty($slider->link) ? URL::to($slider->link) : 'javascript:void(0);' }}">
                            <img src="{{ Config::get('site.galleries_photo_public_dir') .'/'.$images[$slider->slide] }}"
                                 alt="{{ $slider->name }}"/>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
    <article class="cf">
        <header>
            <h1>{{ $page->seo->h1 }}</h1>
        </header>
        {{ $page->block('first_content') }}
    </article>
    <article class="cf">
        {{ $page->block('second_content') }}
    </article>
    <div class="map"> </div>
    <div class="welcome">Welcome to New York</div>
@stop
@section('scripts')
    {{ HTML::script(Config::get('site.theme_path').'/js/libs/jquery.cycle.js') }}
    {{ HTML::script(Config::get('site.theme_path').'/js/libs/jquery.easing.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
            $('div.photo-wrapper').cycle({
                fx: 'fade',
                timeout: 7000
            });
        });
    </script>
@stop