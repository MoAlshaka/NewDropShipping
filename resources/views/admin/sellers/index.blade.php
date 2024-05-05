@extends('layouts.master')


@section('title')
    {{ __('site.Sellers') }}
@endsection


@section('css')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">{{ __('site.Dashboard') }} /</span> {{ __('site.Sellers') }}
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
            <h5 class="card-header">{{ __('site.Sellers') }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>{{ __('site.Name') }}</th>
                            <th> {{ __('site.Email') }}</th>
                            <th> {{ __('site.Phone') }}</th>
                            <th> {{ __('site.Address') }}</th>
                            <th> {{ __('site.Status') }}</th>
                            <th> {{ __('site.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($sellers->isEmpty())
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                    {{ __('site.NoData') }}
                                </td>
                            </tr>
                        @else
                            @php $i = 1; @endphp
                            @foreach ($sellers as $seller)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $seller->first_name . ' ' . $seller->last_name }}</td>
                                    <td>{{ $seller->email }}</td>
                                    <td>{{ $seller->phone }}</td>
                                    <td>{{ $seller->address }}</td>
                                    <td>
                                        @if ($seller->is_active == 1)
                                            {{ __('site.Active') }}
                                        @else
                                            {{ __('site.Inactive') }}
                                        @endif
                                    </td>
                                    <td style="display: flex;
                                            gap: 6px;">

                                        <a href="{{ route('admin.sellers.show', $seller->id) }}"
                                            class="btn bg-primary text-white ">
                                            {{ __('site.Details') }}
                                        </a>



                                    </td>
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
