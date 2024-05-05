@extends('layouts.seller.master')


@section('title')
    {{ __('site.Editlead') }}
@endsection


@section('css')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> {{ __('site.Dashboard') }} /</span> {{ __('site.Editlead') }}
        </h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"> {{ __('site.Edit') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('leads.update', $lead->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="basic-default-fullname"
                                    placeholder="Order Date" />
                                <label for="basic-default-fullname"> {{ __('site.OrderDate') }}</label>
                            </div>
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Store Reference" value="{{ $lead->store_reference }}"
                                    name="store_reference" />
                                <label for="basic-default-company"> {{ __('site.StoreReference') }}</label>
                            </div>
                            @error('store_reference')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Store Name" value="{{ $lead->store_reference }}" name="store_name" />
                                <label for="basic-default-company"> {{ __('site.StoreName') }}</label>
                            </div>
                            @error('store_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="multicol-country" class="select2 form-select" data-allow-clear="true"
                                        name="warehouse">
                                        <option value="{{ $lead->warehouse }}">{{ $lead->warehouse }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}"> {{ $country->name }} </option>
                                        @endforeach
                                    </select>
                                    <label for="multicol-country"> {{ __('site.Warehouse') }}</label>
                                </div>
                            </div>
                            @error('warehouse')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Customer Name" value="{{ $lead->customer_name }}" name="customer_name" />
                                <label for="basic-default-company"> {{ __('site.CustomerName') }}</label>
                            </div>
                            @error('customer_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                    value="{{ $lead->customer_phone }}" name="customer_phone" />
                                <label for="basic-default-phone"> {{ __('site.Phone') }}</label>
                            </div>
                            @error('customer_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                    value="{{ $lead->customer_mobile }}" name="customer_mobile" />
                                <label for="basic-default-phone"> {{ __('site.Mobile') }}</label>
                            </div>
                            @error('customer_mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-4">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="basic-default-email" class="form-control"
                                            placeholder="Email" value="{{ $lead->customer_email }}"
                                            name="customer_email" />
                                        <label for="basic-default-email"> {{ __('site.Email') }}</label>
                                    </div>
                                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                </div>

                                <div class="form-text">You can use letters, numbers & periods</div>
                            </div>
                            @error('customer_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Customer Country" value="{{ $lead->customer_country }}"
                                    name="customer_country" />
                                <label for="basic-default-company"> {{ __('site.CustomerCountry') }}</label>
                            </div>
                            @error('customer_country')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Customer City" value="{{ $lead->customer_city }}" name="customer_city" />
                                <label for="basic-default-company"> {{ __('site.CustomerCity') }}</label>
                            </div>
                            @error('customer_city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Customer Address" value="{{ $lead->customer_address }}"
                                    name="customer_address" />
                                <label for="basic-default-company"> {{ __('site.CustomerAddress') }}</label>
                            </div>
                            @error('customer_address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="multicol-country" class="select2 form-select" data-allow-clear="true"
                                        name="item_sku">
                                        <option value="{{ $lead->item_sku }}">{{ $lead->item_sku }}</option>
                                        @foreach ($skus as $sku)
                                            <option value="{{ $sku }}"> {{ $sku }} </option>
                                        @endforeach
                                    </select>
                                    <label for="multicol-country"> {{ __('site.SKU') }}</label>
                                </div>
                            </div>
                            @error('item_sku')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="number" step="0.01" class="form-control" id="basic-default-company"
                                    placeholder="Quantity" value="{{ $lead->quantity }}" name="quantity" />
                                <label for="basic-default-company"> {{ __('site.Quantity') }}</label>
                            </div>
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="number" step="0.01" class="form-control" id="basic-default-company"
                                    placeholder="Total" value="{{ $lead->total }}" name="total" />
                                <label for="basic-default-company"> {{ __('site.Total') }}</label>
                            </div>
                            @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Currency" value="{{ $lead->currency }}" name="currency" />
                                <label for="basic-default-company"> {{ __('site.Currency') }}</label>
                            </div>
                            @error('currency')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-4">
                                <textarea id="basic-default-message" class="form-control" name="notes" style="height: 60px">{{ $lead->notes }}</textarea>
                                <label for="basic-default-message"> {{ __('site.Notes') }}</label>
                            </div>
                            <button type="submit" class="btn btn-primary"> {{ __('site.Send') }}</button>
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
