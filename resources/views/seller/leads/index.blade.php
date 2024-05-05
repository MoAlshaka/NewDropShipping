@extends('layouts.seller.master')


@section('title')
    {{ __('site.Leads') }}
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

    <!-- Page CSS -->

    <!-- Helpers -->
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> {{ __('site.Dashboard') }} /</span>
            {{ __('site.Leads') }}</h4>
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
            <div class="row">
                <h5 class="card-header col-10"> {{ __('site.Leads') }}</h5>
                <div class="col-2 mt-3">
                    <a href="{{ route('leads.create') }}" class="btn rounded btn-success waves-effect waves-light">
                        {{ __('site.Add') }}</a>
                </div>
            </div>
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
                                        @if ($lead->status == 'pending')
                                            <a class="  text-primary hover:bg-success hover:text-white"
                                                href="{{ route('leads.edit', $lead->id) }}">
                                                <button type="button"
                                                    class="btn btn-icon btn-primary waves-effect waves-light">
                                                    <span class="tf-icons mdi mdi-tag-edit-outline"></span>

                                                </button>
                                            </a>
                                            <form action="{{ route('leads.destroy', $lead->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-icon btn-danger waves-effect waves-light">
                                                    <span class="tf-icons mdi mdi-trash-can-outline"></span>

                                                </button>
                                            </form>
                                        @else
                                            {{ __('site.NoAction') }}
                                        @endif


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
    <!-- / Content -->
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

    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
