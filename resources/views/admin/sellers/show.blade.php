@extends('layouts.master')


@section('title')
    {{ $seller->first_name }}
@endsection


@section('css')
    <script src="https://cdn.tailwindcss.com"></script>
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

    <!-- Page CSS -->


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
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('site.Dashboard') }} /</span> {{ __('site.Show') }}
        </h4>
        @if (session()->has('Add'))
            <div class="alert alert-success" role="alert">{{ session()->get('Add') }}</div>
        @endif
        @if (session()->has('Update'))
            <div class="alert alert-primary" role="alert">{{ session()->get('Update') }}</div>
        @endif
        @if (session()->has('Delete'))
            <div class="alert alert-danger" role="alert">{{ session()->get('Delete') }}</div>
        @endif
        @if (session()->has('Warning'))
            <div class="alert alert-warning" role="alert">{{ session()->get('Warning') }}</div>
        @endif


        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-8 gap-4 p-4">
            <div class="product-card col-span-8 lg:col-span-3 py-2 px-4 rounded-md drop-shadow bg-white">
                <div class="product-img flex mb-4">
                    <img src="{{ asset('assets/sellers/images/national_id/' . $seller->national_id) }}" alt="id image"
                        class="w-full h-full object-cover" />
                </div>
                <div style="display: flex; gap: 6px;">
                    <form action="{{ route('admin.sellers.active', $seller->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class=" @if ($seller->is_active == 0) btn bg-success text-white @else btn bg-warning text-white @endif">
                            @if ($seller->is_active == 0)
                                {{ __('site.Active') }}
                            @else
                                {{ __('site.Deactivate') }}
                            @endif
                        </button>
                    </form>
                    <form action="{{ route('admin.sellers.delete', $seller->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-danger text-white">{{ __('site.Delete') }}</button>
                    </form>
                </div>
            </div>
            <div class="product-disc col-span-8 lg:col-span-5 bg-white rounded-md drop-shadow">
                <div class="py-8 px-4">
                    <h3 class="text-2xl font-bold">{{ $seller->first_name . ' ' . $seller->last_name }}</h3>
                </div>
                <hr />
                <div class="px-2">
                    <div class="py-6 px-2">
                        <h3 class="text-md font-bold mb-4">{{ __('site.SellerInformations') }}:</h3>
                        <div class="flex flex-col gap-2 lg:items-start">
                            <div class="flex items-center">
                                <h3 class="text-md text-gray-500 lg:text-xl font-bold mr-6 lg:mr-2">
                                    {{ __('site.Email') }}:
                                </h3>
                                <span class="text-black">{{ $seller->email }}
                                </span>
                            </div>
                            <div class="flex items-center">
                                <h3 class="text-md text-gray-500 lg:text-xl font-bold mr-6 lg:mr-2">
                                    {{ __('site.Phone') }}:
                                </h3>
                                <span class="text-black">{{ $seller->phone }}</span>
                            </div>
                            <div class="flex items-center">
                                <h3 class="text-md text-gray-500 lg:text-xl font-bold mr-6 lg:mr-2">
                                    {{ __('site.Address') }}:
                                </h3>
                                <span class="text-black">{{ $seller->address }}</span>
                            </div>
                            <div class="flex items-center">
                                <h3 class="text-md text-gray-500 lg:text-xl font-bold mr-6 lg:mr-2">
                                    {{ __('site.PaymentMethod') }}:
                                </h3>
                                <span class="text-black">{{ $seller->payment_method }}</span>
                            </div>
                            <div class="flex items-center">
                                <h3 class="text-md text-gray-500 lg:text-xl font-bold mr-6 lg:mr-2">
                                    {{ __('site.AccountNumber') }}:
                                </h3>
                                <span class="text-black">{{ $seller->account_number }}</span>
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>

    </div>
@endsection



@section('js')
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
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
@endsection
