<?
/**
 * TITLE: Контакты
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
@section('style')
@stop
@section('content')
    <div class="ya-map cf">
        <div id="ymaps-map-id_133876530959542054863"></div>
        <script type="text/javascript">
            function fid_133876530959542054863(ymaps) {
                var map = new ymaps.Map("ymaps-map-id_133876530959542054863", {
                    center: [39.774624076721146, 47.23498908113597],
                    zoom: 15,
                    type: "yandex#map"
                });
                map.controls.add("zoomControl").add("mapTools").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
                map.geoObjects.add(new ymaps.Placemark([39.774409, 47.235179], {balloonContent: "Ресторан-бар Нью-Йорк"}, {preset: "twirl#redDotIcon"}));
            }
            ;
        </script>
        <script type="text/javascript"
                src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_133876530959542054863"></script>
    </div>
    <article class="first cf">
        <header>
            <h1>{{ $page->seo->h1 }}</h1>
        </header>
    </article>
    <article class="cf">
        <section>
            <div class="column left-contacts">
                {{ $page->block('content') }}
            </div>
            <div class="column right-contacts">
                <h3>Обратная связь</h3>

                <div id="message_box">@if(Session::has('message')) {{ Session::get('message') }}  @endif</div>
                @include(Helper::layout('forms.feedback'))
            </div>
        </section>
    </article>
@stop
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $("#submit").click(function (event) {
                var err = false;
                var email = $("#email").val();
                $(".inpval").each(function (i, element) {
                    if ($(this).val() == '') {
                        err = true;
                        $(this).addClass('empty-error');
                    }
                });
                if (err) {
                    $("#message_box").html('<div class="alert alert-error">Поля не могут быть пустыми</div>');
                    event.preventDefault();
                }
                ;
                if (!err && !isValidEmailAddress(email)) {
                    $("#message_box").html('<div class="alert alert-error">Не верный адрес E-Mail</div>');
                    event.preventDefault();
                }
            });
            $(".inpval").focusin(function () {
                $(this).removeClass('empty-error');
            });

            function isValidEmailAddress(emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            };
        });
    </script>
@stop