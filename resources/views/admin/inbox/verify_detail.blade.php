@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body d-flex">
        <div class="sa-inbox flex-grow-1">
            <div class="sa-inbox__backdrop"></div>
            <div class="sa-inbox__sidebar" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -16px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 16px;"><button type="button"
                                        class="btn btn-primary sa-inbox__compose-button" data-bs-toggle="modal"
                                        data-bs-target="#composeModal">Compose</button>
                                    <ul class="sa-nav sa-nav--card">
                                        <li class="sa-nav__section">
                                            <ul class="sa-nav__menu">
                                                <li
                                                    class="sa-nav__menu-item sa-nav__menu-item--active sa-nav__menu-item--has-icon">
                                                    <a href="{{ route('admin.inbox', ['id' => 1]) }}"
                                                        class="sa-nav__link"><span class="sa-nav__icon"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-inbox">
                                                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12">
                                                                </polyline>
                                                                <path
                                                                    d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                                                </path>
                                                            </svg></span><span class="sa-nav__title">Verify
                                                            Email</span><span
                                                            class="sa-nav__badge badge badge-sa-pill badge-sa-primary">{{ $count }}</span></a>
                                                </li>
                                                <li class="sa-nav__menu-item sa-nav__menu-item sa-nav__menu-item--has-icon">
                                                    <a href="{{ route('admin.inbox.invoice', ['id' => 1]) }}"
                                                        class="sa-nav__link"><span class="sa-nav__icon"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-clock">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg></span><span class="sa-nav__title">Invoice</span><span
                                                            class="sa-nav__badge badge badge-sa-pill badge-sa-primary">{{ $count_invoice }}</span></a>
                                                </li>
                                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"><a href="#"
                                                        class="sa-nav__link"><span class="sa-nav__icon"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-bookmark">
                                                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z">
                                                                </path>
                                                            </svg></span><span class="sa-nav__title">Forget
                                                            Password</span><span
                                                            class="sa-nav__badge badge badge-sa-pill badge-sa-primary">2</span></a>
                                                </li>
                                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"><a href="#"
                                                        class="sa-nav__link"><span class="sa-nav__icon"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-send">
                                                                <line x1="22" y1="2" x2="11"
                                                                    y2="13"></line>
                                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                                            </svg></span><span class="sa-nav__title">RedParts</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sa-nav__section">
                                            <div class="sa-nav__section-title"><span>Labels</span></div>
                                            <ul class="sa-nav__menu">
                                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"><a href="#"
                                                        class="sa-nav__link"><span class="sa-nav__icon"
                                                            style="color:#fa3939"><svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" width="1em" height="1em"
                                                                fill="currentColor">
                                                                <path fill="currentColor"
                                                                    d="M15,10c0,2.76-2.24,5-5,5s-5-2.24-5-5s2.24-5,5-5S15,7.24,15,10z M10,3c-3.87,0-7,3.13-7,7s3.13,7,7,7s7-3.13,7-7 S13.87,3,10,3z">
                                                                </path>
                                                            </svg></span><span class="sa-nav__title">Extended
                                                            Support</span></a></li>
                                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"><a
                                                        href="#" class="sa-nav__link"><span class="sa-nav__icon"
                                                            style="color:#3562ff"><svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" width="1em" height="1em"
                                                                fill="currentColor">
                                                                <path fill="currentColor"
                                                                    d="M15,10c0,2.76-2.24,5-5,5s-5-2.24-5-5s2.24-5,5-5S15,7.24,15,10z M10,3c-3.87,0-7,3.13-7,7s3.13,7,7,7s7-3.13,7-7 S13.87,3,10,3z">
                                                                </path>
                                                            </svg></span><span class="sa-nav__title">Reviews</span></a>
                                                </li>
                                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"><a
                                                        href="#" class="sa-nav__link"><span class="sa-nav__icon"
                                                            style="color:#53a700"><svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" width="1em" height="1em"
                                                                fill="currentColor">
                                                                <path fill="currentColor"
                                                                    d="M15,10c0,2.76-2.24,5-5,5s-5-2.24-5-5s2.24-5,5-5S15,7.24,15,10z M10,3c-3.87,0-7,3.13-7,7s3.13,7,7,7s7-3.13,7-7 S13.87,3,10,3z">
                                                                </path>
                                                            </svg></span><span class="sa-nav__title">Typical
                                                            Solutions</span></a></li>
                                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"><a
                                                        href="#" class="sa-nav__link"><span class="sa-nav__icon"
                                                            style="color:#8939c8"><svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" width="1em" height="1em"
                                                                fill="currentColor">
                                                                <path fill="currentColor"
                                                                    d="M15,10c0,2.76-2.24,5-5,5s-5-2.24-5-5s2.24-5,5-5S15,7.24,15,10z M10,3c-3.87,0-7,3.13-7,7s3.13,7,7,7s7-3.13,7-7 S13.87,3,10,3z">
                                                                </path>
                                                            </svg></span><span class="sa-nav__title">Want
                                                            WordPress</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 409px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                </div>
            </div>
            <div class="sa-inbox__body">
                <div class="sa-inbox-toolbar"><a href="app-inbox-list.html"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 sa-inbox-toolbar__back" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="Back" aria-label="Back"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-left">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg></a><button type="button" class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex"
                        data-bs-toggle="tooltip" title="" data-bs-original-title="Archive"
                        aria-label="Archive"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                            <rect x="1" y="3" width="22" height="5"></rect>
                            <line x1="10" y1="12" x2="14" y2="12"></line>
                        </svg></button><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="Spam" aria-label="Spam"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-slash">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                        </svg></button><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="Delete" aria-label="Delete"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-trash">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg></button><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="Mark As Unread" aria-label="Mark As Unread"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg></button><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="Move To" aria-label="Move To"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-folder">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        </svg></button><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="Labels" aria-label="Labels"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-tag">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg></button><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="More" aria-label="More"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                        </svg></button>
                    <div class="flex-grow-1"></div>
                    <div class="sa-inbox-toolbar__text">7 of 512</div><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="Previous" aria-label="Previous"><svg xmlns="http://www.w3.org/2000/svg"
                            width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg></button><button type="button" class="btn btn-sa-muted btn-sa-icon fs-exact-20"
                        data-bs-toggle="tooltip" title="" data-bs-original-title="Next" aria-label="Next"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg></button><button type="button"
                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-lg-none me-n3" data-bs-toggle="tooltip"
                        title="" data-bs-original-title="More" aria-label="More"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                        </svg></button>
                    <div class="me-n2"></div>
                </div>
                <div class="sa-inbox-chat">
                    <div class="sa-inbox-chat__header">
                        <div class="sa-inbox-chat__subject">[Electro Ecommerce] Message sent via your Envato Market profile
                            from
                            kos9</div>
                        <div class="sa-inbox-chat__actions"><button type="button"
                                class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                                title="" data-bs-original-title="Print" aria-label="Print"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-printer">
                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                    </path>
                                    <rect x="6" y="14" width="12" height="8"></rect>
                                </svg></button><button type="button"
                                class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                                title="" data-bs-original-title="Mark As Important"
                                aria-label="Mark As Important"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                    height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg></button><button type="button"
                                class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-lg-flex" data-bs-toggle="tooltip"
                                title="" data-bs-original-title="Expand" aria-label="Expand"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-code">
                                    <polyline points="16 18 22 12 16 6"></polyline>
                                    <polyline points="8 6 2 12 8 18"></polyline>
                                </svg></button><button type="button"
                                class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-lg-none me-n3" data-bs-toggle="tooltip"
                                title="" data-bs-original-title="More" aria-label="More"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg></button>
                            <div class="me-n2"></div>
                        </div>
                        <div class="sa-inbox-chat__labels"><span class="badge badge-sa-primary">Verify Email /
                                HTML</span><span class="badge badge-sa-danger">Support Request</span></div>
                    </div>
                    <div class="sa-inbox-chat__list">
                        <div class="sa-inbox-chat__item sa-inbox-chat__item--expanded">
                            <div class="sa-inbox-chat__item-header">
                                <div class="sa-inbox-chat__item-avatar">
                                    <div class="sa-symbol sa-symbol--shape--circle"><img
                                            src="https://lh3.googleusercontent.com/a-/ALV-UjVJc1FSlSSFuraCofryN_3Fx-YLOupjsStI8uEm_x7rNsU=s40-p"
                                            width="64" height="64" alt=""></div>
                                </div>
                                <div class="sa-inbox-chat__item-author">Electro Ecommerce</div>
                                <div class="sa-inbox-chat__item-date">{{ $user->created_at }}</div>
                                <div class="sa-inbox-chat__item-actions"><button type="button"
                                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 d-none d-md-flex"
                                        data-bs-toggle="tooltip" title="" data-bs-original-title="Reply"
                                        aria-label="Reply"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                            height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-corner-up-left">
                                            <polyline points="9 14 4 9 9 4"></polyline>
                                            <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                        </svg></button><button type="button"
                                        class="btn btn-sa-muted btn-sa-icon fs-exact-20 me-n3" data-bs-toggle="tooltip"
                                        title="" data-bs-original-title="More" aria-label="More"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg></button></div>
                                <div class="sa-inbox-chat__item-meta"><a href="#">To {{ $user->email }}</a></div>
                                <div class="sa-inbox-chat__item-excerpt">Hi Kos9, We wanted to let you know that your
                                    payout for earnings up until the end of July 2021 has been calculated. Your payout will
                                    be $320.00. Your payout will be processed as part of our normal schedule later this
                                    month. You will receive an email when your payout has been processed.</div>
                            </div>
                            <div class="">
                                <div class="aHl"></div>
                                <div id=":16l" tabindex="-1"></div>
                                <div id=":1j3" class="ii gt adO"
                                    jslog="20277; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc4MjQzNjkwNjA4ODA4ODE4MSJd; 4:WyIjbXNnLWY6MTc4MjQzNzM1Mjg0NDQxODc0MCJd">
                                    <div id=":16r" class="a3s aiL ">
                                        <div
                                            style="font-family:Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                                            <div class="adM">
                                            </div>
                                            <div style="margin:50px auto;width:70%;padding:20px 0"><span class="im">
                                                    <div class="adM">
                                                    </div>
                                                    <div style="border-bottom:1px solid #eee">
                                                        <div class="adM">
                                                        </div><a
                                                            style="font-size:1.4em;color:#00466a;text-decoration:none;font-weight:600">Electro</a>
                                                    </div>
                                                    <p style="font-size:1.1em">Hi,</p>
                                                    <p>Thank you for choosing Electro online shopping. Use the following OTP
                                                        to complete your Sign Up procedures. OTP is valid for 5 minutes</p>
                                                </span>
                                                <h2
                                                    style="background:#00466a;margin:0 auto;width:max-content;padding:0 10px;color:#fff;border-radius:4px">
                                                    {{ $user->otp }}</h2>
                                                <div class="yj6qo ajU">
                                                    <div id=":15s" class="ajR" role="button" tabindex="0"
                                                        data-tooltip="Hiển thị nội dung bị rút gọn"
                                                        aria-label="Hiển thị nội dung bị rút gọn" aria-expanded="false">
                                                        <img class="ajT"
                                                            src="//ssl.gstatic.com/ui/v1/icons/mail/images/cleardot.gif">
                                                    </div>
                                                </div>
                                                <div class="adL">
                                                    <div class="adm">
                                                        <div id="q_33" class="ajR h4">
                                                            <div class="ajT"></div>
                                                        </div>
                                                    </div>
                                                    <div class="h5">
                                                        <p style="font-size:0.9em">Regards,<br>Electro online shopping</p>
                                                        <hr style="border:none;border-top:1px solid #eee">
                                                        <div
                                                            style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                                                            <p>Giang Tran Inc</p>
                                                            <p>1600 Amphitheatre Parkway</p>
                                                            <p>California</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="adL">
                                            </div>
                                        </div>
                                        <div class="adL">

                                        </div>
                                    </div>
                                </div>
                                <div id=":159" class="ii gt" style="display:none">
                                    <div id=":170" class="a3s aiL "></div>
                                </div>
                                <div class="hi"></div>
                                <div class="WhmR8e" data-hash="0"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="composeModal" tabindex="-1" aria-labelledby="composeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form class="modal-content">
                    <div class="modal-header px-5">
                        <h5 class="modal-title" id="composeModalLabel">New message</h5><button type="button"
                            class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5">
                        <div class="mb-4"><label for="form-compose/email" class="visually-hidden">Email
                                address</label><input type="email" class="form-control" id="form-compose/email"
                                placeholder="{{ Auth::user()->email }}" readonly=""></div>
                        <div class="mb-4 d-flex align-items-center"><label for="form-compose/to"
                                class="visually-hidden">To</label><input type="email" class="form-control"
                                id="form-compose/to" placeholder="To">
                            <div class="ms-4"><a href="#" class="text-muted fs-exact-13">CC</a></div>
                            <div class="ms-4"><a href="#" class="text-muted fs-exact-13">BCC</a></div>
                        </div>
                        <div class="mb-4"><label for="form-compose/subject"
                                class="visually-hidden">Subject</label><input type="text" class="form-control"
                                id="form-compose/subject" placeholder="Subject"></div>
                        <div class="mb-4">
                            <textarea class="sa-quill-control form-control sa-quill-control--ready" rows="8" placeholder="Message"></textarea>
                            <div class="sa-quill" translate="no">
                                <div class="ql-toolbar ql-snow"><span class="ql-formats"><button type="button"
                                            class="ql-bold"><svg viewBox="0 0 18 18">
                                                <path class="ql-stroke"
                                                    d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                                </path>
                                                <path class="ql-stroke"
                                                    d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                                </path>
                                            </svg></button><button type="button" class="ql-italic"><svg
                                                viewBox="0 0 18 18">
                                                <line class="ql-stroke" x1="7" x2="13" y1="4"
                                                    y2="4"></line>
                                                <line class="ql-stroke" x1="5" x2="11" y1="14"
                                                    y2="14"></line>
                                                <line class="ql-stroke" x1="8" x2="10" y1="14"
                                                    y2="4"></line>
                                            </svg></button><button type="button" class="ql-underline"><svg
                                                viewBox="0 0 18 18">
                                                <path class="ql-stroke"
                                                    d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                                                <rect class="ql-fill" height="1" rx="0.5" ry="0.5"
                                                    width="12" x="3" y="15"></rect>
                                            </svg></button><button type="button" class="ql-strike"><svg
                                                viewBox="0 0 18 18">
                                                <line class="ql-stroke ql-thin" x1="15.5" x2="2.5"
                                                    y1="8.5" y2="9.5"></line>
                                                <path class="ql-fill"
                                                    d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z">
                                                </path>
                                                <path class="ql-fill"
                                                    d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z">
                                                </path>
                                            </svg></button></span><span class="ql-formats"><button type="button"
                                            class="ql-blockquote"><svg viewBox="0 0 18 18">
                                                <rect class="ql-fill ql-stroke" height="3" width="3" x="4"
                                                    y="5"></rect>
                                                <rect class="ql-fill ql-stroke" height="3" width="3" x="11"
                                                    y="5"></rect>
                                                <path class="ql-even ql-fill ql-stroke" d="M7,8c0,4.031-3,5-3,5"></path>
                                                <path class="ql-even ql-fill ql-stroke" d="M14,8c0,4.031-3,5-3,5"></path>
                                            </svg></button><button type="button" class="ql-code-block"><svg
                                                viewBox="0 0 18 18">
                                                <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline>
                                                <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline>
                                                <line class="ql-stroke" x1="10" x2="8" y1="5"
                                                    y2="13"></line>
                                            </svg></button></span><span class="ql-formats"><button type="button"
                                            class="ql-header" value="1"><svg viewBox="0 0 18 18">
                                                <path class="ql-fill"
                                                    d="M10,4V14a1,1,0,0,1-2,0V10H3v4a1,1,0,0,1-2,0V4A1,1,0,0,1,3,4V8H8V4a1,1,0,0,1,2,0Zm6.06787,9.209H14.98975V7.59863a.54085.54085,0,0,0-.605-.60547h-.62744a1.01119,1.01119,0,0,0-.748.29688L11.645,8.56641a.5435.5435,0,0,0-.022.8584l.28613.30762a.53861.53861,0,0,0,.84717.0332l.09912-.08789a1.2137,1.2137,0,0,0,.2417-.35254h.02246s-.01123.30859-.01123.60547V13.209H12.041a.54085.54085,0,0,0-.605.60547v.43945a.54085.54085,0,0,0,.605.60547h4.02686a.54085.54085,0,0,0,.605-.60547v-.43945A.54085.54085,0,0,0,16.06787,13.209Z">
                                                </path>
                                            </svg></button><button type="button" class="ql-header" value="2"><svg
                                                viewBox="0 0 18 18">
                                                <path class="ql-fill"
                                                    d="M16.73975,13.81445v.43945a.54085.54085,0,0,1-.605.60547H11.855a.58392.58392,0,0,1-.64893-.60547V14.0127c0-2.90527,3.39941-3.42187,3.39941-4.55469a.77675.77675,0,0,0-.84717-.78125,1.17684,1.17684,0,0,0-.83594.38477c-.2749.26367-.561.374-.85791.13184l-.4292-.34082c-.30811-.24219-.38525-.51758-.1543-.81445a2.97155,2.97155,0,0,1,2.45361-1.17676,2.45393,2.45393,0,0,1,2.68408,2.40918c0,2.45312-3.1792,2.92676-3.27832,3.93848h2.79443A.54085.54085,0,0,1,16.73975,13.81445ZM9,3A.99974.99974,0,0,0,8,4V8H3V4A1,1,0,0,0,1,4V14a1,1,0,0,0,2,0V10H8v4a1,1,0,0,0,2,0V4A.99974.99974,0,0,0,9,3Z">
                                                </path>
                                            </svg></button></span><span class="ql-formats"><button type="button"
                                            class="ql-list" value="ordered"><svg viewBox="0 0 18 18">
                                                <line class="ql-stroke" x1="7" x2="15" y1="4"
                                                    y2="4"></line>
                                                <line class="ql-stroke" x1="7" x2="15" y1="9"
                                                    y2="9"></line>
                                                <line class="ql-stroke" x1="7" x2="15" y1="14"
                                                    y2="14"></line>
                                                <line class="ql-stroke ql-thin" x1="2.5" x2="4.5"
                                                    y1="5.5" y2="5.5"></line>
                                                <path class="ql-fill"
                                                    d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z">
                                                </path>
                                                <path class="ql-stroke ql-thin"
                                                    d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156">
                                                </path>
                                                <path class="ql-stroke ql-thin"
                                                    d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109">
                                                </path>
                                            </svg></button><button type="button" class="ql-list" value="bullet"><svg
                                                viewBox="0 0 18 18">
                                                <line class="ql-stroke" x1="6" x2="15" y1="4"
                                                    y2="4"></line>
                                                <line class="ql-stroke" x1="6" x2="15" y1="9"
                                                    y2="9"></line>
                                                <line class="ql-stroke" x1="6" x2="15" y1="14"
                                                    y2="14"></line>
                                                <line class="ql-stroke" x1="3" x2="3" y1="4"
                                                    y2="4"></line>
                                                <line class="ql-stroke" x1="3" x2="3" y1="9"
                                                    y2="9"></line>
                                                <line class="ql-stroke" x1="3" x2="3" y1="14"
                                                    y2="14"></line>
                                            </svg></button></span><span class="ql-formats"><button type="button"
                                            class="ql-script" value="sub"><svg viewBox="0 0 18 18">
                                                <path class="ql-fill"
                                                    d="M15.5,15H13.861a3.858,3.858,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.921,1.921,0,0,0,12.021,11.7a0.50013,0.50013,0,1,0,.957.291h0a0.914,0.914,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.076-1.16971,1.86982-1.93971,2.43082A1.45639,1.45639,0,0,0,12,15.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,15Z">
                                                </path>
                                                <path class="ql-fill"
                                                    d="M9.65,5.241a1,1,0,0,0-1.409.108L6,7.964,3.759,5.349A1,1,0,0,0,2.192,6.59178Q2.21541,6.6213,2.241,6.649L4.684,9.5,2.241,12.35A1,1,0,0,0,3.71,13.70722q0.02557-.02768.049-0.05722L6,11.036,8.241,13.65a1,1,0,1,0,1.567-1.24277Q9.78459,12.3777,9.759,12.35L7.316,9.5,9.759,6.651A1,1,0,0,0,9.65,5.241Z">
                                                </path>
                                            </svg></button><button type="button" class="ql-script" value="super"><svg
                                                viewBox="0 0 18 18">
                                                <path class="ql-fill"
                                                    d="M15.5,7H13.861a4.015,4.015,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.922,1.922,0,0,0,12.021,3.7a0.5,0.5,0,1,0,.957.291,0.917,0.917,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.077-1.164,1.925-1.934,2.486A1.423,1.423,0,0,0,12,7.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,7Z">
                                                </path>
                                                <path class="ql-fill"
                                                    d="M9.651,5.241a1,1,0,0,0-1.41.108L6,7.964,3.759,5.349a1,1,0,1,0-1.519,1.3L4.683,9.5,2.241,12.35a1,1,0,1,0,1.519,1.3L6,11.036,8.241,13.65a1,1,0,0,0,1.519-1.3L7.317,9.5,9.759,6.651A1,1,0,0,0,9.651,5.241Z">
                                                </path>
                                            </svg></button></span><span class="ql-formats"><button type="button"
                                            class="ql-indent" value="-1"><svg viewBox="0 0 18 18">
                                                <line class="ql-stroke" x1="3" x2="15" y1="14"
                                                    y2="14"></line>
                                                <line class="ql-stroke" x1="3" x2="15" y1="4"
                                                    y2="4"></line>
                                                <line class="ql-stroke" x1="9" x2="15" y1="9"
                                                    y2="9"></line>
                                                <polyline class="ql-stroke" points="5 7 5 11 3 9 5 7"></polyline>
                                            </svg></button><button type="button" class="ql-indent" value="+1"><svg
                                                viewBox="0 0 18 18">
                                                <line class="ql-stroke" x1="3" x2="15" y1="14"
                                                    y2="14"></line>
                                                <line class="ql-stroke" x1="3" x2="15" y1="4"
                                                    y2="4"></line>
                                                <line class="ql-stroke" x1="9" x2="15" y1="9"
                                                    y2="9"></line>
                                                <polyline class="ql-fill ql-stroke" points="3 7 3 11 5 9 3 7">
                                                </polyline>
                                            </svg></button></span><span class="ql-formats"><button type="button"
                                            class="ql-direction" value="rtl"><svg viewBox="0 0 18 18">
                                                <polygon class="ql-stroke ql-fill" points="3 11 5 9 3 7 3 11"></polygon>
                                                <line class="ql-stroke ql-fill" x1="15" x2="11"
                                                    y1="4" y2="4"></line>
                                                <path class="ql-fill" d="M11,3a3,3,0,0,0,0,6h1V3H11Z"></path>
                                                <rect class="ql-fill" height="11" width="1" x="11" y="4">
                                                </rect>
                                                <rect class="ql-fill" height="11" width="1" x="13" y="4">
                                                </rect>
                                            </svg><svg viewBox="0 0 18 18">
                                                <polygon class="ql-stroke ql-fill" points="15 12 13 10 15 8 15 12">
                                                </polygon>
                                                <line class="ql-stroke ql-fill" x1="9" x2="5"
                                                    y1="4" y2="4"></line>
                                                <path class="ql-fill" d="M5,3A3,3,0,0,0,5,9H6V3H5Z"></path>
                                                <rect class="ql-fill" height="11" width="1" x="5" y="4">
                                                </rect>
                                                <rect class="ql-fill" height="11" width="1" x="7" y="4">
                                                </rect>
                                            </svg></button></span><span class="ql-formats"><span
                                            class="ql-size ql-picker"><span class="ql-picker-label" tabindex="0"
                                                role="button" aria-expanded="false"
                                                aria-controls="ql-picker-options-6"><svg viewBox="0 0 18 18">
                                                    <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                                    <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                                </svg></span><span class="ql-picker-options" aria-hidden="true"
                                                tabindex="-1" id="ql-picker-options-6"><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="small"></span><span
                                                    tabindex="0" role="button"
                                                    class="ql-picker-item ql-selected"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="large"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="huge"></span></span></span><select class="ql-size"
                                            style="display: none;">
                                            <option value="small"></option>
                                            <option selected="selected"></option>
                                            <option value="large"></option>
                                            <option value="huge"></option>
                                        </select></span><span class="ql-formats"><span class="ql-header ql-picker"><span
                                                class="ql-picker-label" tabindex="0" role="button"
                                                aria-expanded="false" aria-controls="ql-picker-options-7"><svg
                                                    viewBox="0 0 18 18">
                                                    <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                                    <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                                </svg></span><span class="ql-picker-options" aria-hidden="true"
                                                tabindex="-1" id="ql-picker-options-7"><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="1"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="2"></span><span tabindex="0" role="button"
                                                    class="ql-picker-item" data-value="3"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="4"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="5"></span><span tabindex="0" role="button"
                                                    class="ql-picker-item" data-value="6"></span><span tabindex="0"
                                                    role="button"
                                                    class="ql-picker-item ql-selected"></span></span></span><select
                                            class="ql-header" style="display: none;">
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                            <option value="4"></option>
                                            <option value="5"></option>
                                            <option value="6"></option>
                                            <option selected="selected"></option>
                                        </select></span><span class="ql-formats"><span
                                            class="ql-color ql-picker ql-color-picker"><span class="ql-picker-label"
                                                tabindex="0" role="button" aria-expanded="false"
                                                aria-controls="ql-picker-options-8"><svg viewBox="0 0 18 18">
                                                    <line class="ql-color-label ql-stroke ql-transparent" x1="3"
                                                        x2="15" y1="15" y2="15"></line>
                                                    <polyline class="ql-stroke" points="5.5 11 9 3 12.5 11"></polyline>
                                                    <line class="ql-stroke" x1="11.63" x2="6.38" y1="9"
                                                        y2="9"></line>
                                                </svg></span><span class="ql-picker-options" aria-hidden="true"
                                                tabindex="-1" id="ql-picker-options-8"><span tabindex="0"
                                                    role="button"
                                                    class="ql-picker-item ql-selected ql-primary"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#e60000"
                                                    style="background-color: rgb(230, 0, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item ql-primary" data-value="#ff9900"
                                                    style="background-color: rgb(255, 153, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#ffff00"
                                                    style="background-color: rgb(255, 255, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#008a00"
                                                    style="background-color: rgb(0, 138, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item ql-primary" data-value="#0066cc"
                                                    style="background-color: rgb(0, 102, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#9933ff"
                                                    style="background-color: rgb(153, 51, 255);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffffff"
                                                    style="background-color: rgb(255, 255, 255);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#facccc"
                                                    style="background-color: rgb(250, 204, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffebcc"
                                                    style="background-color: rgb(255, 235, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffffcc"
                                                    style="background-color: rgb(255, 255, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#cce8cc"
                                                    style="background-color: rgb(204, 232, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#cce0f5"
                                                    style="background-color: rgb(204, 224, 245);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ebd6ff"
                                                    style="background-color: rgb(235, 214, 255);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#bbbbbb"
                                                    style="background-color: rgb(187, 187, 187);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#f06666"
                                                    style="background-color: rgb(240, 102, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffc266"
                                                    style="background-color: rgb(255, 194, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffff66"
                                                    style="background-color: rgb(255, 255, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#66b966"
                                                    style="background-color: rgb(102, 185, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#66a3e0"
                                                    style="background-color: rgb(102, 163, 224);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#c285ff"
                                                    style="background-color: rgb(194, 133, 255);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#888888"
                                                    style="background-color: rgb(136, 136, 136);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#a10000"
                                                    style="background-color: rgb(161, 0, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#b26b00"
                                                    style="background-color: rgb(178, 107, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#b2b200"
                                                    style="background-color: rgb(178, 178, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#006100"
                                                    style="background-color: rgb(0, 97, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="#0047b2"
                                                    style="background-color: rgb(0, 71, 178);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#6b24b2"
                                                    style="background-color: rgb(107, 36, 178);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#444444"
                                                    style="background-color: rgb(68, 68, 68);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#5c0000"
                                                    style="background-color: rgb(92, 0, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="#663d00"
                                                    style="background-color: rgb(102, 61, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#666600"
                                                    style="background-color: rgb(102, 102, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#003700"
                                                    style="background-color: rgb(0, 55, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="#002966"
                                                    style="background-color: rgb(0, 41, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#3d1466"
                                                    style="background-color: rgb(61, 20, 102);"></span></span></span><select
                                            class="ql-color" style="display: none;">
                                            <option selected="selected"></option>
                                            <option value="#e60000"></option>
                                            <option value="#ff9900"></option>
                                            <option value="#ffff00"></option>
                                            <option value="#008a00"></option>
                                            <option value="#0066cc"></option>
                                            <option value="#9933ff"></option>
                                            <option value="#ffffff"></option>
                                            <option value="#facccc"></option>
                                            <option value="#ffebcc"></option>
                                            <option value="#ffffcc"></option>
                                            <option value="#cce8cc"></option>
                                            <option value="#cce0f5"></option>
                                            <option value="#ebd6ff"></option>
                                            <option value="#bbbbbb"></option>
                                            <option value="#f06666"></option>
                                            <option value="#ffc266"></option>
                                            <option value="#ffff66"></option>
                                            <option value="#66b966"></option>
                                            <option value="#66a3e0"></option>
                                            <option value="#c285ff"></option>
                                            <option value="#888888"></option>
                                            <option value="#a10000"></option>
                                            <option value="#b26b00"></option>
                                            <option value="#b2b200"></option>
                                            <option value="#006100"></option>
                                            <option value="#0047b2"></option>
                                            <option value="#6b24b2"></option>
                                            <option value="#444444"></option>
                                            <option value="#5c0000"></option>
                                            <option value="#663d00"></option>
                                            <option value="#666600"></option>
                                            <option value="#003700"></option>
                                            <option value="#002966"></option>
                                            <option value="#3d1466"></option>
                                        </select><span class="ql-background ql-picker ql-color-picker"><span
                                                class="ql-picker-label" tabindex="0" role="button"
                                                aria-expanded="false" aria-controls="ql-picker-options-9"><svg
                                                    viewBox="0 0 18 18">
                                                    <g class="ql-fill ql-color-label">
                                                        <polygon points="6 6.868 6 6 5 6 5 7 5.942 7 6 6.868"></polygon>
                                                        <rect height="1" width="1" x="4" y="4"></rect>
                                                        <polygon points="6.817 5 6 5 6 6 6.38 6 6.817 5"></polygon>
                                                        <rect height="1" width="1" x="2" y="6"></rect>
                                                        <rect height="1" width="1" x="3" y="5"></rect>
                                                        <rect height="1" width="1" x="4" y="7"></rect>
                                                        <polygon points="4 11.439 4 11 3 11 3 12 3.755 12 4 11.439">
                                                        </polygon>
                                                        <rect height="1" width="1" x="2" y="12"></rect>
                                                        <rect height="1" width="1" x="2" y="9"></rect>
                                                        <rect height="1" width="1" x="2" y="15"></rect>
                                                        <polygon points="4.63 10 4 10 4 11 4.192 11 4.63 10"></polygon>
                                                        <rect height="1" width="1" x="3" y="8"></rect>
                                                        <path
                                                            d="M10.832,4.2L11,4.582V4H10.708A1.948,1.948,0,0,1,10.832,4.2Z">
                                                        </path>
                                                        <path d="M7,4.582L7.168,4.2A1.929,1.929,0,0,1,7.292,4H7V4.582Z">
                                                        </path>
                                                        <path d="M8,13H7.683l-0.351.8a1.933,1.933,0,0,1-.124.2H8V13Z">
                                                        </path>
                                                        <rect height="1" width="1" x="12" y="2"></rect>
                                                        <rect height="1" width="1" x="11" y="3"></rect>
                                                        <path d="M9,3H8V3.282A1.985,1.985,0,0,1,9,3Z"></path>
                                                        <rect height="1" width="1" x="2" y="3"></rect>
                                                        <rect height="1" width="1" x="6" y="2"></rect>
                                                        <rect height="1" width="1" x="3" y="2"></rect>
                                                        <rect height="1" width="1" x="5" y="3"></rect>
                                                        <rect height="1" width="1" x="9" y="2"></rect>
                                                        <rect height="1" width="1" x="15" y="14"></rect>
                                                        <polygon
                                                            points="13.447 10.174 13.469 10.225 13.472 10.232 13.808 11 14 11 14 10 13.37 10 13.447 10.174">
                                                        </polygon>
                                                        <rect height="1" width="1" x="13" y="7"></rect>
                                                        <rect height="1" width="1" x="15" y="5"></rect>
                                                        <rect height="1" width="1" x="14" y="6"></rect>
                                                        <rect height="1" width="1" x="15" y="8"></rect>
                                                        <rect height="1" width="1" x="14" y="9"></rect>
                                                        <path d="M3.775,14H3v1H4V14.314A1.97,1.97,0,0,1,3.775,14Z"></path>
                                                        <rect height="1" width="1" x="14" y="3"></rect>
                                                        <polygon points="12 6.868 12 6 11.62 6 12 6.868"></polygon>
                                                        <rect height="1" width="1" x="15" y="2"></rect>
                                                        <rect height="1" width="1" x="12" y="5"></rect>
                                                        <rect height="1" width="1" x="13" y="4"></rect>
                                                        <polygon points="12.933 9 13 9 13 8 12.495 8 12.933 9"></polygon>
                                                        <rect height="1" width="1" x="9" y="14"></rect>
                                                        <rect height="1" width="1" x="8" y="15"></rect>
                                                        <path d="M6,14.926V15H7V14.316A1.993,1.993,0,0,1,6,14.926Z"></path>
                                                        <rect height="1" width="1" x="5" y="15"></rect>
                                                        <path
                                                            d="M10.668,13.8L10.317,13H10v1h0.792A1.947,1.947,0,0,1,10.668,13.8Z">
                                                        </path>
                                                        <rect height="1" width="1" x="11" y="15"></rect>
                                                        <path d="M14.332,12.2a1.99,1.99,0,0,1,.166.8H15V12H14.245Z"></path>
                                                        <rect height="1" width="1" x="14" y="15"></rect>
                                                        <rect height="1" width="1" x="15" y="11"></rect>
                                                    </g>
                                                    <polyline class="ql-stroke" points="5.5 13 9 5 12.5 13"></polyline>
                                                    <line class="ql-stroke" x1="11.63" x2="6.38"
                                                        y1="11" y2="11"></line>
                                                </svg></span><span class="ql-picker-options" aria-hidden="true"
                                                tabindex="-1" id="ql-picker-options-9"><span tabindex="0"
                                                    role="button" class="ql-picker-item ql-primary"
                                                    data-value="#000000"
                                                    style="background-color: rgb(0, 0, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item ql-primary"
                                                    data-value="#e60000"
                                                    style="background-color: rgb(230, 0, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#ff9900"
                                                    style="background-color: rgb(255, 153, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#ffff00"
                                                    style="background-color: rgb(255, 255, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#008a00"
                                                    style="background-color: rgb(0, 138, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#0066cc"
                                                    style="background-color: rgb(0, 102, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item ql-primary"
                                                    data-value="#9933ff"
                                                    style="background-color: rgb(153, 51, 255);"></span><span
                                                    tabindex="0" role="button"
                                                    class="ql-picker-item ql-selected"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="#facccc"
                                                    style="background-color: rgb(250, 204, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffebcc"
                                                    style="background-color: rgb(255, 235, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffffcc"
                                                    style="background-color: rgb(255, 255, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#cce8cc"
                                                    style="background-color: rgb(204, 232, 204);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#cce0f5"
                                                    style="background-color: rgb(204, 224, 245);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ebd6ff"
                                                    style="background-color: rgb(235, 214, 255);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#bbbbbb"
                                                    style="background-color: rgb(187, 187, 187);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#f06666"
                                                    style="background-color: rgb(240, 102, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffc266"
                                                    style="background-color: rgb(255, 194, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#ffff66"
                                                    style="background-color: rgb(255, 255, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#66b966"
                                                    style="background-color: rgb(102, 185, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#66a3e0"
                                                    style="background-color: rgb(102, 163, 224);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#c285ff"
                                                    style="background-color: rgb(194, 133, 255);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#888888"
                                                    style="background-color: rgb(136, 136, 136);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#a10000"
                                                    style="background-color: rgb(161, 0, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#b26b00"
                                                    style="background-color: rgb(178, 107, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#b2b200"
                                                    style="background-color: rgb(178, 178, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#006100"
                                                    style="background-color: rgb(0, 97, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="#0047b2"
                                                    style="background-color: rgb(0, 71, 178);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#6b24b2"
                                                    style="background-color: rgb(107, 36, 178);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#444444"
                                                    style="background-color: rgb(68, 68, 68);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#5c0000"
                                                    style="background-color: rgb(92, 0, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="#663d00"
                                                    style="background-color: rgb(102, 61, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#666600"
                                                    style="background-color: rgb(102, 102, 0);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#003700"
                                                    style="background-color: rgb(0, 55, 0);"></span><span tabindex="0"
                                                    role="button" class="ql-picker-item" data-value="#002966"
                                                    style="background-color: rgb(0, 41, 102);"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="#3d1466"
                                                    style="background-color: rgb(61, 20, 102);"></span></span></span><select
                                            class="ql-background" style="display: none;">
                                            <option value="#000000"></option>
                                            <option value="#e60000"></option>
                                            <option value="#ff9900"></option>
                                            <option value="#ffff00"></option>
                                            <option value="#008a00"></option>
                                            <option value="#0066cc"></option>
                                            <option value="#9933ff"></option>
                                            <option selected="selected"></option>
                                            <option value="#facccc"></option>
                                            <option value="#ffebcc"></option>
                                            <option value="#ffffcc"></option>
                                            <option value="#cce8cc"></option>
                                            <option value="#cce0f5"></option>
                                            <option value="#ebd6ff"></option>
                                            <option value="#bbbbbb"></option>
                                            <option value="#f06666"></option>
                                            <option value="#ffc266"></option>
                                            <option value="#ffff66"></option>
                                            <option value="#66b966"></option>
                                            <option value="#66a3e0"></option>
                                            <option value="#c285ff"></option>
                                            <option value="#888888"></option>
                                            <option value="#a10000"></option>
                                            <option value="#b26b00"></option>
                                            <option value="#b2b200"></option>
                                            <option value="#006100"></option>
                                            <option value="#0047b2"></option>
                                            <option value="#6b24b2"></option>
                                            <option value="#444444"></option>
                                            <option value="#5c0000"></option>
                                            <option value="#663d00"></option>
                                            <option value="#666600"></option>
                                            <option value="#003700"></option>
                                            <option value="#002966"></option>
                                            <option value="#3d1466"></option>
                                        </select></span><span class="ql-formats"><span class="ql-font ql-picker"><span
                                                class="ql-picker-label" tabindex="0" role="button"
                                                aria-expanded="false" aria-controls="ql-picker-options-10"><svg
                                                    viewBox="0 0 18 18">
                                                    <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                                    <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                                </svg></span><span class="ql-picker-options" aria-hidden="true"
                                                tabindex="-1" id="ql-picker-options-10"><span tabindex="0"
                                                    role="button" class="ql-picker-item ql-selected"></span><span
                                                    tabindex="0" role="button" class="ql-picker-item"
                                                    data-value="serif"></span><span tabindex="0" role="button"
                                                    class="ql-picker-item"
                                                    data-value="monospace"></span></span></span><select class="ql-font"
                                            style="display: none;">
                                            <option selected="selected"></option>
                                            <option value="serif"></option>
                                            <option value="monospace"></option>
                                        </select></span><span class="ql-formats"><span
                                            class="ql-align ql-picker ql-icon-picker"><span class="ql-picker-label"
                                                tabindex="0" role="button" aria-expanded="false"
                                                aria-controls="ql-picker-options-11"><svg viewBox="0 0 18 18">
                                                    <line class="ql-stroke" x1="3" x2="15"
                                                        y1="9" y2="9"></line>
                                                    <line class="ql-stroke" x1="3" x2="13"
                                                        y1="14" y2="14"></line>
                                                    <line class="ql-stroke" x1="3" x2="9"
                                                        y1="4" y2="4"></line>
                                                </svg></span><span class="ql-picker-options" aria-hidden="true"
                                                tabindex="-1" id="ql-picker-options-11"><span tabindex="0"
                                                    role="button" class="ql-picker-item ql-selected"><svg
                                                        viewBox="0 0 18 18">
                                                        <line class="ql-stroke" x1="3" x2="15"
                                                            y1="9" y2="9"></line>
                                                        <line class="ql-stroke" x1="3" x2="13"
                                                            y1="14" y2="14"></line>
                                                        <line class="ql-stroke" x1="3" x2="9"
                                                            y1="4" y2="4"></line>
                                                    </svg></span><span tabindex="0" role="button"
                                                    class="ql-picker-item" data-value="center"><svg
                                                        viewBox="0 0 18 18">
                                                        <line class="ql-stroke" x1="15" x2="3"
                                                            y1="9" y2="9"></line>
                                                        <line class="ql-stroke" x1="14" x2="4"
                                                            y1="14" y2="14"></line>
                                                        <line class="ql-stroke" x1="12" x2="6"
                                                            y1="4" y2="4"></line>
                                                    </svg></span><span tabindex="0" role="button"
                                                    class="ql-picker-item" data-value="right"><svg
                                                        viewBox="0 0 18 18">
                                                        <line class="ql-stroke" x1="15" x2="3"
                                                            y1="9" y2="9"></line>
                                                        <line class="ql-stroke" x1="15" x2="5"
                                                            y1="14" y2="14"></line>
                                                        <line class="ql-stroke" x1="15" x2="9"
                                                            y1="4" y2="4"></line>
                                                    </svg></span><span tabindex="0" role="button"
                                                    class="ql-picker-item" data-value="justify"><svg
                                                        viewBox="0 0 18 18">
                                                        <line class="ql-stroke" x1="15" x2="3"
                                                            y1="9" y2="9"></line>
                                                        <line class="ql-stroke" x1="15" x2="3"
                                                            y1="14" y2="14"></line>
                                                        <line class="ql-stroke" x1="15" x2="3"
                                                            y1="4" y2="4"></line>
                                                    </svg></span></span></span><select class="ql-align"
                                            style="display: none;">
                                            <option selected="selected"></option>
                                            <option value="center"></option>
                                            <option value="right"></option>
                                            <option value="justify"></option>
                                        </select></span><span class="ql-formats"><button type="button"
                                            class="ql-clean"><svg class="" viewBox="0 0 18 18">
                                                <line class="ql-stroke" x1="5" x2="13" y1="3"
                                                    y2="3"></line>
                                                <line class="ql-stroke" x1="6" x2="9.35" y1="12"
                                                    y2="3"></line>
                                                <line class="ql-stroke" x1="11" x2="15" y1="11"
                                                    y2="15"></line>
                                                <line class="ql-stroke" x1="15" x2="11" y1="11"
                                                    y2="15"></line>
                                                <rect class="ql-fill" height="1" rx="0.5" ry="0.5"
                                                    width="7" x="2" y="14"></rect>
                                            </svg></button></span></div>
                                <div class="ql-container ql-snow">
                                    <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true">
                                        <p><br></p>
                                    </div>
                                    <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                    <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer"
                                            target="_blank" href="about:blank"></a><input type="text"
                                            data-formula="e=mc^2" data-link="https://quilljs.com"
                                            data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-auto col-12"><button type="submit"
                                    class="btn btn-primary w-100">Send</button></div>
                            <div class="col d-flex flex-wrap"><button type="button"
                                    class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip"
                                    title="" data-bs-original-title="Attache File"
                                    aria-label="Attache File"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-paperclip">
                                        <path
                                            d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                        </path>
                                    </svg></button><button type="button"
                                    class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip"
                                    title="" data-bs-original-title="Insert Image"
                                    aria-label="Insert Image"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-image">
                                        <rect x="3" y="3" width="18" height="18" rx="2"
                                            ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg></button><button type="button"
                                    class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip"
                                    title="" data-bs-original-title="Insert Link" aria-label="Insert Link"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-link">
                                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                    </svg></button><button type="button"
                                    class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip"
                                    title="" data-bs-original-title="Insert Emotion"
                                    aria-label="Insert Emotion"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-smile">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                        <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                        <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                    </svg></button>
                                <div class="flex-grow-1"></div><button type="button"
                                    class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip"
                                    title="" data-bs-original-title="More" aria-label="More"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button><button type="button"
                                    class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip"
                                    title="" data-bs-original-title="Delete" aria-label="Delete"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
