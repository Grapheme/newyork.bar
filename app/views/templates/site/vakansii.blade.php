<?
/**
 * TITLE: Вакансии
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
            <aside>
                <img src="/theme/images/vakansii.jpg" alt="Джазовые вечера" />
            </aside>
            <div class="column">
                {{ $page->block('first_content') }}
            </div>
        </section>
        <section class="vac-columns">
            @foreach($page->blocks()->get() as $vacancy)
                @if($vacancy->slug == 'vacancy')
                    <div class="column">
                        {{ $vacancy->meta->content }}
                    </div>
                @endif
            @endforeach
        </section>
    </article>
@stop
@section('scripts')
@stop