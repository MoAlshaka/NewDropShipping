@extends('layouts.seller.master')


@section('title')
    {{ __('site.AffiliateProducts') }}
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-c5dyc+3ht10w+7s6OfBxHwZZkm5A+qLmLaB+pa3RFsKcOCme7/uBv2mtUfFjS+2b2q5j//BXJsW0sB2EhfaR6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}" />
    <style>
        .accordion-button {
            width: 0% !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"> {{ __('site.Dashboard') }} /</span>
            {{ __('site.AffiliateProducts') }}</h4>

        <div class="flex flex-col gap-6">
            <div class="col-md mb-4 mb-md-2">
                <div class="accordion mt-3" id="accordionWithIcon">
                    <div class="accordion-item">

                        <div class=" d-flex align-items-center">

                            <div class=" h-full flex flex-fill gap-6">
                                <a class="hover:border-b-4 hover:border-purple-700 flex gap-2 items-center justify-center"
                                    href="{{ route('seller.affiliateproducts.index') }}">
                                    <i class="mdi mdi-select-all"></i>
                                    {{ __('site.AllProducts') }}
                                </a>
                                <a class="hover:border-b-4 hover:border-purple-700 flex gap-2 items-center justify-center"
                                    href="{{ route('new.affiliate.product') }}">
                                    <i class="mdi mdi-new-box"></i>
                                    {{ __('site.NewProducts') }}
                                </a>
                                <a class="hover:border-b-4 hover:border-purple-700 flex gap-2 items-center justify-center"
                                    href="{{ route('suggested.affiliate.product') }}">
                                    <i class="mdi mdi-rocket-launch-outline"></i>
                                    {{ __('site.SuggestedProducts') }}
                                </a>


                            </div>
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordionWithIcon-1" aria-expanded="false">
                            </button>
                        </div>

                        <div id="accordionWithIcon-1" class="accordion-collapse collapse" style="">
                            <div class="accordion-body">
                                <form id="formAuthentication" class="mb-3 row"
                                    action="{{ route('search.affiliate.product') }}" method="post">
                                    @csrf
                                    <div class="form-floating form-floating-outline mb-3 col ">
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Enter your product title" autofocus />
                                        <label for="title"> {{ __('site.Title') }}</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-3 col">
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            placeholder="Enter your product sku" autofocus />
                                        <label for="sku"> {{ __('site.SKU') }}</label>
                                    </div>
                                    <div class="form-floating form-floating-outline mb-3 col">
                                        <select class="form-select form-select-lg country" name="category_id">
                                            <option value="">{{ __('site.SelectCategory') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="country"> {{ __('site.Category') }}</label>
                                    </div>
                                    <button class="btn btn-primary mb-3 col" type="submit">
                                        {{ __('site.Search') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="bg-white drop-shadow h-full p-4 rounded-md flex gap-6">
                <a class="hover:border-b-4 hover:border-purple-700 flex gap-2 items-center justify-center"
                    href="{{ route('seller.affiliateproducts.index') }}">
                    <i class="menu-icon tf-icons mdi mdi-earth"></i>
                    {{ __('site.AllCountries') }}
                </a>

                @isset($countries)
                    @foreach ($countries as $country)
                        <a class="hover:border-b-4 hover:border-purple-700 flex gap-2 items-center justify-center"
                            href="{{ route('affiliate.country.filter', $country->id) }}">
                            <img src="{{ asset('assets/countries/flags/' . $country->flag) }}" alt="{{ $country->name }}"
                                width="40" height="40">
                            <span>{{ $country->name }}</span></a>
                    @endforeach
                @endisset
            </div>
            <div
                class="bg-white drop-shadow h-full p-4 rounded-md grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 justify-items-center">

                @if ($products->isEmpty())
                    <div class="px-4 py-4 text-center text-gray-500 dark:text-gray-400"> {{ __('site.NoProducts') }}</div>
                @endif
                @isset($products)
                    @foreach ($products as $product)
                        <div
                            class="flex flex-col group rounded-md bg-gray-50 drop-shadow hover:border-2 hover:border-purple-700">
                            <div class="relative grow">
                                <div
                                    class="absolute w-full h-full bg-black opacity-0 ease-in-out duration-300 group-hover:opacity-40">
                                </div>
                                <img class="w-full h-full object-cover"
                                    src="{{ asset('assets/products/affiliateproduct/images/' . $product->image) }}"
                                    alt="..."
                                    onerror="this.onerror=null;this.src='https://app.codpartner.com/images/no_image_found.jpg';" />
                            </div>

                            <div class="relative">
                                <a href="{{ route('seller.affiliateproduct.show', $product->id) }}"
                                    class="absolute opacity-0 top-[-60px] left-[-50%] group-hover:left-0 group-hover:!opacity-100 bg-purple-700 text-white p-2 rounded-tr-xl rounded-br-xl ease-out duration-100"
                                    target="_blank">
                                    <i class="far fa-eye"></i> <b> {{ __('site.ViewDetails') }} </b>
                                </a>
                            </div>

                            <div class="p-2">
                                <a href="{{ route('seller.affiliateproduct.show', $product->id) }}" target="_blank">
                                    <h6 class="text-purple-900 line-clamp-1">{{ $product->title }}</h6>
                                </a>
                                <div class="d-flex gap-2 my-2" style="grid-row-gap: 0.3rem; grid-column-gap: 0.3rem">
                                    @foreach ($product->affiliatecountries as $country)
                                        <span class="rounded-md font-bold text-sm">
                                            <object type="image/svg+xml"
                                                data="{{ asset('assets/countries/flags/' . $country->flag) }}" width="20"
                                                height="20"></object>
                                        </span>
                                    @endforeach
                                </div>
                                <div>
                                    <div>
                                        <b>${{ $product->minimum_selling_price }} - ${{ $product->comission }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
            {{ $products->links() }}
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
