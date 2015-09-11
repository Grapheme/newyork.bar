<?
/**
 * TITLE: Банкеты
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
<?php
$sliders = $images = array();
if ($page->sysname == 'banquets'):
    $sliders = Dic::valuesBySlug('slider_in_banquets', function ($query) {
        $query->orderBy("dictionary_values.lft");
    }, 'all', TRUE);
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
endif;
?>
@extends(Helper::layout())
@section('style')
    {{ HTML::style(Config::get('site.theme_path').'/css/fotorama.css') }}
@stop
@section('content')
    <article class="first cf">
        <header>
            <h1>{{ $page->seo->h1 }}</h1>
            {{ Menu::placement('banquets_menu') }}
        </header>
        <section class="afisha-columns">
            <div class="column text">
                {{ $page->block('first_content') }}
            </div>
        </section>
        <section class="afisha-columns">
            <div class="column text">
                @if(count($sliders))
                    <div class="fotorama" data-width="80%" data-cropToFit="true" style="margin: 0 0 2em;"
                         data-autoplay="true" data-transition="fade">
                        @foreach($sliders as $slider)
                            @if(isset($slider->slide) && isset($images[$slider->slide]))
                                <img src="{{ Config::get('site.galleries_photo_public_dir') .'/'.$images[$slider->slide] }}"
                                     alt="{{ $slider->name }}">
                            @endif
                        @endforeach
                    </div>
                @endif
                {{ $page->block('second_content') }}
            </div>
        </section>
    </article>
@stop
@section('scripts')
    {{ HTML::script(Config::get('site.theme_path').'/js/fotorama.js') }}
@stop