<div class="u-header-topbar py-2 d-none d-xl-block">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="topbar-left">
                <a href="#" class="text-gray-110 font-size-13 hover-on-dark">Welcome to Worldwide Electronics
                    Store</a>
            </div>
            <div class="topbar-right ml-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                        <a href="../home/contact-v2.html" class="u-header-topbar__nav-link"><i class="ec ec-map-pointer mr-1"></i> Store Locator</a>
                    </li>
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                        <a href="{{route('frontend.order.list')}}" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                    </li>
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                        <div class="d-flex align-items-center">
                            <!-- Language -->
                            <div class="position-relative">
                                <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                    <span class="d-inline-block d-sm-none">US</span>
                                    <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-dollar mr-1"></i> Dollar (US)</span>
                                </a>

                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold u-unfold--css-animation u-unfold--hidden fadeOut" aria-labelledby="languageDropdownInvoker" style="animation-duration: 300ms;">
                                    <a class="dropdown-item active" href="#">English</a>
                                    <a class="dropdown-item" href="#">Deutsch</a>
                                    <a class="dropdown-item" href="#">Español</a>
                                </div>
                            </div>
                            <!-- End Language -->
                        </div>
                    </li>
                    <!-- Account Sidebar Toggle Button -->
                    @auth
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                        Hello, <a href="{{ route("frontend.myaccount.dashboard") }}">{{ Auth::user()->name }}
                            <i class="ec ec-user mr-1"></i></a>
                    </li>
                    <li class="list-inline-item mr-0  ">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input style="background: none; border:none" id="submit" type="submit" value="Logout" placeholder="Logout">
                        </form>
                    </li>
                    @else <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                        <a style="color: black!important" href="{{ route('register') }}">
                            <i class="ec ec-user mr-1"></i> Register <span class="text-gray-50">or</span> Sign in
                        </a>
                    </li>
                    @endauth
                    <!-- End Account Sidebar Toggle Button -->
                </ul>
            </div>
        </div>
    </div>
</div>
