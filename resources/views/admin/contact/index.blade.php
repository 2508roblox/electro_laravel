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

            <div class="sa-inbox-list">
                @foreach ($contact as $formct)
                <div class="sa-inbox-list__item"><label class="sa-inbox-list__checkbox"><input type="checkbox" class="form-check-input m-0 d-block" aria-label="..."></label>
                    <div class="sa-inbox-list__author">
                        <div class="sa-symbol sa-symbol--shape--circle">
                            <div class="sa-symbol__text">{{ $formct->id }}</div>
                        </div>{{ $formct->subject }}
                    </div>
                    <div class="sa-inbox-list__summary">
                    <div class="sa-inbox-list__content">
                        <span class="sa-inbox-list__subject">
                            <a href="{{ route('admin.contact.detail', ['id' => $formct->id]) }}">{{ $formct->message }}</a>
                        </span>
                    </div>
                </div>
                <div class="sa-inbox-list__date">{{ $formct->created_at->format('d M') }}</div>
            </div>
            @endforeach

        </div>
    </div>
</div>
</div>
@endsection
