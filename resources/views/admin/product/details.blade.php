@extends('layouts.admin')

@section('title', 'Product Create')

@section('style')
    <style>
        .swiper {
            width: 100%;
            height: 300px;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between align-items-center col-12 mb-4">
            <h1>Product Details</h1>
            <a href="{{ route('product.list') }}" class="btn btn-dark">Back</a>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($product->productImage as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->getImage() }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-3">
                            Name
                        </div>
                        <div class="col-2">
                            -
                        </div>
                        <div class="col-7">
                            {{ $product->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Category
                        </div>
                        <div class="col-2">
                            -
                        </div>
                        <div class="col-7">
                            {{ $product->category->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Stock Count
                        </div>
                        <div class="col-2">
                            -
                        </div>
                        <div class="col-7">
                            {{ $product->stock_count }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Sale Price
                        </div>
                        <div class="col-2">
                            -
                        </div>
                        <div class="col-7">
                            {{ $product->sale_price }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Purchase Price
                        </div>
                        <div class="col-2">
                            -
                        </div>
                        <div class="col-7">
                            {{ $product->purchase_price }}
                        </div>
                    </div>
                    @if ($product->expire_date != '')
                        <div class="row mb-3">
                            <div class="col-3">
                                Expire Date
                            </div>
                            <div class="col-2">
                                -
                            </div>
                            <div class="col-7">
                                {{ $product->expire_date }}
                            </div>
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-3">
                            Description
                        </div>
                        <div class="col-2">
                            -
                        </div>
                        <div class="col-7">
                            {{ $product->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
@endsection
