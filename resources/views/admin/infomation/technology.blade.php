@extends('layout.admin')
@section('content')
    <div class="sa-app__content">
        <!-- sa-app__toolbar -->
        <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
            <div class="sa-toolbar__body">
                <div class="sa-toolbar__item"><button class="sa-toolbar__button" type="button" aria-label="Menu"
                        data-sa-toggle-sidebar=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M1,11V9h18v2H1z M1,3h18v2H1V3z M15,17H1v-2h14V17z"></path>
                        </svg></button></div>
                <div class="sa-toolbar__item sa-toolbar__item--search">
                    <form class="sa-search sa-search--state--pending">
                        <div class="sa-search__body"><label class="visually-hidden" for="input-search">Search for:</label>
                            <div class="sa-search__icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                    height="1em" viewBox="0 0 16 16" fill="currentColor">
                                    <path
                                        d="M16.243 14.828C16.243 14.828 16.047 15.308 15.701 15.654C15.34 16.015 14.828 16.242 14.828 16.242L10.321 11.736C9.247 12.522 7.933 13 6.5 13C2.91 13 0 10.09 0 6.5C0 2.91 2.91 0 6.5 0C10.09 0 13 2.91 13 6.5C13 7.933 12.522 9.247 11.736 10.321L16.243 14.828ZM6.5 2C4.015 2 2 4.015 2 6.5C2 8.985 4.015 11 6.5 11C8.985 11 11 8.985 11 6.5C11 4.015 8.985 2 6.5 2Z">
                                    </path>
                                </svg></div><input type="text" id="input-search" class="sa-search__input"
                                placeholder="Search for the truth" autoComplete="off" /><button
                                class="sa-search__cancel d-sm-none" type="button" aria-label="Close search"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                    fill="currentColor">
                                    <path
                                        d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                    </path>
                                </svg></button>
                            <div class="sa-search__field"></div>
                        </div>
                        <div class="sa-search__dropdown">
                            <div class="sa-search__dropdown-loader"></div>
                            <div class="sa-search__dropdown-wrapper">
                                <div class="sa-search__suggestions sa-suggestions"></div>
                                <div class="sa-search__help sa-search__help--type--no-results">
                                    <div class="sa-search__help-title">No results for &quot;<span
                                            class="sa-search__query"></span>&quot;</div>
                                    <div class="sa-search__help-subtitle">Make sure that all words are spelled correctly.
                                    </div>
                                </div>
                                <div class="sa-search__help sa-search__help--type--greeting">
                                    <div class="sa-search__help-title">Start typing to search for</div>
                                    <div class="sa-search__help-subtitle">Products, orders, customers, actions, etc.</div>
                                </div>
                            </div>
                        </div>
                        <div class="sa-search__backdrop"></div>
                    </form>
                </div>
                <div class="mx-auto"></div>
                <div class="sa-toolbar__item d-sm-none"><button class="sa-toolbar__button" type="button"
                        aria-label="Show search" data-sa-action="show-search"><svg xmlns="http://www.w3.org/2000/svg"
                            width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                            <path
                                d="M16.243 14.828C16.243 14.828 16.047 15.308 15.701 15.654C15.34 16.015 14.828 16.242 14.828 16.242L10.321 11.736C9.247 12.522 7.933 13 6.5 13C2.91 13 0 10.09 0 6.5C0 2.91 2.91 0 6.5 0C10.09 0 13 2.91 13 6.5C13 7.933 12.522 9.247 11.736 10.321L16.243 14.828ZM6.5 2C4.015 2 2 4.015 2 6.5C2 8.985 4.015 11 6.5 11C8.985 11 11 8.985 11 6.5C11 4.015 8.985 2 6.5 2Z">
                            </path>
                        </svg></button></div>
                <div class="sa-toolbar__item dropdown"><button class="sa-toolbar__button" type="button"
                        id="dropdownMenuButton3" data-bs-toggle="dropdown" data-bs-reference="parent" data-bs-offset="0,1"
                        aria-expanded="false"><img src="vendor/flag-icons/24/DE.png" class="sa-language-icon"
                            alt="" /></button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><img
                                    src="vendor/flag-icons/24/DE.png" class="sa-language-icon me-3" alt="" /><span
                                    class="ps-2">German</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><img
                                    src="vendor/flag-icons/24/FR.png" class="sa-language-icon me-3" alt="" /><span
                                    class="ps-2">French</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><img
                                    src="vendor/flag-icons/24/GB.png" class="sa-language-icon me-3" alt="" /><span
                                    class="ps-2">English</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><img
                                    src="vendor/flag-icons/24/RU.png" class="sa-language-icon me-3" alt="" /><span
                                    class="ps-2">Russian</span></a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><img
                                    src="vendor/flag-icons/24/IT.png" class="sa-language-icon me-3"
                                    alt="" /><span class="ps-2">Italian</span></a></li>
                    </ul>
                </div>
                <div class="sa-toolbar__item dropdown"><button class="sa-toolbar__button" type="button"
                        id="dropdownMenuButton2" data-bs-toggle="dropdown" data-bs-reference="parent"
                        data-bs-offset="0,1" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                            width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                            <path
                                d="M8,13c0,0-5.2,0-7,0c0-1-0.1-1.9,1-1.9C2,5,4,2,6,2c0-1.1,0-2,2-2c1.9,0,2,0.9,2,2c2,0,4,3,4,9c1,0,1,1,1,2C12.7,13,8,13,8,13z M6,14h4c0,1.1,0,2-2,2C6,16,6,15.1,6,14L6,14L6,14z">
                            </path>
                        </svg><span class="sa-toolbar__button-indicator">3</span></button>
                    <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuButton2">
                        <div class="sa-notifications">
                            <div class="sa-notifications__header">
                                <div class="sa-notifications__header-title">Notifications</div><a
                                    class="sa-notifications__header-action" href="">Mark All as Read</a>
                            </div>
                            <ul class="sa-notifications__list">
                                <li class="sa-notifications__item">
                                    <a href="#" class="sa-notifications__item-button">
                                        <div class="sa-notifications__item-icon">
                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--style--primary">
                                                <div class="sa-symbol__icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="1em" height="1em" viewBox="0 0 16 16"
                                                        fill="currentColor">
                                                        <path
                                                            d="M14.5,15h-1c-0.8,0-1.5-0.7-1.5-1.5v-8C12,4.7,12.7,4,13.5,4h1C15.3,4,16,4.7,16,5.5v8C16,14.3,15.3,15,14.5,15z M8.5,15h-1C6.7,15,6,14.3,6,13.5v-11C6,1.7,6.7,1,7.5,1h1C9.3,1,10,1.7,10,2.5v11C10,14.3,9.3,15,8.5,15z M2.5,15h-1C0.7,15,0,14.3,0,13.5v-5C0,7.7,0.7,7,1.5,7h1C3.3,7,4,7.7,4,8.5v5C4,14.3,3.3,15,2.5,15z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                        <div class="sa-notifications__item-body">
                                            <div class="sa-notifications__item-title sa-notifications__item-title--nowrap">
                                                New report has been received</div>
                                            <div
                                                class="sa-notifications__item-subtitle sa-notifications__item-subtitle--nowrap">
                                                24 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sa-notifications__item">
                                    <a href="#" class="sa-notifications__item-button">
                                        <div class="sa-notifications__item-icon">
                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--style--warning">
                                                <div class="sa-symbol__icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="1em" height="1em" viewBox="0 0 16 16"
                                                        fill="currentColor">
                                                        <path
                                                            d="M8,6C4.7,6,2,4.7,2,3s2.7-3,6-3s6,1.3,6,3S11.3,6,8,6z M2,5L2,5L2,5C2,5,2,5,2,5z M8,8c3.3,0,6-1.3,6-3v3c0,1.7-2.7,3-6,3S2,9.7,2,8V5C2,6.7,4.7,8,8,8z M14,5L14,5C14,5,14,5,14,5L14,5z M2,10L2,10L2,10C2,10,2,10,2,10z M8,13c3.3,0,6-1.3,6-3v3c0,1.7-2.7,3-6,3s-6-1.3-6-3v-3C2,11.7,4.7,13,8,13z M14,10L14,10C14,10,14,10,14,10L14,10z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                        <div class="sa-notifications__item-body">
                                            <div class="sa-notifications__item-title sa-notifications__item-title--nowrap">
                                                Creating a backup in the process</div>
                                            <div
                                                class="sa-notifications__item-subtitle sa-notifications__item-subtitle--nowrap">
                                                Completed: 37% (23.05 MB)</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sa-notifications__item">
                                    <a href="#" class="sa-notifications__item-button">
                                        <div class="sa-notifications__item-icon">
                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--style--primary">
                                                <div class="sa-symbol__icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="1em" height="1em" viewBox="0 0 16 16"
                                                        fill="currentColor">
                                                        <path
                                                            d="M14.2,10.3c-0.1,0.4-0.5,0.7-0.9,0.7H4.8c-0.5,0-0.9-0.3-1-0.8L2.2,4C2.1,3.4,1.6,3,1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h1.4c1,0,1.9,0.7,2.1,1.7l1.5,6.1C5.5,8.9,5.7,9,5.8,9h6.5c0.1,0,0.2-0.1,0.3-0.2l1.1-3.4C13.8,5.2,13.7,5,13.5,5H7.4C7.2,5,7,4.8,7,4.6V3.4C7,3.2,7.2,3,7.4,3H15c0.6,0,1,0.4,1,1v1L14.2,10.3z M4.5,13C5.3,13,6,13.7,6,14.5C6,15.3,5.3,16,4.5,16S3,15.3,3,14.5C3,13.7,3.7,13,4.5,13z M11.5,13c0.8,0,1.5,0.7,1.5,1.5c0,0.8-0.7,1.5-1.5,1.5S10,15.3,10,14.5C10,13.7,10.7,13,11.5,13z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                        <div class="sa-notifications__item-body">
                                            <div class="sa-notifications__item-title sa-notifications__item-title--nowrap">
                                                Product added to cart</div>
                                            <div
                                                class="sa-notifications__item-subtitle sa-notifications__item-subtitle--nowrap">
                                                Drill Screwdriver Brandix ALX7054 200 Watts</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sa-notifications__item">
                                    <a href="#" class="sa-notifications__item-button">
                                        <div class="sa-notifications__item-icon">
                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--style--info">
                                                <div class="sa-symbol__icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="1em" height="1em" viewBox="0 0 16 16"
                                                        fill="currentColor">
                                                        <path
                                                            d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                        <div class="sa-notifications__item-body">
                                            <div class="sa-notifications__item-title sa-notifications__item-title--nowrap">
                                                Customer Ryan Ford says</div>
                                            <div
                                                class="sa-notifications__item-subtitle sa-notifications__item-subtitle--nowrap">
                                                What is a screen dimension of Brandix Series B monitor?</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="sa-notifications__footer"><a class="sa-notifications__footer-action"
                                    href="">See all 15 notifications</a></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown sa-toolbar__item"><button class="sa-toolbar-user" type="button"
                        id="dropdownMenuButton" data-bs-toggle="dropdown" data-bs-offset="0,1"
                        aria-expanded="false"><span
                            class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--rounded"><img
                                src="/admin/images/customers/customer-4-64x64.jpg" width="64" height="64"
                                alt="" /></span><span class="sa-toolbar-user__info"><span
                                class="sa-toolbar-user__title">{{ Auth::user()->name }}</span><span
                                class="sa-toolbar-user__subtitle">{{ Auth::user()->email }}</span></span></button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="app-inbox-list.html">Inbox</a></li>
                        <li><a class="dropdown-item" href="app-settings-toc.html">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="auth-sign-in.html">Sign Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="sa-toolbar__shadow"></div>
        </div>
        <!-- sa-app__toolbar / end -->
        <!-- sa-app__body -->
        <div id="top" class="sa-app__body">
            <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                <div class="container">
                    <div class="py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col">
                                <nav class="mb-2" aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-sa-simple">
                                        <li class="breadcrumb-item"><a href="index.html">Infomation</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Technology</li>
                                    </ol>
                                </nav>
                                <h1 class="h3 m-0">Technology</h1>
                            </div>
                            <div class="col-auto d-flex"><a href="{{ route('admin.brand.create') }}"
                                    class="btn btn-primary">New brand</a></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="p-4"><input type="text" placeholder="Start typing to search for Brand"
                                class="form-control form-control--search mx-auto" id="table-search" /></div>
                        <div class="sa-divider"></div>
                        <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                            data-sa-search-input="#table-search">
                            <thead>
                                <tr>
                                    <th class="w-min" data-orderable="false"><input type="checkbox"
                                            class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></th>
                                    <th class="">Id</th>
                                    <th>Logo</th>
                                    <th class="min-w-15x">Name</th>
                                    <th class="min-w-15x">Version</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($technologies as $index => $technology)
                                    <tr>
                                        <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                                aria-label="..." /></td>
                                        <td>{{ $index + 1 }}</td>
                                        <td style="justify-content: center ; display: flex; align-items: center"> <img
                                                src={{ $technology['logo'] }} height="30px" alt=""
                                                srcset="">
                                        </td>
                                        <td>{{ $technology['name'] }}</td>
                                        <td>
                                            <div class="badge badge-sa-success">{{ $technology['version'] }}
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
