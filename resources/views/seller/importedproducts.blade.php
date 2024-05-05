@extends('layouts.seller.master')


@section('title')
    {{ __('site.ImportedProducts') }}
@endsection


@section('css')
    <script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> {{ __('site.Dashboard') }} /</span>
            {{ __('site.ImportedProducts') }}</h4>

        <div class="flex flex-col gap-6">
            <div
                class="bg-white drop-shadow h-full p-4 rounded-md grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 justify-items-center h-[400px]">
                @if (count($importedSharedProducts) == 0 && count($importedAffiliateProducts) == 0)
                    <h1 class="text-center"> {{ __('site.NoProducts') }}</h1>
                @endif

                @isset($importedSharedProducts)
                    @foreach ($importedSharedProducts as $sharedProduct)
                        <div
                            class="flex flex-col group rounded-md bg-gray-50 drop-shadow hover:border-2 hover:border-purple-700">
                            <div class="relative grow">
                                <div
                                    class="absolute w-full h-full bg-black opacity-0 ease-in-out duration-300 group-hover:opacity-40">
                                </div>
                                <img class="w-full h-full object-cover"
                                    src="{{ asset('assets/products/sharedproduct/images/' . $sharedProduct->image) }}"
                                    alt="..."
                                    onerror="this.onerror=null;this.src='https://app.codpartner.com/images/no_image_found.jpg';" />
                            </div>

                            <div class="relative">
                                <a href="{{ route('seller.sharedproduct.show', $sharedProduct->id) }}"
                                    class="absolute opacity-0 top-[-60px] left-[-50%] group-hover:left-0 group-hover:!opacity-100 bg-purple-700 text-white p-2 rounded-tr-xl rounded-br-xl ease-out duration-100"
                                    target="_blank">
                                    <i class="far fa-eye"></i> <b> {{ __('site.ViewDetails') }} </b>
                                </a>
                            </div>

                            <div class="p-2">
                                <a href="{{ route('seller.sharedproduct.show', $sharedProduct->id) }}" target="_blank">
                                    <h6 class="text-purple-900 line-clamp-1">{{ $sharedProduct->title }}</h6>
                                </a>
                                <div class="d-flex gap-2 my-2" style="grid-row-gap: 0.3rem; grid-column-gap: 0.3rem">
                                    @foreach ($sharedProduct->sharedcountries as $country)
                                        <span class="rounded-md font-bold text-sm">
                                            <object type="image/svg+xml"
                                                data="{{ asset('assets/countries/flags/' . $country->flag) }}" width="20"
                                                height="20"></object>
                                        </span>
                                    @endforeach
                                </div>
                                <div>
                                    <div>
                                        <b>${{ $sharedProduct->unit_cost }} - ${{ $sharedProduct->recommended_price }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
                @isset($importedAffiliateProducts)
                    @foreach ($importedAffiliateProducts as $sharedProduct)
                        <div
                            class="flex flex-col group rounded-md bg-gray-50 drop-shadow hover:border-2 hover:border-purple-700">
                            <div class="relative grow">
                                <div
                                    class="absolute w-full h-full bg-black opacity-0 ease-in-out duration-300 group-hover:opacity-40">
                                </div>
                                <img class="w-full h-full object-cover"
                                    src="{{ asset('assets/products/affiliateproduct/images/' . $sharedProduct->image) }}"
                                    alt="..."
                                    onerror="this.onerror=null;this.src='https://app.codpartner.com/images/no_image_found.jpg';" />
                            </div>

                            <div class="relative">
                                <a href="{{ route('seller.affiliateproduct.show', $sharedProduct->id) }}"
                                    class="absolute opacity-0 top-[-60px] left-[-50%] group-hover:left-0 group-hover:!opacity-100 bg-purple-700 text-white p-2 rounded-tr-xl rounded-br-xl ease-out duration-100"
                                    target="_blank">
                                    <i class="far fa-eye"></i> <b> {{ __('site.ViewDetails') }} </b>
                                </a>
                            </div>

                            <div class="p-2">
                                <a href="{{ route('seller.affiliateproduct.show', $sharedProduct->id) }}" target="_blank">
                                    <h6 class="text-purple-900 line-clamp-1">{{ $sharedProduct->title }}</h6>
                                </a>
                                <div class="d-flex gap-2 my-2" style="grid-row-gap: 0.3rem; grid-column-gap: 0.3rem">
                                    @foreach ($sharedProduct->affiliatecountries as $country)
                                        <span class="rounded-md font-bold text-sm">
                                            <object type="image/svg+xml"
                                                data="{{ asset('assets/countries/flags/' . $country->flag) }}" width="20"
                                                height="20"></object>
                                        </span>
                                    @endforeach
                                </div>
                                <div>
                                    <div>
                                        <b>${{ $sharedProduct->minimum_selling_price }} - ${{ $sharedProduct->comission }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
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
