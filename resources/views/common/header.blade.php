<header class="header">
    <div class="header__inner">
        <div class="wrapper">
            <div class="logo"><a href="{{ home() }}"><img src="{{asset('/img/logo.png')}}" alt="logo"></a></div>
            <div class="header__phone">
                @if( $phones = explode(',', widget('header.phones')))
                    @foreach($phones as $phone)
                        <span>{{ $phone }}</span>
                    @endforeach
                @endif
            </div>
            <div class="search">
                <input class="search-input" type="text" placeholder="поиск">
                <button class="search-btn"></button>
            </div>
            <div class="enter">
                <a class="enter__link" href="#">Размерная сетка</a>
                <a class="enter__link" href="#">Напишите нам</a>
            </div>
            <div class="basket">
                <span class="basket_top">В корзине<b><a href="#">4 товара</a></b></span>
                <span class="basket_top">на сумму:<b>15 600 KGS</b></span>
            </div>
            <div class="mobile-hamburger sidebar-open"><span></span></div>
        </div>
    </div>
</header>