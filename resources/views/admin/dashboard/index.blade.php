@extends('layout.admin')
@section('content')
    <!-- sa-app__content -->

    <!-- sa-app__toolbar / end -->
    <!-- sa-app__body -->
    <div id="top" class="sa-app__body px-2 px-lg-4">
        <div class="container pb-6">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <h1 class="h3 m-0">Thống kê</h1>
                    </div>
                    <div class="col-auto d-flex"><select class="form-select me-3">
                            <option selected="">7 October, 2021</option>
                        </select><a href="#" class="btn btn-primary">Export</a></div>
                </div>
            </div>
            <div class="row g-4 g-xl-5">
                <div class="col-12 col-md-4 d-flex">
                    <div class="card saw-indicator flex-grow-1"
                        data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                        <div class="sa-widget-header saw-indicator__header">
                            <h2 class="sa-widget-header__title">Total sells</h2>
                            <div class="sa-widget-header__actions">
                                <div class="dropdown"><button type="button" class="btn btn-sm btn-sa-muted d-block"
                                        id="widget-context-menu-1" data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3"
                                            height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="widget-context-menu-1">
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Move</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saw-indicator__body">
                            <div class="saw-indicator__value">${{ $totalAmount }}</div>
                            <div class="saw-indicator__delta saw-indicator__delta--rise">
                                <div class="saw-indicator__delta-direction"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="9" height="9" viewBox="0 0 9 9" fill="currentColor">
                                        <path d="M9,0L8,6.1L2.8,1L9,0z"></path>
                                        <circle cx="1" cy="8" r="1"></circle>
                                        <rect x="0" y="4.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.864 4.0858)"
                                            width="7.1" height="2"></rect>
                                    </svg></div>
                                <div class="saw-indicator__delta-value">34.7%</div>
                            </div>
                            <div class="saw-indicator__caption">Compared to April 2021</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex">
                    <div class="card saw-indicator flex-grow-1"
                        data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                        <div class="sa-widget-header saw-indicator__header">
                            <h2 class="sa-widget-header__title">Average order value</h2>
                            <div class="sa-widget-header__actions">
                                <div class="dropdown"><button type="button" class="btn btn-sm btn-sa-muted d-block"
                                        id="widget-context-menu-2" data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3"
                                            height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="widget-context-menu-2">
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Move</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saw-indicator__body">
                            <div class="saw-indicator__value">${{ $averageAmount / $orderCount }}</div>
                            <div class="saw-indicator__delta saw-indicator__delta--fall">
                                <div class="saw-indicator__delta-direction"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="9" height="9" viewBox="0 0 9 9" fill="currentColor">
                                        <path d="M2.8,8L8,2.9L9,9L2.8,8z"></path>
                                        <circle cx="1" cy="1" r="1"></circle>
                                        <rect x="0" y="2.5" transform="matrix(0.7071 0.7071 -0.7071 0.7071 3.5 -1.4497)"
                                            width="7.1" height="2"></rect>
                                    </svg></div>
                                <div class="saw-indicator__delta-value">12.0%</div>
                            </div>
                            <div class="saw-indicator__caption">Compared to April 2021</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex">
                    <div class="card saw-indicator flex-grow-1"
                        data-sa-container-query="{&quot;340&quot;:&quot;saw-indicator--size--lg&quot;}">
                        <div class="sa-widget-header saw-indicator__header">
                            <h2 class="sa-widget-header__title">Total orders</h2>
                            <div class="sa-widget-header__actions">
                                <div class="dropdown"><button type="button" class="btn btn-sm btn-sa-muted d-block"
                                        id="widget-context-menu-3" data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3"
                                            height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="widget-context-menu-3">
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Move</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saw-indicator__body">
                            <div class="saw-indicator__value">{{ $orderCount }}</div>
                            <div class="saw-indicator__delta saw-indicator__delta--rise">
                                <div class="saw-indicator__delta-direction"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="9" height="9" viewBox="0 0 9 9" fill="currentColor">
                                        <path d="M9,0L8,6.1L2.8,1L9,0z"></path>
                                        <circle cx="1" cy="8" r="1"></circle>
                                        <rect x="0" y="4.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.864 4.0858)"
                                            width="7.1" height="2"></rect>
                                    </svg></div>
                                <div class="saw-indicator__delta-value">27.9%</div>
                            </div>
                            <div class="saw-indicator__caption">Compared to April 2021</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                    <div class="card flex-grow-1 saw-pulse"
                        data-sa-container-query="{&quot;560&quot;:&quot;saw-pulse--size--lg&quot;}">
                        <div class="sa-widget-header saw-pulse__header">
                            <h2 class="sa-widget-header__title">Số người dùng</h2>
                            <div class="sa-widget-header__actions">
                                <div class="dropdown"><button type="button" class="btn btn-sm btn-sa-muted d-block"
                                        id="widget-context-menu-4" data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3"
                                            height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="widget-context-menu-4">
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Move</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saw-pulse__counter">{{ $userCount }}</div>
                        {{-- <div class="sa-widget-table saw-pulse__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Active pages</th>
                                        <th class="text-end">Users</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a class="text-reset">Coming</a></td>
                                        <td class="text-end"><button class="btn btn-success">On</button></td>
                                        <td class="text-end"><button class="btn btn-danger">Off</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                    <div class="card flex-grow-1 saw-chart"
                        data-sa-data="[{&quot;label&quot;:&quot;Jan&quot;,&quot;value&quot;:{{$orderCountPerMonth['0']}}},{&quot;label&quot;:&quot;Feb&quot;,&quot;value&quot;:{{$orderCountPerMonth['1']}}},{&quot;label&quot;:&quot;Mar&quot;,&quot;value&quot;:{{$orderCountPerMonth['2']}}},{&quot;label&quot;:&quot;Apr&quot;,&quot;value&quot;:{{$orderCountPerMonth['3']}}},{&quot;label&quot;:&quot;May&quot;,&quot;value&quot;:{{$orderCountPerMonth['4']}}},{&quot;label&quot;:&quot;Jun&quot;,&quot;value&quot;:{{$orderCountPerMonth['5']}}},{&quot;label&quot;:&quot;Jul&quot;,&quot;value&quot;:{{$orderCountPerMonth['6']}}},{&quot;label&quot;:&quot;Aug&quot;,&quot;value&quot;:{{$orderCountPerMonth['7']}}},{&quot;label&quot;:&quot;Sep&quot;,&quot;value&quot;:{{$orderCountPerMonth['8']}}},{&quot;label&quot;:&quot;Oct&quot;,&quot;value&quot;:{{$orderCountPerMonth['9']}}},{&quot;label&quot;:&quot;Nov&quot;,&quot;value&quot;:{{$orderCountPerMonth['10']}}},{&quot;label&quot;:&quot;Dec&quot;,&quot;value&quot;:{{$orderCountPerMonth['11']}}}]">
                        <div class="sa-widget-header saw-chart__header">
                            <h2 class="sa-widget-header__title">Thống kê doanh thu theo tháng</h2>
                            <div class="sa-widget-header__actions">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-sa-muted d-block"
                                        id="widget-context-menu-5" data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3"
                                            height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="widget-context-menu-5">
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Move</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saw-chart__body">
                            <div class="saw-chart__container"><canvas></canvas></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-xxl-9 d-flex">
                    <div class="card flex-grow-1 saw-table">
                        <div class="sa-widget-header saw-table__header">
                            <h2 class="sa-widget-header__title">Recent orders</h2>
                            <div class="sa-widget-header__actions">
                                <div class="dropdown"><button type="button" class="btn btn-sm btn-sa-muted d-block"
                                        id="widget-context-menu-6" data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3"
                                            height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="widget-context-menu-6">
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Move</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saw-table__body sa-widget-table text-nowrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>Co.</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00745</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-primary">Pending</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/IT.png" class="sa-language-icon d-block"
                                                alt="" title="Italy" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">GB</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Giordano Bruno</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2020-11-02</td>
                                        <td>$2,742.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00513</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-warning">Hold</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/DE.png" class="sa-language-icon d-block"
                                                alt="" title="Germany" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">HW</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Hans Weber</a></div>
                                            </div>
                                        </td>
                                        <td>2020-09-05</td>
                                        <td>$204.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00507</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-primary">Pending</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/IT.png" class="sa-language-icon d-block"
                                                alt="" title="Italy" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">AR</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Andrea Rossi</a></div>
                                            </div>
                                        </td>
                                        <td>2020-08-21</td>
                                        <td>$5,039.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00104</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-danger">Canceled</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/US.png" class="sa-language-icon d-block"
                                                alt="" title="USA" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">RF</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Richard Feynman</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2020-06-22</td>
                                        <td>$79.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00097</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-success">Completed</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/CO.png" class="sa-language-icon d-block"
                                                alt="" title="Columbia" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">LG</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Leonardo Garcia</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2020-05-09</td>
                                        <td>$826.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00082</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-success">Completed</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/RS.png" class="sa-language-icon d-block"
                                                alt="" title="Srbija" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">NT</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Nikola Tesla</a></div>
                                            </div>
                                        </td>
                                        <td>2020-04-27</td>
                                        <td>$1,052.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00063</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-primary">Pending</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/FR.png" class="sa-language-icon d-block"
                                                alt="" title="France" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">MC</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Marie Curie</a></div>
                                            </div>
                                        </td>
                                        <td>2020-02-09</td>
                                        <td>$441.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="app-order.html" class="text-reset">#00012</a></td>
                                        <td>
                                            <div class="d-flex fs-6">
                                                <div class="badge badge-sa-success">Completed</div>
                                            </div>
                                        </td>
                                        <td><img src="vendor/flag-icons/24/RU.png" class="sa-language-icon d-block"
                                                alt="" title="Russia" /></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="app-customer.html"
                                                    class="sa-symbol sa-symbol--shape--circle sa-symbol--size--md me-3">
                                                    <div class="sa-symbol__text">KT</div>
                                                </a>
                                                <div><a href="app-customer.html" class="text-reset">Konstantin
                                                        Tsiolkovsky</a></div>
                                            </div>
                                        </td>
                                        <td>2020-01-01</td>
                                        <td>$12,961.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xxl-3 d-flex">
                    <div class="card flex-grow-1 saw-chart-circle"
                        data-sa-data="[{&quot;label&quot;:&quot;Yandex&quot;,&quot;value&quot;:2742,&quot;color&quot;:&quot;#ffd333&quot;,&quot;orders&quot;:12},{&quot;label&quot;:&quot;YouTube&quot;,&quot;value&quot;:3272,&quot;color&quot;:&quot;#e62e2e&quot;,&quot;orders&quot;:51},{&quot;label&quot;:&quot;Google&quot;,&quot;value&quot;:2303,&quot;color&quot;:&quot;#3377ff&quot;,&quot;orders&quot;:4},{&quot;label&quot;:&quot;Facebook&quot;,&quot;value&quot;:1434,&quot;color&quot;:&quot;#29cccc&quot;,&quot;orders&quot;:10},{&quot;label&quot;:&quot;Instagram&quot;,&quot;value&quot;:799,&quot;color&quot;:&quot;#5dc728&quot;,&quot;orders&quot;:1}]"
                        data-sa-container-query="{&quot;600&quot;:&quot;saw-chart-circle--size--lg&quot;}">
                        <div class="sa-widget-header saw-chart-circle__header">
                            <h2 class="sa-widget-header__title">Sales by traffic source</h2>
                            <div class="sa-widget-header__actions">
                                <div class="dropdown"><button type="button" class="btn btn-sm btn-sa-muted d-block"
                                        id="widget-context-menu-7" data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3"
                                            height="13" fill="currentColor">
                                            <path
                                                d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                            </path>
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="widget-context-menu-7">
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Move</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="saw-chart-circle__body">
                            <div class="saw-chart-circle__container"><canvas></canvas></div>
                        </div>
                        <div class="sa-widget-table saw-chart-circle__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Source</th>
                                        <th class="text-center">Orders</th>
                                        <th class="text-end">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="saw-chart-circle__symbol"
                                                    style="--saw-chart-circle__symbol--color:#ffd333"></div>
                                                <div class="ps-2">Yandex</div>
                                            </div>
                                        </td>
                                        <td class="text-center">12</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span
                                                    class="sa-price__integer">2,742</span><span
                                                    class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="saw-chart-circle__symbol"
                                                    style="--saw-chart-circle__symbol--color:#e62e2e"></div>
                                                <div class="ps-2">YouTube</div>
                                            </div>
                                        </td>
                                        <td class="text-center">51</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span
                                                    class="sa-price__integer">3,272</span><span
                                                    class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="saw-chart-circle__symbol"
                                                    style="--saw-chart-circle__symbol--color:#3377ff"></div>
                                                <div class="ps-2">Google</div>
                                            </div>
                                        </td>
                                        <td class="text-center">4</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span
                                                    class="sa-price__integer">2,303</span><span
                                                    class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="saw-chart-circle__symbol"
                                                    style="--saw-chart-circle__symbol--color:#29cccc"></div>
                                                <div class="ps-2">Facebook</div>
                                            </div>
                                        </td>
                                        <td class="text-center">10</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span
                                                    class="sa-price__integer">1,434</span><span
                                                    class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="saw-chart-circle__symbol"
                                                    style="--saw-chart-circle__symbol--color:#5dc728"></div>
                                                <div class="ps-2">Instagram</div>
                                            </div>
                                        </td>
                                        <td class="text-center">1</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span
                                                    class="sa-price__integer">799</span><span
                                                    class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
