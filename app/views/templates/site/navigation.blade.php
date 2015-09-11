<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>
<nav style="overflow:hidden;">
    {{ Menu::placement('main_menu') }}
    <ul>
        <li class="social-menu"><a target="_blank" class="social facebook" href="http://vk.com/newyork_bar"><img
                        src="{{ asset(Config::get('site.theme_path').'/images/vkontakte.png') }}"/></a></li>
        <li class="social-menu"><a target="_blank" class="social vkontakte"
                                   href="https://www.facebook.com/RestoranBarNewYork"><img
                        src="{{ asset(Config::get('site.theme_path').'/images/facebook.png') }}"/></a></li>
    </ul>
</nav>