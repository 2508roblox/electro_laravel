@extends('layout.layout')

@section('content')
@include('inc/_header')

<div id="content" class="site-content" tabindex="-1" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <nav class="woocommerce-breadcrumb"><a href="https://electro.madrasthemes.com">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span><a href="https://electro.madrasthemes.com/my-account/">My Account</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Account details</nav>
        <div class="site-content-inner row" bis_skin_checked="1">
            <div id="primary" class="content-area" bis_skin_checked="1">
                <main id="main" class="site-main">
                    <article id="post-3854" class="post-3854 page type-page status-publish hentry">
                        <header class="entry-header">
                            <h1 class="entry-title">Account details</h1>
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
                                    <form class="woocommerce-EditAccountForm edit-account" action="" method="post">
                                        <div class="clear" bis_skin_checked="1"></div>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="account_display_name">Name&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="{{ Auth::user()->name }}"> <span><em>This will be how your name will be displayed in the account section and in reviews</em></span>
                                        </p>
                                        <div class="clear" bis_skin_checked="1"></div>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="account_email">Email address&nbsp;<span class="required">*</span></label>
                                            <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="{{ Auth::user()->email }}">
                                        </p>
                                        <fieldset>
                                            <legend>Password change</legend>
                                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="password_current">Current password (leave blank to leave unchanged)</label>
                                                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off"><span class="show-password-input"></span></span>
                                            </p>
                                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="password_1">New  password (leave blank to leave unchanged)</label>
                                                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off"><span class="show-password-input"></span></span>
                                            </p>
                                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="password_2">Confirm new password</label>
                                                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off"><span class="show-password-input"></span></span>
                                            </p>
                                        </fieldset>
                                        <div class="clear" bis_skin_checked="1"></div>
                                        <p>
                                            <input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce" value="455e6c7e89"><input type="hidden" name="_wp_http_referer" value="/my-account/edit-account/"> <button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
                                            <input type="hidden" name="action" value="save_account_details">
                                        </p>
                                    </form>
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