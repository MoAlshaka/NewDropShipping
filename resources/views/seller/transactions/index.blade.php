@extends('layouts.seller.master')


@section('title')
    {{ __('site.Transactions') }}
@endsection


@section('css')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('site.Dashboard') }} /</span>
            {{ __('site.Transactions') }}</h4>
        <div class="card">
            <div class="row">
                <h5 class="card-header col-10"> {{ __('site.Transactions') }}</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>{{ __('site.Seller') }}</th>
                            <th>{{ __('site.PaymentMethod') }}</th>
                            <th>{{ __('site.AccountNumber') }}</th>
                            <th>{{ __('site.Amount') }}</th>
                            <th>{{ __('site.Status') }}</th>
                            <th>{{ __('site.DateTransaction') }}</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($transactions->isEmpty())
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                    {{ __('site.NoData') }}</td>
                            </tr>
                        @else
                            @php $i = 1; @endphp
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $transaction->seller->first_name . ' ' . $transaction->seller->last_name }}</td>
                                    <td>{{ $transaction->seller->payment_method }}</td>
                                    <td>{{ $transaction->seller->account_number }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>{{ $transaction->created_at }}</td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
