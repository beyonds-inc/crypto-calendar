<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @stack('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
</head>
<header class="global-header site-header">
    <div id="container">
        <nav class="global-nav">
            <ul class="nav-row nav-row__left">
                <li class="nav-row_item"><a href="/posts" class="logo">クリプトカレンダー</a></li>
                @if(Auth()->check())
                    <li class="nav-row_item">
                        <a href="/posts/create">
                            <svg width="26px" height="26px" viewBox="0 0 26 26" class="svg-circle-plus">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g class="fill-color">
                                        <polygon points="14.0909091 11.9090909 14.0909091 7 11.9090909 7 11.9090909 11.9090909 7 11.9090909 7 14.0909091 11.9090909 14.0909091 11.9090909 19 14.0909091 19 14.0909091 14.0909091 19 14.0909091 19 11.9090909 14.0909091 11.9090909"></polygon>
                                        <path d="M13,26 C20.1797017,26 26,20.1797017 26,13 C26,5.82029825 20.1797017,0 13,0 C5.82029825,0 0,5.82029825 0,13 C0,20.1797017 5.82029825,26 13,26 Z M13.12,23.12 C18.6428475,23.12 23.12,18.6428475 23.12,13.12 C23.12,7.5971525 18.6428475,3.12 13.12,3.12 C7.5971525,3.12 3.12,7.5971525 3.12,13.12 C3.12,18.6428475 7.5971525,23.12 13.12,23.12 Z"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="nav-row_item_text">イベントを追加する</span>
                        </a>
                    </li>
                @endif
            </ul>
            <ul class="nav-row nav-row__right">
                <li class="nav-row_item">
                    <div class="account-holder list-pop">
                        @if (Auth::guest())
                        <?php
                        $ua=$_SERVER['HTTP_USER_AGENT'];
                        $browser=
                        ((strpos($ua,'iPhone')!==false)||(strpos($ua,'iPod')!==false)||(strpos($ua,'Android')!==false));
                        ?>
                        @if($browser==!'sp')

                        <li class="nav-row_item nav-row_item__login">
                            <a href="{{ route('register') }}" class="gest_btn">新規登録</a>/<a href="{{ route('login') }}" class="gest_btn">ログイン</a>
                        </li>
                        @else
                        <li class="nav-row_item list-pop">
                            <a href="javascript:void(0)" class="list-pop_trigger">
                                <svg width="32" height="32" viewBox="0 0 32 32" class="svg-list">
                                    <path d="M29 23h-26c-0.552 0-1 0.448-1 1v4c0 0.552 0.448 1 1 1h26c0.552 0 1-0.448 1-1v-4c0-0.552-0.448-1-1-1zM29 3h-26c-0.552 0-1 0.448-1 1v4c0 0.552 0.448 1 1 1h26c0.552 0 1-0.448 1-1v-4c0-0.552-0.448-1-1-1zM29 13h-26c-0.552 0-1 0.448-1 1v4c0 0.552 0.448 1 1 1h26c0.552 0 1-0.448 1-1v-4c0-0.552-0.448-1-1-1z"></path>
                                </svg>
                                <span class="nav-row_item_text">メニュー</span>
                            </a>
                            <ul class="nav-account list-pop_content">
                                <li>
                                    <a href="{{ route('login') }}" class="login-register">ログイン</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" class="login-register">新規登録</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @else
                        <span class="account-holder-name icon-triangle icon-after list-pop_trigger" ontouchstart="">
                        <a href="">{{ Auth::user()->name }}</a>
                    </span>
                        <ul class="nav-account list-pop_content">
                            <li><a href="/posts/{{Auth()->user()->id}}">私のイベント</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              ログアウト
                            </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div ng-app="searchApp" class="content-main">
    <div class="discovery" ng-controller="SearchCtrl" ng-click="closeTagFilters($event)">
        @yield('search') @yield('content')
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.list-pop_trigger', function(e) {
            $(this).modelessDialog({
                container: '.list-pop',
                content: '.list-pop_content'
            });
            e.preventDefault();
        });
        $('input').placeholder();
        $('a.poplight').click(open_modal_window);
        $(document).on('click', 'a.close, #fade', function(e) {
            var target = document.elementFromPoint(e.clientX, e.clientY);
            if (($(this).is('a.close')) ||
                (target.id == 'fade')) {
                if (typeof window.onFadeClick == 'function' &&
                    (!$(this).is('a.close'))) {
                    var res = window.onFadeClick(e);
                    if (!res)
                        return;
                    window.onFadeClick = undefined;
                }
                close_modal_window(e);
                if (typeof ga != 'undefined')
                    ga('send', 'pageview', location.pathname);
                if ('undefined' !== typeof dataLayer)
                    dataLayer.push({
                        'gapath': location.pathname
                    });
            }
        });

        $(window).bind("pageshow", function(event) {
            if (event.originalEvent.persisted) {
                window.location.reload()
            }
        });

        if (!legacy_ie()) {
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '133305523404320',
                    xfbml: true,
                    status: true,
                    cookie: true,
                    version: 'v2.11'
                });

                if ($('.fb-comments').length) {
                    FB.Event.subscribe('xfbml.render', function() {
                        $('.fb-comments').trigger('hasFinishedLoading');
                    });
                }
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/ja_JP/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        }
        if (!legacy_ie()) {
            $(window).bind('message', function(e) {
                if ('string' !== typeof e.originalEvent.data) return;
                var msg_args = e.originalEvent.data.split(/::/);
                if (msg_args[0] == 'resize_iframe')
                    resize_iframe(msg_args[1], msg_args[2]);
                else if (msg_args[0] == 'update_ga' && ga) {
                    ga('send', 'pageview', msg_args[1]);
                    if ('undefined' !== typeof dataLayer)
                        dataLayer.push({
                            'gapath': msg_args[1]
                        });
                } else if (msg_args[0] == 'restore_top') {
                    e.originalEvent.source.postMessage('top_restored::' + msg_args[1], msg_args[2]);
                } else if (msg_args[0] == 'popup_ready')
                    exec_for(msg_args[1]);
                else if (msg_args[0] == 'popup_to_top')
                    $('#fade').scrollTop(0);
            });
        }
    });
    //]]>
</script>
