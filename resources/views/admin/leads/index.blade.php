@extends('layouts.master')


@section('title')
    {{ __('site.Leads') }}
@endsection


@section('css')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('site.Dashboard') }}/</span> {{ __('site.Leads') }}
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
        <div class="card">
            <h5 class="card-header">{{ __('site.Leads') }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>{{ __('site.REF') }}</th>
                            <th>{{ __('site.CreatedAt') }}</th>
                            <th>{{ __('site.Customer') }}</th>
                            <th>{{ __('site.Phone') }}</th>
                            <th>{{ __('site.SKU') }}</th>
                            <th>{{ __('site.Total') }}</th>
                            <th>{{ __('site.Status') }}</th>
                            <th>{{ __('site.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (isset($leads))
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($leads as $lead)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $lead->store_reference }}</td>
                                    <td>{{ $lead->order_date }}</td>
                                    <td>{{ $lead->customer_name }}</td>
                                    <td>{{ $lead->customer_phone }}</td>
                                    <td>{{ $lead->item_sku }}</td>
                                    <td>{{ $lead->total }}</td>
                                    <td> {{ $lead->status }}</td>
                                    <td style="display: flex;
                                        gap: 6px;">

                                        <a class="  text-primary hover:bg-success hover:text-white"
                                            href="{{ route('admin.leads.edit', $lead->id) }}">
                                            <button type="button"
                                                class="btn btn-icon btn-primary waves-effect waves-light">
                                                <span class="tf-icons mdi mdi-tag-edit-outline"></span>

                                            </button>
                                        </a>
                                        <form action="{{ route('admin.leads.delete', $lead->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-icon btn-danger waves-effect waves-light">
                                                <span class="tf-icons mdi mdi-trash-can-outline"></span>

                                            </button>
                                        </form>



                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">No data
                                </td>
                            </tr>
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
