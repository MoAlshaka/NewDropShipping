@extends('layouts.seller.master')


@section('title')
    {{ __('site.MyProfile') }}
@endsection


@section('css')
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
@endsection


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> {{ __('site.AccountSettings') }} /</span>
            {{ __('site.Account') }}</h4>
        @if (session()->has('Update'))
            <div class="alert alert-primary" role="alert">{{ session()->get('Update') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h4 class="card-header"> {{ __('site.ProfileDetails') }}</h4>
                    <!-- Account -->

                    <div class="card-body pt-2 mt-1">
                        <form id="formAccountSettings" method="POST"
                            action="{{ route('seller.update.profile', Auth::guard('seller')->user()->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ asset('assets/sellers/images/' . Auth::guard('seller')->user()->image) }}"
                                        alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                            <span class="d-none d-sm-block"> {{ __('site.UploadImage') }}</span>
                                            <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                                            <input type="file" name="image" id="upload" class="account-file-input"
                                                hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-danger account-image-reset mb-3">
                                            <i class="mdi mdi-reload d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block"> {{ __('site.Reset') }}</span>
                                        </button>

                                        <div class="small">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 gy-4">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="firstName" name="first_name"
                                            value="{{ Auth::guard('seller')->user()->first_name }}" autofocus />
                                        <label for="firstName"> {{ __('site.FirstName') }}</label>
                                    </div>
                                </div>
                                @error('first_name')
                                    <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="lastName" name="last_name"
                                            value="{{ Auth::guard('seller')->user()->last_name }}" autofocus />
                                        <label for="lastName"> {{ __('site.LastName') }}</label>
                                    </div>
                                </div>
                                @error('last_name')
                                    <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="email" name="email"
                                            value="{{ Auth::guard('seller')->user()->email }}" placeholder="E-mail" />
                                        <label for="email"> {{ __('site.Email') }}</label>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="phoneNumber" name="phone" class="form-control"
                                                value="{{ Auth::guard('seller')->user()->phone }}"
                                                placeholder="phoneNumber" />
                                            <label for="phoneNumber"> {{ __('site.Phone') }} </label>
                                        </div>

                                    </div>
                                </div>
                                @error('phone')
                                    <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Address" value="{{ Auth::guard('seller')->user()->address }}" />
                                        <label for="address"> {{ __('site.Address') }}</label>
                                    </div>
                                </div>
                                @error('address')
                                    <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" class="form-control" id="account_number"
                                            name="account_number" placeholder="account_number"
                                            value="{{ Auth::guard('seller')->user()->account_number }}" />
                                        <label for="account_number"> {{ __('site.AccountNumber') }}</label>
                                    </div>
                                </div>
                                @error('account_number')
                                    <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <select id="multiStepsState" class="select2 form-select" data-allow-clear="true"
                                            name="payment_method">

                                            <option value="Visa" @if (Auth::guard('seller')->user()->payment_method == 'Visa') selected @endif>Visa
                                            </option>
                                            <option value="InstPay" @if (Auth::guard('seller')->user()->payment_method == 'InstPay') selected @endif>
                                                InstPay</option>
                                            <option value="Vodafone Cash"
                                                @if (Auth::guard('seller')->user()->payment_method == 'Vodafone Cash') selected @endif>Vodafone Cash</option>
                                        </select>
                                        <label for="payment_method"> {{ __('site.PaymentMethod') }}</label>
                                    </div>
                                </div>
                                @error('payment_method')
                                    <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary me-2">
                                    {{ __('site.SaveChanges') }}</button>
                                <button type="reset" class="btn btn-outline-secondary">{{ __('site.Cancel') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>


    </div>
@endsection




@section('js')
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/pages-auth-multisteps.js') }}"></script>
@endsection
