@extends('layout.layout')

@section('content')
    @include('inc/_header')

    <main id="content" role="main" class="checkout-page">

        {{-- <script src="https://cdn.socket.io/4.4.1/socket.io.min.js"></script>

        <script>
            const socket = io('http://localhost:7000');

            socket.on('connect', () => {
                console.log('Connected to server');

                const checkoutData = {!! json_encode($checkoutData) !!};
                const productNames = checkoutData.map(element => element.product_name);
                const message = 'Có người đang thanh toán sản phẩm: ' + productNames.join(', ');

                socket.emit('chat-message', message);
            });
            socket.on('disconnect', () => {
                console.log('Disconnected from server');
            });
        </script> --}}

        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ __('checkout') }}
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-5">
                <h1 class="text-center">{{ __('checkout') }}</h1>
            </div>
            <!-- Accordion -->
            <div id="shopCartAccordion" class="accordion rounded mb-5">
                <!-- Card -->
                <div class="card border-0">
                    <div id="shopCartHeadingOne" class="alert alert-primary mb-0" role="alert">
                        Returning customer? <a href="#" class="alert-link" data-toggle="collapse"
                            data-target="#shopCartOne" aria-expanded="false" aria-controls="shopCartOne">Click here to
                            login</a>
                    </div>
                    <div id="shopCartOne" class="collapse border border-top-0" aria-labelledby="shopCartHeadingOne"
                        data-parent="#shopCartAccordion" style="">
                        <!-- Form -->
                        <form class="js-validate p-5">
                            <!-- Title -->
                            <div class="mb-5">
                                <p class="text-gray-90 mb-2">Welcome back! Sign in to your account.</p>
                                <p class="text-gray-90">If you have shopped with us before, please enter your details below.
                                    If you are a new customer, please proceed to the Billing & Shipping section.</p>
                            </div>
                            <!-- End Title -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="js-form-message form-group">
                                        <label class="form-label" for="signinSrEmailExample3">Email address</label>
                                        <input type="email" class="form-control" name="email" id="signinSrEmailExample3"
                                            placeholder="Email address" aria-label="Email address" required
                                            data-msg="Please enter a valid email address." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="js-form-message form-group">
                                        <label class="form-label" for="signinSrPasswordExample2">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            id="signinSrPasswordExample2" placeholder="********" aria-label="********"
                                            required data-msg="Your password is invalid. Please try again."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="js-form-message mb-3">
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="rememberCheckbox"
                                        name="rememberCheckbox" required data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    <label class="custom-control-label form-label" for="rememberCheckbox">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Login</button>
                                </div>
                                <div class="mb-2">
                                    <a class="text-blue" href="#">Lost your password?</a>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Accordion -->

            <!-- Accordion -->
            <div id="shopCartAccordion1" class="accordion rounded mb-6">
                <!-- Card -->
                <div class="card border-0">
                    <div id="shopCartHeadingTwo" class="alert alert-primary mb-0" role="alert">
                        Have a coupon? <a href="#" class="alert-link" data-toggle="collapse"
                            data-target="#shopCartTwo" aria-expanded="false" aria-controls="shopCartTwo">Click here to enter
                            your code</a>
                    </div>
                    <div id="shopCartTwo" class="collapse border border-top-0" aria-labelledby="shopCartHeadingTwo"
                        data-parent="#shopCartAccordion1" style="">
                        <form class="js-validate p-5" action="{{ route('admin.coupon.checkdiscount') }}" method="GET"
                            novalidate="novalidate">
                            @csrf
                            <p class="w-100 text-gray-90">If you have a coupon code, please apply it below.</p>
                            <div class="input-group input-group-pill max-width-660-xl">
                                <input type="text" class="form-control" name="promotion" placeholder="Coupon code"
                                    aria-label="Promo code">
                                <div class="input-group-append">
                                    <button type="submit"
                                        class="btn btn-block btn-dark font-weight-normal btn-pill px-4">
                                        <i class="fas fa-tags d-md-none"></i>
                                        <span class="d-none d-md-inline">Apply coupon</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ 'You have ' . session('success') . '% discounnt' }}
                            </div>
                        @endif

                        <!-- Hiển thị flash message lỗi -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- checkout form -->
            <form method="POST" action="{{ route('admin.checkout.store') }}" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                        <div class="pl-lg-3 ">
                            <div class="bg-gray-1 rounded-lg">
                                <!-- Order Summary -->
                                <div class="p-4 mb-4 checkout-table">
                                    <!-- Title -->
                                    <div class="border-bottom border-color-1 mb-5">
                                        <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
                                    </div>
                                    <!-- End Title -->

                                    <!-- Product Content -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $subtotal = 0; // Khởi tạo biến subtotal để tính tổng giá trị
                                                $totalShippingCost = 0; // Khởi tạo biến totalShippingCost để tính tổng phí vận chuyển
                                            @endphp
                                            @foreach ($checkoutData as $item)
                                                <tr class="cart_item">
                                                    <td style="padding-right: .5rem">{{ $item['product_name'] }}
                                                        <span  > - (
                                                            {{ $item['sku_code'] }} )</span>
                                                        <strong class="product-quantity">× {{ $item['quantity'] }}</strong>
                                                    </td>
                                                    <td>${{ number_format($item['product_price'] * $item['quantity']) }}.00
                                                    </td>
                                                </tr>
                                                @php
                                                    $subtotal += $item['product_price'] * $item['quantity']; // Tính tổng giá trị của mỗi mục và cộng vào subtotal
                                                    $totalShippingCost += $item['shipping_cost']; // Cộng tổng phí vận chuyển của mỗi mục vào totalShippingCost
                                                @endphp
                                            @endforeach

                                        </tbody>




                                        <tfoot>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>${{ number_format($subtotal) }}.00 </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping Cost</th>
                                                <td>${{ number_format($totalShippingCost) }}.00 </td>
                                            </tr>
                                            <tr>
                                                <th>Discount</th>
                                                <td>
                                                    <span> -
                                                        ${{ number_format((Session::get('discount') / 100) * ($subtotal + $totalShippingCost)) }}
                                                    </span>

                                                    {{ session('success') ? '    (' . session('success') . '%)   ' : '   (0%)' }}

                                                </td>
                                                <input type="number" hidden value="{{ Session::get('discount') }} "
                                                    name="discount_percent">

                                            </tr>
                                            <input type="number" hidden value="{{ $totalShippingCost }}"
                                                name="shipping_price">
                                            <tr>
                                                <th>Total</th>
                                                <td><strong>${{ number_format($subtotal + $totalShippingCost - (Session::get('discount') / 100) * ($subtotal + $totalShippingCost)) }}.00
                                                    </strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- End Product Content -->
                                    <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                        <!-- Basics Accordion -->
                                        <div id="basicsAccordion1">
                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingOne">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="payment_mode" value="bank" id="stylishRadio1"
                                                            name="stylishRadio" checked >
                                                        <label class="custom-control-label form-label" id="bank_payment" for="stylishRadio1"
                                                            data-toggle="collapse" data-target="#basicsCollapseOnee"
                                                            aria-expanded="true" aria-controls="basicsCollapseOnee">
                                                            Direct bank transfer
                                                        </label>
                                                        <script>
                                                            $(document).ready(function() {
                                                                $('#bank_payment').on('click', function() {
                                                                    var isChecked = $('#stylishRadio1').prop('checked');
                                                                    console.log('Bank is checked:', isChecked);
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseOnee"
                                                    class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        <img width="40px" src="{{ asset('client/img/vnpay.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->

                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingThree">
                                                    <div class="custom-control custom-radio">
                                                        <input
                                                            {{ $balance < $totalRequiredAmount ? 'disabled' : '' }} type="radio"
                                                            class="custom-control-input" id="wallet"
                                                            name="payment_mode" value="wallet">
                                                        <label class="custom-control-label   form-label" for="wallet"
                                                            data-toggle="collapse" data-target="#basicsCollapseThree"
                                                            aria-expanded="false"
                                                            style="text-decoration: {{ $balance < $totalRequiredAmount ? 'line-through' : '' }}"
                                                            aria-controls="basicsCollapseThree">
                                                            Wallet ( ${{ $balance }} )
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingThree">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="thirdstylishRadio1" name="payment_mode" value="cash">
                                                        <label class="custom-control-label form-label"
                                                            for="thirdstylishRadio1" data-toggle="collapse"
                                                            data-target="#basicsCollapseThree" aria-expanded="false"
                                                            aria-controls="basicsCollapseThree">
                                                            Cash on delivery
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->

                                            <!-- End Card -->
                                        </div>
                                        <!-- End Basics Accordion -->
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="defaultCheck10" required data-msg="Please agree terms and conditions."
                                                data-error-class="u-has-error" data-success-class="u-has-success">
                                            <label class="form-check-label form-label" for="defaultCheck10">
                                                I have read and agree to the website <a href="#"
                                                    class="text-blue">terms and conditions </a>
                                                <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Place
                                        order</button>
                                </div>
                                <!-- End Order Summary -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 order-lg-1">
                        <div class="pb-7 mb-7">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Billing details</h3>
                            </div>
                            <!-- End Title -->

                            <!-- Billing Form -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            First name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Jack"
                                            aria-label="Jack" required="" data-msg="Please enter your frist name."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Last name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Wayley"
                                            aria-label="Wayley" required="" data-msg="Please enter your last name."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Company name (optional)
                                        </label>
                                        <input type="text" class="form-control" name="company"
                                            placeholder="Company Name" aria-label="Company Name"
                                            data-msg="Please enter a company name." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Country
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="country" class="form-control js-select selectpicker dropdown-select"
                                            required="" data-msg="Please select country."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            data-live-search="true"
                                            data-style="form-control border-color-1 font-weight-normal">
                                            <option value="">Select country</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia, Plurinational State of</option>
                                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curaçao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten (Dutch part)</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-8">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Street address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="470 Lucy Forks" aria-label="470 Lucy Forks" required=""
                                            data-msg="Please enter a valid address." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-4">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Apt, suite, etc.
                                        </label>
                                        <input type="text" class="form-control" placeholder="YC7B 3UT"
                                            aria-label="YC7B 3UT" data-msg="Please enter a valid address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            City
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="city" placeholder="London"
                                            aria-label="London" required="" data-msg="Please enter a valid address."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Postcode/Zip
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="zipcode" placeholder="99999"
                                            aria-label="99999" required=""
                                            data-msg="Please enter a postcode or zip code." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-12">
                                    <!-- Input -->

                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Email address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com"
                                            required="" data-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Phone
                                        </label>
                                        <input name="phone" type="text" class="form-control"
                                            placeholder="+1 (062) 109-9222" aria-label="+1 (062) 109-9222"
                                            data-msg="Please enter your last name." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>
                            </div>
                            <!-- End Billing Form -->

                            <!-- Accordion -->

                            <!-- End Accordion -->
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Shipping Details details</h3>
                            </div>
                            <!-- End Title -->

                            <!-- End Accordion -->
                            <!-- Input -->
                            <div class="js-form-message mb-6">
                                <label class="form-label">
                                    Order notes (optional)
                                </label>

                                <div class="input-group">
                                    <textarea class="form-control p-5" rows="4" name="text"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                            <!-- End Input -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
