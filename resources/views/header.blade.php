<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ URL::asset('img/favicon.png') }}" rel="icon" type="image/png">

    <link rel="stylesheet" href="{{ URL::asset('css/libs.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/media.css')}}">
</head>
<body>
<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container"><a href="#" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Главная</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Мои заказы</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                <div class="payment-basket__status">
                    <div class="payment-basket__status__icon-block">
                        <a class="payment-basket__status__icon-block__link">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </div>
                    <div class="payment-basket__status__basket">
                        <span class="payment-basket__status__basket-value">0</span>
                        <span class="payment-basket__status__basket-value-descr">товаров</span>
                    </div>
                </div>
            </div>

            <div class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <div class="authorization-block">
                    <a class="authorization-block__link" href="{{ route('register') }}">Регистрация</a>
                    @if (Route::has('register'))
                    <a class="authorization-block__link" href="{{ route('login') }}">Вход</a>
                    @endif
                </div>
                @else
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </header>
