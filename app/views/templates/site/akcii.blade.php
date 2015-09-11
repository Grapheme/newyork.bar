<?
/**
 * TITLE: Акции
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
@section('style')
@stop
@section('content')
    <article class="first cf">
        <header>
            <h1>{{ $page->seo->h1 }}</h1>
        </header>
        @foreach($page->blocks()->get() as $akcii)
            <section class="afisha-columns specials cf">
                @if($akcii->slug == 'akciya')
                    {{ $akcii->meta->content }}
                @endif
            </section>
        @endforeach
        <p class="image-caption">
            <sup>*</sup> Внимание! Акции не суммируются.
        </p>
    </article>
@stop
@section('scripts')
@stop