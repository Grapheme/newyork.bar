<?
/**
 * TITLE: Страница по умолчанию
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
        <section class="afisha-columns">
            <div class="column text">
                {{ $page->block('content') }}
            </div>
        </section>
    </article>
@stop
@section('scripts')
@stop