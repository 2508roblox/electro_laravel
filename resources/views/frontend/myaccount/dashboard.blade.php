@extends('layout.layout')

@section('content')
@include('inc/_header')

<style>
    h1 {
        padding: 50px 0;
        font-weight: 400;
        text-align: center;
    }

    p {
        margin: 0 0 20px;
        line-height: 1.5;
    }

    main {
        min-width: 320px;
        max-width: 1200px;
        padding: 50px;
        margin: 0 auto;
        background: #fff;
    }

    section {
        display: none;
        padding: 20px 0 0;
        border-top: 1px solid #ddd;
    }

    input {
        display: none;
    }

    label {
        display: inline-block;
        margin: 0 0 -1px;
        padding: 15px 25px;
        font-weight: 600;
        text-align: center;
        color: #bbb;
        border: 1px solid transparent;
    }

    label:before {
        font-family: fontawesome;
        font-weight: normal;
        margin-right: 10px;
    }

    label[for*='1']:before {
        content: '\f015';
    }

    label[for*='2']:before {
        content: '\f075';
    }

    label[for*='3']:before {
        content: '\f601';
    }

    label[for*='4']:before {
        content: '\f2bd';
    }

    label:hover {
        color: #888;
        cursor: pointer;
    }

    input:checked+label {
        color: #555;
        border: 1px solid #ddd;
        border-top: 2px solid orange;
        border-bottom: 1px solid #fff;
    }

    #tab1:checked~#content1,
    #tab2:checked~#content2,
    #tab3:checked~#content3,
    #tab4:checked~#content4,
    #tab5:checked~#content5 {
        display: block;
    }

    @media screen and (max-width: 650px) {
        label {
            font-size: 0;
        }

        label:before {
            margin: 0;
            font-size: 18px;
        }
    }

    @media screen and (max-width: 400px) {
        label {
            padding: 15px;
        }
    }

</style>

<h1>Hello <u>{{ Auth::user()->name }}</u>

</h1>

