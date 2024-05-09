<!doctype html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> {{ __('site.Register') }} </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

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
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->

    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="index.html" class="auth-cover-brand d-flex align-items-center gap-2">
            <span class="app-brand-logo demo">
                <span style="color: var(--bs-primary)">
                    <svg width="268" height="150" viewBox="0 0 38 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
                            fill="currentColor" />
                        <path
                            d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
                            fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
                        <path
                            d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
                            fill="currentColor" />
                        <path
                            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                            fill="currentColor" />
                        <path
                            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                            fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
                        <path
                            d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
                            fill="currentColor" />
                        <defs>
                            <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138" x2="10.532"
                                y2="24.104" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-opacity="1" />
                                <stop offset="1" stop-opacity="0" />
                            </linearGradient>
                            <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139" x2="10.3357"
                                y2="24.1155" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-opacity="1" />
                                <stop offset="1" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
            </span>
            <span class="app-brand-text demo text-heading fw-bold"> Dropshipping</span>
        </a>
        <!-- /Logo -->
        <div class="authentication-inner row m-0">
            <!-- Left Text -->
            <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 mt-5 mt-xxl-0">
                <img alt="register-multi-steps-illustration"
                    src="{{ asset('assets/img/illustrations/auth-register-multi-steps-illustration.png') }}"
                    class="h-auto mh-100 w-px-200" />
            </div>
            <!-- /Left Text -->

            <!--  Multi Steps Registration -->
            <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-5">
                <div class="w-px-700 mt-5 mt-lg-0">
                    <div id="multiStepsValidation" class="bs-stepper wizard-numbered">
                        <div class="bs-stepper-header border-bottom-0">
                            <div class="step" data-target="#accountDetailsValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-number">01</span>
                                        <span class="d-flex flex-column gap-1 ms-2">
                                            <span class="bs-stepper-title"> {{ __('site.Account') }}</span>
                                            <span class="bs-stepper-subtitle">{{ __('site.AccountDetails') }}</span>
                                        </span>
                                    </span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#personalInfoValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-number">02</span>
                                        <span class="d-flex flex-column gap-1 ms-2">
                                            <span class="bs-stepper-title"> {{ __('site.Personal') }}</span>
                                            <span class="bs-stepper-subtitle">
                                                {{ __('site.EnterInformation') }}</span>
                                        </span>
                                    </span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#billingLinksValidation">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-number">03</span>
                                        <span class="d-flex flex-column gap-1 ms-2">
                                            <span class="bs-stepper-title"> {{ __('site.Billing') }}</span>
                                            <span class="bs-stepper-subtitle"> {{ __('site.PaymentDetails') }}</span>
                                        </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form id="multiStepsForm" onSubmit="return false"
                                action="{{ route('seller.register') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Account Details -->
                                <div id="accountDetailsValidation" class="content">
                                    <div class="content-header mb-3">
                                        <h4 class="mb-0"> {{ __('site.AccountInformation') }}</h4>
                                        <small> {{ __('site.EnterAccount') }}</small>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="email" name="email" id="multiStepsEmail"
                                                    class="form-control" placeholder="{{ __('site.Email') }}"
                                                    aria-label="email" value="{{ old('email') }}" />
                                                <label for="multiStepsEmail"> {{ __('site.Email') }}</label>
                                            </div>
                                            @error('email')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="password" id="multiStepsPass" name="password"
                                                        class="form-control"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        aria-describedby="Password" />
                                                    <label for="multiStepsPass"> {{ __('site.Password') }}</label>
                                                </div>
                                                <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i
                                                        class="mdi mdi-eye-off-outline"></i></span>
                                            </div>
                                            @error('password')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 form-password-toggle">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="password" id="multiStepsConfirmPass"
                                                        name="confirm_password" class="form-control"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        aria-describedby="Confirm Password" />
                                                    <label for="multiStepsConfirmPass">
                                                        {{ __('site.ConfirmPassword') }}</label>
                                                </div>
                                                <span class="input-group-text cursor-pointer"
                                                    id="multiStepsConfirmPass2"><i
                                                        class="mdi mdi-eye-off-outline"></i></span>
                                            </div>
                                            @error('confirm_password')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="file" id="national_id" name="national_id"
                                                    class="form-control" placeholder="{{ __('site.NationalId') }}" />
                                                <label for="multiStepsFirstName"> {{ __('site.NationalId') }}</label>
                                            </div>
                                            @error('national_id')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-secondary btn-prev" disabled>
                                                <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">
                                                    {{ __('site.Previous') }}</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">
                                                    {{ __('site.Next') }}</span>
                                                <i class="mdi mdi-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personalInfoValidation" class="content">
                                    <div class="content-header mb-3">
                                        <h4 class="mb-0"> {{ __('site.PersonalInformation') }}</h4>
                                        <small>{{ __('site.EnterPersonal') }}</small>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="multiStepsFirstName" name="first_name"
                                                    class="form-control" placeholder="{{ __('site.FirstName') }}"
                                                    value="{{ old('first_name') }}" />
                                                <label for="multiStepsFirstName"> {{ __('site.FirstName') }}</label>
                                            </div>
                                            @error('first_name')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="multiStepsLastName" name="last_name"
                                                    class="form-control" placeholder="{{ __('site.LastName') }}"
                                                    value="{{ old('last_name') }}" />
                                                <label for="multiStepsLastName"> {{ __('site.LastName') }}</label>
                                            </div>
                                            @error('last_name')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-merge">
                                                {{-- <span class="input-group-text">US (+1)</span> --}}
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" id="multiStepsMobile" name="phone"
                                                        class="form-control multi-steps-mobile"
                                                        placeholder="{{ __('site.Phone') }}"
                                                        value="{{ old('phone') }}" />
                                                    <label for="multiStepsMobile"> {{ __('site.Phone') }}</label>
                                                </div>
                                                @error('phone')
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                            {{ $message }} </div>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="multiStepsAddress" name="address"
                                                    class="form-control" placeholder="{{ __('site.Address') }}"
                                                    value="{{ old('address') }}" />
                                                <label for="multiStepsAddress"> {{ __('site.Address') }}</label>
                                            </div>
                                            @error('address')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="file" id="image" name="image"
                                                    class="form-control" placeholder="{{ __('site.Image') }} " />
                                                <label for="multiStepsFirstName"> {{ __('site.Image') }} </label>
                                            </div>
                                            @error('image')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-secondary btn-prev">
                                                <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">
                                                    {{ __('site.Previous') }}</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">
                                                    {{ __('site.Next') }}</span>
                                                <i class="mdi mdi-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Billing Links -->
                                <div id="billingLinksValidation" class="content">
                                    <!--/ Custom plan options -->
                                    <div class="content-header mb-3">
                                        <h4 class="mb-0">{{ __('site.PaymentInformation') }}</h4>
                                    </div>
                                    <!-- Credit Card Details -->
                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <div class="form-floating form-floating-outline">
                                                <select id="payment_method" class="select2 form-select"
                                                    data-allow-clear="true" name="payment_method">
                                                    <option value="">Select</option>
                                                    <option value="Visa">Visa</option>
                                                    <option value="InstPay">InstPay</option>
                                                    <option value="Vodafone Cash">Vodafone Cash</option>
                                                </select>
                                                <label for="payment_method"> {{ __('site.PaymentMethod') }}</label>
                                            </div>
                                            @error('payment_method')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input id="AccountNumber" class="form-control multi-steps-card"
                                                        name="account_number" type="text"
                                                        placeholder="1356 3215 6548 7898"
                                                        aria-describedby="Account Number"
                                                        value="{{ old('account_number') }}" />
                                                    <label for="AccountNumber">
                                                        {{ __('site.AccountNumber') }}</label>
                                                </div>
                                            </div>
                                            @error('account_number')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div> --}}
                                        <div class="col-sm-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" name="account_number" id="account_number"
                                                    class="form-control" placeholder="{{ __('site.AccountNumber') }}"
                                                    aria-label="account_number"
                                                    value="{{ old('account_number') }}" />
                                                <label for="account_number"> {{ __('site.AccountNumber') }}</label>
                                            </div>
                                            @error('account_number')
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    <div data-field="multiStepsUsername" data-validator="notEmpty">
                                                        {{ $message }} </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <button class="btn btn-secondary btn-prev">
                                                <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">
                                                    {{ __('site.Previous') }}</span>
                                            </button>
                                            <button type="submit" class="btn btn-primary btn-next btn-submit">
                                                {{ __('site.Register') }}</button>
                                        </div>
                                    </div>
                                    <!--/ Credit Card Details -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Multi Steps Registration -->
        </div>
    </div>

    <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
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
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-auth-multisteps.js') }}"></script>
</body>

</html>
