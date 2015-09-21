<?
/**
 * TITLE: Меню
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
<?php
$categories = Dic::valuesBySlug('product_category', function ($query) {
    $query->orderBy("dictionary_values.lft");
}, 'all', TRUE);
if ($page->sysname == 'menu'):
    echo json_encode(['responseType' => 'redirect',
            'redirectUrl' => URL::route('page.category_menu', array('category' => $categories->first()->slug)),
            'redirectCode' => 301]);
    return;
elseif($page->sysname == 'category_menu'):
    $current_category_slug = Request::segment(2);
    $current_category = array();
    foreach($categories as $category):
        if($category->slug == $current_category_slug):
            $current_category = $category;
            break;
        endif;
    endforeach;
endif;
if(!isset($current_category)):
    App::abort(404);
endif;
?>
@section('title'){{{ $current_category->seo->title }}}@stop
@section('description'){{{ $current_category->seo->description }}}@stop
@section('keywords'){{{ $current_category->seo->keywords }}}@stop
@section('h1'){{{ $current_category->seo->h1 }}}@stop
@section('menu'){{ $current_category->description }}@stop

@extends(Helper::layout())
@section('style')
@stop
@section('content')
    <article class="menu cf">
        <aside class="side-menu">
            <ul class="menu-categories cf">
                @foreach($categories as $category)
                    <li{{$current_category_slug == $category->slug ? ' class="active"' : '' }}>
                        <a href="{{ URL::route('page.category_menu', array('category' => $category->slug)) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="promo-block">
                {{ $page->block('banquet_menu') }}
            </div>
            <div class="promo-block">
                {{ $page->block('banquet_menu') }}
            </div>
        </aside>
        <section class="menu-list">
            <header>
                <h1>@yield('h1')</h1>
            </header>
            <div class="menu-item caption cf">
                <div class="title">наименование</div>
                <div class="price">цена</div>
            </div>
            @yield('menu')
        </section>
    </article>
@stop
@section('scripts')
@stop