@extends('layouts.master')


@section('title')
    {{ __('site.CreateTransaction') }}
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('site.Dashboard') }}/</span>
            {{ __('site.CreateTransaction') }}</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">{{ __('site.Transaction') }}</h5>

                    </div>
                    <div class="card-body">
                        <form class="flex flex-col gap-6" action="{{ route('transactions.store') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="sellerId">{{ __('site.Sellers') }}</label>
                                <div class="col-sm-10">
                                    <select id="sellerId" class="form-select form-select-lg" data-allow-clear="true"
                                        name="seller_id">
                                        <option value="">{{ __('site.SelectSeller') }}</option>
                                        @foreach ($sellers as $seller)
                                            <option value="{{ $seller->id }}">
                                                {{ $seller->first_name . ' ' . $seller->last_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('seller_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">
                                    {{ __('site.PaymentMethod') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="paymentMethod" name="payment_method"
                                        placeholder="{{ __('site.PaymentMethod') }}" />
                                </div>
                                @error('payment_method')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">
                                    {{ __('site.AccountNumber') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="accountNumber" name="account_number"
                                        placeholder="{{ __('site.AccountNumber') }}" />
                                </div>
                                @error('account_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">
                                    {{ __('site.Amount') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" class="form-control" id="basic-default-name"
                                        name="amount" placeholder="{{ __('site.Amount') }}" />
                                </div>
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="status">{{ __('site.Status') }}</label>
                                <div class="col-sm-10">
                                    <select id="status" class="select2 form-select form-select-lg"
                                        data-allow-clear="true" name="status">
                                        <option value="">{{ __('site.Status') }}</option>
                                        <option value="1">{{ __('site.Status') }}</option>
                                        <option value="2">{{ __('site.Status') }}</option>
                                        <option value="3">{{ __('site.Status') }}</option>
                                        <option value="4">{{ __('site.Status') }}</option>

                                    </select>

                                </div>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary"> {{ __('site.Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bloodhound/bloodhound.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/app-logistics-dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sellerOptionId = document.getElementById('sellerId');
            const accountNumber = document.getElementById('accountNumber');
            const paymentMethod = document.getElementById('paymentMethod');

            sellerOptionId.addEventListener('change', function() {
                const sellerId = this.value;
                console.log(sellerId);
                // document.getElementById('price').value = sellerId;
                try {
                    fetch(`/admin/transaction/seller/${sellerId}`).then((response) => {
                        return response.json();
                    }).then((data) => {
                        accountNumber.value = data.account_number;
                        paymentMethod.value = data.payment_method;
                    })

                } catch (error) {

                }
            });



        })
    </script>
@endsection
