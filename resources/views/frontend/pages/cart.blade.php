@extends('layout.layout')

@section('content')
    @include('inc/_header')

    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Cart</h1>
            </div>
            <div class="mb-10 cart-table">
                <table class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity w-lg-15">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($carts as $cart)
                            <tr class="">
                                <td class="text-center">
                                    <a href="{{ route('admin.cart.delete', ['id' => $cart->cart_id]) }}"
                                        class="text-gray-32 font-size-26">×</a>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1"
                                            src="
                                        {{ $cart->product_image ? asset('storage/' . $cart->product_image) : 'client/img/300X300/img6.jpg' }}
                                         "
                                            alt="Image Description"></a>
                                </td>

                                <td data-title="Product">
                                    <a href="#" class="text-gray-90">@php
                                        echo ucwords($cart->product_name);
                                    @endphp </a>
                                    <span style="color:#{{$cart->code}}"> - (  {{$cart->color_name}}   )</span>
                                </td>

                                <td data-title="Price">
                                    @if (isset($cart->promotion_price))
                                        <span class="">${{ number_format($cart->promotion_price) }}.00</span>
                                        <del class="font-size-1 ml-2 text-gray-6  ">
                                            ${{ number_format($cart->price) }}.00</del>
                                        <input hidden id="current_price_{{ $cart->cart_id }}" type="number"
                                            value="{{ $cart->promotion_price }}">
                                    @else
                                        <span class="">${{ number_format($cart->price) }}.00</span>
                                        <input hidden id="current_price_{{ $cart->cart_id }}" type="number"
                                            value="{{ $cart->price }}">
                                    @endif
                                </td>

                                <td data-title="Quantity">
                                    <span class="sr-only">Quantity</span>
                                    <!-- Quantity -->
                                    <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center">
                                            <div class="col p-0">
                                                <input id="quantityInput{{ $cart->cart_id }}" name="quantity"
                                                    class="ml-5 js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                    type="number" min="1" max="{{ $cart->max_color_quantity }}"
                                                    value="{{ $cart->quantity }}">
                                            </div>

                                            <style>
                                                input::-webkit-outer-spin-button,
                                                input::-webkit-inner-spin-button {
                                                    -webkit-appearance: none;
                                                    margin: 0;
                                                }

                                                input[type=number] {
                                                    -moz-appearance: textfield;
                                                }
                                            </style>

                                            <div class="col-auto pr-1">
                                                <button style="z-index: 100" value="{{ $cart->cart_id }}"
                                                    onclick="desc_qty({{ $cart->cart_id }}, {{ $cart->max_color_quantity }})"
                                                    class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0">
                                                    <i value="{{ $cart->cart_id }}"
                                                        onclick="handleSmallClickDesc(event, {{ $cart->cart_id }}, {{ $cart->max_color_quantity }})"
                                                        class="fas fa-minus btn-icon__inner"></i>
                                                </button>
                                                <button style="z-index: 100" value="{{ $cart->cart_id }}"
                                                    onclick="inc_qty({{ $cart->cart_id }}, {{ $cart->max_color_quantity }})"
                                                    class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0">
                                                    <i value="{{ $cart->cart_id }}"
                                                        onclick="handleSmallClickInc(event, {{ $cart->cart_id }}, {{ $cart->max_color_quantity }})"
                                                        class="fas fa-plus btn-icon__inner"></i>
                                                </button>
                                            </div>

                                            <script>
                                                function inc_qty(id, max) {

                                                    var quantityInput = $('#quantityInput' + id);
                                                    var currentValue = quantityInput.val();
                                                    var total = $('.cart_total_' + id)
                                                    var price = $('#current_price_' + id).val()
                                                    if (currentValue >= max) {
                                                        quantityInput.val(max)
                                                        return false;
                                                    } else {


                                                        var result = parseInt(currentValue) + 1;
                                                        quantityInput.val(result);
                                                        $.ajax({
                                                            url: '/cart/edit',
                                                            type: 'PUT',
                                                            dataType: 'json',
                                                            data: {
                                                                "_token": "{{ csrf_token() }}",
                                                                'cart_id': id,
                                                                'quantity': result

                                                            },
                                                            success: function(response) {
                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')
                                                            },
                                                            error: function(xhr) {
                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')

                                                            }
                                                        });
                                                    }
                                                }

                                                function desc_qty(id, max) {

                                                    var quantityInput = $('#quantityInput' + id);
                                                    var currentValue = quantityInput.val();
                                                    var total = $('.cart_total_' + id)
                                                    var price = $('#current_price_' + id).val()
                                                    if (currentValue == 1) {
                                                        return false;
                                                    } else {


                                                        var result = parseInt(currentValue) - 1;
                                                        quantityInput.val(result);
                                                        $.ajax({
                                                            url: '/cart/edit',
                                                            type: 'PUT',
                                                            dataType: 'json',
                                                            data: {
                                                                "_token": "{{ csrf_token() }}",
                                                                'cart_id': id,
                                                                'quantity': result

                                                            },
                                                            success: function(response) {
                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')
                                                            },
                                                            error: function(xhr) {

                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')
                                                            }
                                                        });
                                                    }
                                                }

                                                function handleSmallClickDesc(event, id, max) {
                                                    event.stopPropagation();
                                                    desc_qty(id, max);
                                                }

                                                function handleSmallClickInc(event, id, max) {
                                                    event.stopPropagation();
                                                    inc_qty(id, max);
                                                }
                                            </script>
                                        </div>

                                        <!-- End Quantity -->
                                </td>

                                <td data-title="Total">
                                    <span class="cart_total_{{ $cart->cart_id }}">@php
                                        if (isset($cart->promotion_price)) {
                                            echo '$' . number_format($cart->promotion_price * $cart->quantity) . '.00';
                                        }else {
                                            echo '$' . number_format($cart->price * $cart->quantity) . '.00';

                                        }
                                    @endphp</span>
                                </td>
                            </tr>
                        @empty
                        @endforelse




                        <tr>
                            <td colspan="6" class="border-top space-top-2 justify-content-center">
                                <div class="pt-md-3">
                                    <div class="d-block d-md-flex flex-center-between">
                                        <div class="mb-3 mb-md-0 w-xl-40">
                                            <!-- Apply coupon Form -->
                                            <form class="js-focus-state">
                                                <label class="sr-only" for="subscribeSrEmailExample1">Coupon
                                                    code</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="text"
                                                        id="subscribeSrEmailExample1" placeholder="Coupon code"
                                                        aria-label="Coupon code" aria-describedby="subscribeButtonExample2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-block btn-dark px-4" type="button"
                                                            id="subscribeButtonExample2"><i
                                                                class="fas fa-tags d-md-none"></i><span
                                                                class="d-none d-md-inline">Apply coupon</span></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- End Apply coupon Form -->
                                        </div>
                                        <div class="d-md-flex">
                                            <button type="button"
                                                class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Update
                                                cart</button>
                                            <a href="{{route('admin.checkout')}}"
                                                class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Proceed
                                                to checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-8 cart-total">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                        <div class="border-bottom border-color-1 mb-3">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Cart totals</h3>
                        </div>
                        <table class="table mb-3 mb-md-0">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal"><span class="amount">$1,785.00</span></td>
                                </tr>
                                <tr class="shipping">
                                    <th>Shipping</th>
                                    <td data-title="Shipping">
                                        Flat Rate: <span class="amount">$300.00</span>
                                        <div class="mt-1">
                                            <a class="font-size-12 text-gray-90 text-decoration-on underline-on-hover font-weight-bold mb-3 d-inline-block"
                                                data-toggle="collapse" href="#collapseExample" role="button"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                Calculate Shipping
                                            </a>
                                            <div class="collapse mb-3" id="collapseExample">
                                                <div class="form-group mb-4">
                                                    <select
                                                        class="js-select selectpicker dropdown-select right-dropdown-0-all w-100"
                                                        data-style="bg-white font-weight-normal border border-color-1 text-gray-20">
                                                        <option value="">Select a country…</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
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
                                                        <option value="PW">Belau</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="VG">British Virgin Islands</option>
                                                        <option value="BN">Brunei</option>
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
                                                        <option value="CG">Congo (Brazzaville)</option>
                                                        <option value="CD">Congo (Kinshasa)</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">CuraÇao</option>
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
                                                        <option value="FK">Falkland Islands</option>
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
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and McDonald Islands</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="CI">Ivory Coast</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Laos</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao S.A.R., China</option>
                                                        <option value="MK">Macedonia</option>
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
                                                        <option value="FM">Micronesia</option>
                                                        <option value="MD">Moldova</option>
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
                                                        <option value="AN">Netherlands Antilles</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="KP">North Korea</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PS">Palestinian Territory</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="IE">Republic of Ireland</option>
                                                        <option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russia</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="ST">São Tomé and Príncipe</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="SH">Saint Helena</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="SX">Saint Martin (Dutch part)</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia/Sandwich Islands</option>
                                                        <option value="KR">South Korea</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syria</option>
                                                        <option value="TW">Taiwan</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania</option>
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
                                                        <option value="GB">United Kingdom (UK)</option>
                                                        <option value="US">United States (US)</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VA">Vatican</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Vietnam</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="WS">Western Samoa</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <select
                                                        class="js-select selectpicker dropdown-select right-dropdown-0-all w-100"
                                                        data-style="bg-white font-weight-normal border border-color-1 text-gray-20">
                                                        <option value="">Select an option…</option>
                                                        <option value="AP">Andhra Pradesh</option>
                                                        <option value="AR">Arunachal Pradesh</option>
                                                        <option value="AS">Assam</option>
                                                        <option value="BR">Bihar</option>
                                                        <option value="CT">Chhattisgarh</option>
                                                        <option value="GA">Goa</option>
                                                        <option value="GJ">Gujarat</option>
                                                        <option value="HR">Haryana</option>
                                                        <option value="HP">Himachal Pradesh</option>
                                                        <option value="JK">Jammu and Kashmir</option>
                                                        <option value="JH">Jharkhand</option>
                                                        <option value="KA">Karnataka</option>
                                                        <option value="KL">Kerala</option>
                                                        <option value="MP">Madhya Pradesh</option>
                                                        <option value="MH">Maharashtra</option>
                                                        <option value="MN">Manipur</option>
                                                        <option value="ML">Meghalaya</option>
                                                        <option value="MZ">Mizoram</option>
                                                        <option value="NL">Nagaland</option>
                                                        <option value="OR">Orissa</option>
                                                        <option value="PB">Punjab</option>
                                                        <option value="RJ">Rajasthan</option>
                                                        <option value="SK">Sikkim</option>
                                                        <option value="TN">Tamil Nadu</option>
                                                        <option value="TS">Telangana</option>
                                                        <option value="TR">Tripura</option>
                                                        <option value="UK">Uttarakhand</option>
                                                        <option value="UP">Uttar Pradesh</option>
                                                        <option value="WB">West Bengal</option>
                                                        <option value="AN">Andaman and Nicobar Islands</option>
                                                        <option value="CH">Chandigarh</option>
                                                        <option value="DN">Dadar and Nagar Haveli</option>
                                                        <option value="DD">Daman and Diu</option>
                                                        <option value="DL">Delhi</option>
                                                        <option value="LD">Lakshadeep</option>
                                                        <option value="PY">Pondicherry (Puducherry)</option>
                                                    </select>
                                                </div>
                                                <input class="form-control mb-4" type="text"
                                                    placeholder="Postcode / ZIP">
                                                <button type="button"
                                                    class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Update
                                                    Totals</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="amount">$2,085.00</span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button"
                            class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Proceed
                            to checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
