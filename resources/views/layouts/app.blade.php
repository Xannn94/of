<!DOCTYPE html>
<html class="no-js" lang="{!! lang() !!}">

@include('common.meta-header')

<body>
<!--[if lt IE 9]>
<p class="browsehappy">@lang('index.old_browser')</p><![endif]-->

<div class="b-page">
    <div class="b-page__wrapper">
        @include('common.header')
        <div class="wrapper">
            @include('tree::menu')
            @section('page_content')
            @show
        </div>
        <div class="page__buffer"></div>
    </div>
    <footer class="footer">
        <div class="wrapper">
            <ul class="footer__menu">
                <li class="footer__menu__item"><a href="#">О компании</a></li>
                <li class="footer__menu__item"><a href="#">Каталог одежды</a></li>
                <li class="footer__menu__item"><a href="#">Сотрудничество</a></li>
                <li class="footer__menu__item"><a href="#">Новости и публикации</a></li>
                <li class="footer__menu__item"><a href="#">Контакты</a></li>
            </ul>
            <div class="footer__social">
                <a href="#" class="footer__social__link"></a>
                <a href="#" class="footer__social__link footer__social__link_fb"></a>
                <a href="#" class="footer__social__link footer__social__link_wk"></a>
                <a href="#" class="footer__social__link footer__social__link_ok"></a>
                <a href="#" class="footer__social__link footer__social__link_tw"></a>
            </div>
        </div>
    </footer>
</div>
<div class="sidebar-overlay"></div>
<div class="sidebar">
    <div class="sidebar-block">
        <div class="sidebar-block__top">
            <div class="sidebar-block__close sidebar-close">
            </div>
        </div>
        <div class="logo"><a href="#"><img src="img/logo.png" alt="logo"></a></div>
        <div class="sidebar-block__content">
            <div class="sidebar-block__menu">
                <nav>
                    <div class="ms-menu">
                        <ul>
                            <li>
                                <div class="ms-menu__item">
                                    <div class="ms-menu__left">
                                        <div class="ms-menu__arrow trigger">
                                        </div>
                                    </div>
                                    <div class="ms-menu__right">
                                        <a href="#">Акционные товары</a>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#">Миссия и принципы</a>
                                    </li>
                                    <li>
                                        <a href="#">Качество и стандарты работы</a>
                                    </li>
                                    <li>
                                        <a href="#">История компании</a>
                                    </li>
                                    <li>
                                        <a href="#">Наша команда</a>
                                    </li>
                                    <li>
                                        <a href="#">Ресурсы</a>
                                    </li>
                                    <li>
                                        <a href="#">Вакансии</a>
                                    </li>
                                    <li>
                                        <a href="#">Наше лого</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="ms-menu__item">
                                    <div class="ms-menu__left">
                                        <div class="ms-menu__arrow trigger">
                                        </div>
                                    </div>
                                    <div class="ms-menu__right">
                                        <a href="#">Почему мы</a>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#">Миссия и принципы</a>
                                    </li>
                                    <li>
                                        <a href="#">Качество и стандарты работы</a>
                                    </li>
                                    <li>
                                        <a href="#">История компании</a>
                                    </li>
                                    <li>
                                        <a href="#">Наша команда</a>
                                    </li>
                                    <li>
                                        <a href="#">Ресурсы</a>
                                    </li>
                                    <li>
                                        <a href="#">Вакансии</a>
                                    </li>
                                    <li>
                                        <a href="#">Наше лого</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Покупателю на заметку</a>
                            </li>
                            <li>
                                <a href="#">Бонусы и купоны</a>
                            </li>
                            <li>
                                <a href="#">Вопрос-ответ</a>
                            </li>
                            <li>
                                <a href="#">Контакты</a>
                            </li>
                            <li class="mob-item">
                                <a href="#">О компании</a>
                            </li>
                            <li class="mob-item">
                                <a href="#">Карьера</a>
                            </li>
                            <li class="mob-item">
                                <a href="#">Поставщикам на заметку</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="header__phone">
                <span>+996 (312) 34 78 40</span>
                <span>+996 (555) 34 78 40</span>
            </div>
            <div class="enter">
                <a class="enter__link" href="#">Размерная сетка</a>
                <a class="enter__link" href="#">Напишите нам</a>
            </div>
            <div class="search">
                <input class="search-input" type="text" placeholder="поиск">
                <button class="search-btn"></button>
            </div>
        </div>
    </div>
</div>

@include('common.meta-footer')

</body>

</html>

