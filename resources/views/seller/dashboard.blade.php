@extends('layouts.seller.master')


@section('title')
    {{ __('site.Dashboard') }}
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-chat.css') }}" />

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
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> {{ __('site.Seller') }} /</span>
            {{ __('site.Dashboard') }}</h4>

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row gy-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="mdi mdi-source-fork mdi-20px"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">
                                    @isset($leads)
                                        {{ $leads }}
                                    @endisset
                                </h4>
                            </div>
                            <p class="mb-0 text-heading"> {{ __('site.Totalleads') }} </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-warning h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="mdi mdi-phone mdi-20px"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">
                                    @isset($approvedLeadsCount)
                                        {{ $approvedLeadsCount }}
                                    @endisset
                                </h4>
                            </div>
                            <p class="mb-0 text-heading"> {{ __('site.ConfirmedLeads') }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-danger h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-danger">

                                        <i class="mdi mdi-bus-school mdi-20px"></i>
                                    </span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">
                                    @isset($deliveredLeadsCount)
                                        {{ $deliveredLeadsCount }}
                                    @endisset
                                </h4>
                            </div>
                            <p class="mb-0 text-heading"> {{ __('site.DeliveredLeads') }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-border-shadow-info h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-info"><i
                                            class="mdi mdi-currency-usd mdi-20px"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0 display-6">13$</h4>
                            </div>
                            <p class="mb-0 text-heading"> {{ __('site.TotalRevenue') }} </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 g-4">
            <div class="col-12 col-xl-8">
                <div class="app-chat card-body overflow-hidden">
                    <div class="row g-0">
                        <!-- Sidebar Left -->
                        <div class="col app-chat-sidebar-left app-sidebar overflow-hidden">

                        </div>
                        <!-- /Sidebar Left-->

                        <!-- Chat & Contacts -->
                        <div class="  col app-sidebar flex-grow-0 overflow-hidden border-end">

                        </div>
                        <!-- /Chat contacts -->

                        <!-- Chat History -->
                        <div class="col card-body">

                        </div>
                        <!-- /Chat History -->

                        <!-- Sidebar Right -->

                        <!-- /Sidebar Right -->

                        <div class="app-overlay"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2"> {{ __('site.TopSellers') }}</h5>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless border-top">
                            <thead class="border-bottom">
                                <tr>
                                    <th> {{ __('site.Sellers') }}</th>
                                    <th class="text-end"> {{ __('site.RankPoints') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center mt-lg-4">
                                            <div class="avatar avatar-sm me-3">
                                                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-truncate">Maven Analytics</h6>
                                                <small class="text-truncate">Business Intelligence</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="user-progress mt-lg-4">
                                            <h6 class="mb-0">33</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-truncate">Zsazsa McCleverty</h6>
                                                <small class="text-truncate">Digital Marketing</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="user-progress">
                                            <h6 class="mb-0">52</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-truncate">Nathan Wagner</h6>
                                                <small class="text-truncate">UI/UX Design</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="user-progress">
                                            <h6 class="mb-0">12</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-truncate">Emma Bowen</h6>
                                                <small class="text-truncate">React Native</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="user-progress">
                                            <h6 class="mb-0">8</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
    <script src="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/app-chat.js') }}"></script>
@endsection
