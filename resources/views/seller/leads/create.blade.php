@extends('layouts.seller.master')

@section('title')
    {{ __('site.CreateLeads') }}
@endsection

@section('css')
    <script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
    <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" />

    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/excel/ejexcelMaster.css') }}" />
@endsection

@section('popup')
    <div id="overlay"></div>
    <div id="customPopup">
        <div class="x-error">
            <span>x</span>
        </div>
        <h3> {{ __('site.Error') }}!</h3>
        <p id="popupContent"></p>
        <button id="closePopup"> {{ __('site.Close') }}</button>
    </div>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> {{ __('site.Dashboard') }} /</span>
            {{ __('site.CreateLeads') }}</h4>
        <div class="card">
            <div class="excel_container" data-country="{{ $countries }}" data-sku="{{ $sku }}">
                <div id="spreadsheet"></div>
            </div>
            @csrf
            <div>
                <button id="addRow" class="btn btn-primary waves-effect waves-light"
                    data-route="{{ route('leads.store') }}"> {{ __('site.Save') }}</button>
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
    {{-- <script src="{{ asset('node_modules/jspreadsheet-ce/dist/index.min.js') }}"></script> --}}
    <script src="{{ asset('assets/excel/ejexcelMaster.js') }}"></script>
    <script src="{{ asset('assets/excel/popUp.js') }}"></script>
@endsection
