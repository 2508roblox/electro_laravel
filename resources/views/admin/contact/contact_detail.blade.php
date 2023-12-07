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
                            <div class="simplebar-content" style="padding: 16px;">
                                <ul class="sa-nav sa-nav--card">
                                    <li class="sa-nav__section">
                                        <ul class="sa-nav__menu">
                                            <li class="sa-nav__menu-item sa-nav__menu-item--active sa-nav__menu-item--has-icon">
                                                <a href="{{ route('admin.contact.index') }}" class="sa-nav__link"><span class="sa-nav__icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12">
                                                            </polyline>
                                                            <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                                            </path>
                                                        </svg></span><span class="sa-nav__title">Contact Form</span><span class="sa-nav__badge badge badge-sa-pill badge-sa-primary">9</span></a>
                                            </li>
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

            <div class="sa-inbox-chat">
                <div class="sa-inbox-chat__list">
                    <div class="sa-inbox-chat__item sa-inbox-chat__item--expanded">
                        <div class="sa-inbox-chat__item-header">
                            <div class="sa-inbox-chat__item-avatar">
                                <div class="sa-symbol sa-symbol--shape--circle"></div>
                            </div>
                            <div class="sa-inbox-chat__item-author">{{ $contactDetail->firstname }}</div>
                            <div class="sa-inbox-chat__item-date">{{ $contactDetail->created_at }}</div>
                            <div class="sa-inbox-chat__item-meta">From {{ $contactDetail->lastname }}</div>
                        </div>
                        <div class="">
                            <div class="aHl"></div>
                            <div id=":16l" tabindex="-1"></div>
                            <div id=":1j3" class="ii gt adO" jslog="20277; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc4MjQzNjkwNjA4ODA4ODE4MSJd; 4:WyIjbXNnLWY6MTc4MjQzNzM1Mjg0NDQxODc0MCJd">
                                <div id=":16r" class="a3s aiL ">
                                    <div style="font-family:Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                                        <div style="margin:50px auto;width:70%;padding:20px 0">
                                            <span class="im">
                                                <p>{{$contactDetail->message}}</p>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
