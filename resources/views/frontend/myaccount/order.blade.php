@extends('layout.layout')

@section('content')
@include('inc/_header')

<div id="content" class="site-content" tabindex="-1" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <nav class="woocommerce-breadcrumb"><a href="https://electro.madrasthemes.com">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span><a href="https://electro.madrasthemes.com/my-account/">My Account</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Orders</nav>
        <div class="site-content-inner row" bis_skin_checked="1">
            <div id="primary" class="content-area" bis_skin_checked="1">
                <main id="main" class="site-main">
                    <article id="post-3854" class="post-3854 page type-page status-publish hentry">
                        <header class="entry-header">
                            <h1 class="entry-title">Orders</h1>
                        </header>
                        <div class="entry-content" bis_skin_checked="1">
                            <div class="woocommerce" bis_skin_checked="1">
                                <nav class="woocommerce-MyAccount-navigation">
                                    <ul>
                                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                                            <a href="{{ route("frontend.myaccount.dashboard") }}">Dashboard</a>
                                        </li>
                                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                            <a href="{{ route("frontend.myaccount.order") }}">Orders</a>
                                        </li>
                                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                            <a href="{{ route("frontend.myaccount.address") }}">Addresses</a>
                                        </li>
                                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                            <a href="{{ route("frontend.myaccount.accountdetail") }}">Account details</a>
                                        </li>
                                        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                            <a href="{{ route("logout") }}">Logout</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="woocommerce-MyAccount-content" bis_skin_checked="1">
                                    <div class="woocommerce-notices-wrapper" bis_skin_checked="1"></div>
                                    <div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info" bis_skin_checked="1">
                                        <a class="woocommerce-Button button" href="https://electro.madrasthemes.com/shop/">Browse products</a>
                                        No order has been made yet. </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </div>
</div>
<style>
.footer-product{
        display: none !important;
    }
    </style>
@endsection