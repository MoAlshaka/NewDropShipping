@extends('layouts.master')


@section('title')
    {{ __('site.Edit') }}-{{ $country->name }}
@endsection


@section('css')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('site.Dashboard') }}/</span>
            {{ __('site.EditCountry') }} </h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0"> {{ __('site.Country') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="flex flex-col gap-6" action="{{ route('countries.update', $country->id) }} "
                            enctype="multipart/form-data" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-name">{{ __('site.CountryName') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="name"
                                        placeholder="Country Name" value="{{ $country->name }}" />
                                </div>
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">
                                    {{ __('site.ShippingCost') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" class="form-control" id="basic-default-company"
                                        name="shipping_cost" placeholder="Shipping Cost"
                                        value="{{ $country->shipping_cost }}" />
                                </div>
                            </div>
                            @error('shipping_cost')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-company">{{ __('site.Flag') }}</label>
                                <div class="col-sm-10">
                                    <input type="file" step="0.01" class="form-control" id="basic-default-company"
                                        name="flag" placeholder="Flag" />
                                </div>
                            </div>
                            @error('flag')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary"> {{ __('site.Update') }}</button>
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
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/app-logistics-dashboard.js') }}"></script>
@endsection