<main>

    <input id="tab1" type="radio" name="tabs" checked>
    <label for="tab1">Dashboard</label>

    <input id="tab2" type="radio" name="tabs">
    <label for="tab2">Comments</label>

    <input id="tab3" type="radio" name="tabs">
    <label for="tab3">Addresses</label>

    <input id="tab4" type="radio" name="tabs">
    <label for="tab4">Account details</label>

    <section id="content1">
        <p>Hello <b>{{ Auth::user()->name }}</b>
            @if(Auth::user()->role_as == 1)
            <p><a href="{{ route('dashboard') }}" target="_blank" class="gotoAdmin"><button class="btn btn-secondary">Admin Dashboard</button></a></p>
            @endif
        </p>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input class="btn btn-primary" id="submit" type="submit" value="Logout" placeholder="Logout" style="display: block; font-size: 15px">
        </form>

        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>

        <h2 class="text-center">Recent Activities</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Time</th>
                    <th scope="col">Browser</th>
                    <th scope="col">Not me?</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
                @endphp
                @foreach ($loginHistory->sortByDesc('created_at') as $attribute)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $attribute['ip_address'] }}</td>
                    <td>{{ $attribute['created_at'] }}</td>
                    <td>-</td>
                    <td><a href="{{ route('frontend.forgot.view') }}">Reset Password</a></td>
                </tr>
                @php
                $counter++;
                @endphp
                @endforeach
            </tbody>
        </table>

    </section>

    <section id="content2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">IP</th>
                    <th scope="col">Time</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Post</th>
                    <th scope="col">Status</th>
                    <th scope="col">Accept</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
                @endphp

                @forelse($userComments as $comment)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $comment->ip_address }}</td>
                    <td>{{ $comment->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>{{ Illuminate\Support\Str::limit($comment->content, 50) }}</td>
                    <td>
                        <a type="button" class="btn btn-secondary" href="{{ route('fe.post', ['id' => $comment->blog_id]) }}" style="font-size: 12px; padding: 8px">Go to</a>
                    </td>
                    <td>{{ $comment->status }}</td>
                    <td>{{ $comment->is_accept }}</td>
                    <td>
                        <a type="button" class="btn btn-secondary" href="#" style="font-size: 12px; padding: 8px">Hide</a>
                        <a type="button" class="btn btn-secondary" href="#" style="font-size: 12px; padding: 8px">Show</a>
                        <a type="button" class="btn btn-danger" href="#" style="font-size: 12px; padding: 8px">Delete</a>
                    </td>
                </tr>
                @php
                $counter++;
                @endphp
                @empty
                <tr>
                    <td colspan="8">No comments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <section id="content3">
        <p>The following addresses will be used on the checkout page by default.</p>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-12 col-xl-12" bis_skin_checked="1">
            <div class="mr-xl-6" bis_skin_checked="1">
                <form class="js-validate" novalidate="novalidate" method="post" action="{{ route('frontend.myaccount.updateProfile') }}">
                    @csrf
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-6" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    First name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="firstname" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" value="{{ Auth::user()->firstname }}">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-md-6" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    Last name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="lastname" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->lastname }}">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-md-12" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    Company Name (Optional)
                                </label>
                                <input type="text" class="form-control" name="companyname" placeholder="" aria-label="" data-msg="Please enter companyname." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->companyname }}">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-md-12" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    Country / Region
                                </label>
                                <div class="dropdown bootstrap-select js-select dropdown-select w-100" bis_skin_checked="1">
                                    <select class="js-select selectpicker dropdown-select w-100" data-style="btn-sm bg-white font-weight-normal py-2 border" tabindex="-98" name="country">
                                        <option value="vietnam" {{ Auth::user()->country == 'vietnam' ? 'selected' : '' }}>VietNam</option>
                                        <option value="us" {{ Auth::user()->country == 'us' ? 'selected' : '' }}>US</option>
                                        <option value="taiwan" {{ Auth::user()->country == 'taiwan' ? 'selected' : '' }}>Taiwan</option>
                                        <option value="china" {{ Auth::user()->country == 'china' ? 'selected' : '' }}>Khựa</option>
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12" bis_skin_checked="1">
                                <!-- Input -->
                                <div class="js-form-message mb-4" bis_skin_checked="1">
                                    <label class="form-label">
                                        Street Address
                                    </label>
                                    <input type="text" class="form-control" name="address" placeholder="Input full address" aria-label="" data-msg="Please enter address." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->address }}">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12" bis_skin_checked="1">
                                <!-- Input -->
                                <div class="js-form-message mb-4" bis_skin_checked="1">
                                    <label class="form-label">
                                        Zip Code
                                    </label>
                                    <input type="number" class="form-control" name="zipcode" placeholder="Input full zipcode" aria-label="" data-msg="Please enter zipcode." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->zipcode }}">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12" bis_skin_checked="1">
                                <!-- Input -->
                                <div class="js-form-message mb-4" bis_skin_checked="1">
                                    <label class="form-label">
                                        Phone
                                    </label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Input full phone" aria-label="" data-msg="Please enter phone." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->phone }}">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12" bis_skin_checked="1">
                                <!-- Input -->
                                <div class="js-form-message mb-4" bis_skin_checked="1">
                                    <label class="form-label">
                                        Email
                                    </label>
                                    <input type="email" class="form-control" name="email" placeholder="Input email" aria-label="" data-msg="Please enter email." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <!-- End Input -->
                            </div>

                        </div>
                        <div class="mb-3" bis_skin_checked="1">
                            <button type="submit" class="btn btn-primary-dark-w">Save</button>
                        </div>
                </form>
            </div>
        </div>


    </section>

    <section id="content4">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-12 col-xl-12" bis_skin_checked="1">
            <div class="mr-xl-6" bis_skin_checked="1">
                <form class="js-validate" novalidate="novalidate" method="post" action="{{ route('frontend.myaccount.updateProfile') }}">
                    @csrf
                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-6" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    First name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="firstname" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" value="{{ Auth::user()->firstname }}">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-md-6" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    Last name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="lastname" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->lastname }}">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-md-12" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    Display name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="name" placeholder="" aria-label="" required="" data-msg="Please enter your display name." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->name }}">
                            </div>
                            <!-- End Input -->
                        </div>

                        <div class="col-md-12" bis_skin_checked="1">
                            <!-- Input -->
                            <div class="js-form-message mb-4" bis_skin_checked="1">
                                <label class="form-label">
                                    Email
                                </label>
                                <input type="email" class="form-control" name="email" placeholder="Input email" aria-label="" data-msg="Please enter email." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <!-- End Input -->
                        </div>

                    </div>
                    <div class="mb-3" bis_skin_checked="1">
                        <button type="submit" class="btn btn-primary-dark-w">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

</main>


<style>
    footer {
        display: none !important;
    }

</style>
@endsection
