@extends('layouts.front.front_layout')
@section('content')

@php
$product_image_1 = !empty($product->image_1) ? $product->image_1 : '';
$product_image_2 = !empty($product->image_2) ? $product->image_2 : $product_image_1;
$product_image_3 = !empty($product->image_3) ? $product->image_3 : $product_image_1;
$product_image_4 = !empty($product->image_4) ? $product->image_4 : $product_image_1;
$category_name = !empty($product->category) ? $product->category->name : '';
$product_name = !empty($product->name) ? $product->name : '';
$short_description = !empty($product->short_description) ? $product->short_description : '';
$long_description = !empty($product->long_description) ? $product->long_description : '';

@endphp

<section class="pt-150">
    <div data-anim-wrap class="container">
        <div class="row y-gap-40 justify-between">
            <div data-anim-child="slide-up delay-1" class="col-xl-6 col-lg-6">

                <div class="fw-500 mb-30 mt-50 md:mt-30 md:mb-10 breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="icon-chevron-right"></i>
                    <a href="{{ route('fresh-catch') }}">{{$category_name??''}}</a>
                    <i class="icon-chevron-right"></i>
                    <p>{{$product_name??''}}</p>
                </div>
                <h1 class="text-50 md:text-30">{{$product_name??''}}</h1>


                <div class="line -horizontal bg-border mt-50 mb-50"></div>
                <p class="mt-40">
                    {!! $short_description??'' !!}
                </p>

                <div class="line -horizontal bg-border mt-50 mb-50"></div>
            </div>

            <div data-anim-child="slide-up delay-2" class="col-xl-6 col-lg-6">
                <div class="relative overflow-hidden js-section-slider" data-gap="0" data-slider-cols="xl-1 lg-1 md-1 sm-1 base-1" data-loop data-nav-prev="js-slider1-prev" data-nav-next="js-slider1-next">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="ratio ratio-80:55">
                                <img src="{{ asset('uploads/products/' . $product_image_2) }}" alt="image" class="img-ratio">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ratio ratio-80:55">
                                <img src="{{ asset('uploads/products/' . $product_image_3) }}" alt="image" class="img-ratio">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ratio ratio-80:55">
                                <img src="{{ asset('uploads/products/' . $product_image_4) }}" alt="image" class="img-ratio">
                            </div>
                        </div>

                    </div>

                    <div class="navAbsolute -type-4">
                        <button class="button -blue-1 size-80 md:size-60 text-white flex-center bg-accent-1-50 blur-1 rounded-full js-slider1-prev">
                            <i class="icon-arrow-left text-24 md:text-19"></i>
                        </button>

                        <button class="button -blue-1 size-80 md:size-60 text-white flex-center bg-accent-1-50 blur-1 rounded-full js-slider1-next">
                            <i class="icon-arrow-right text-24 md:text-19"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 mb-30">
                <h2 class="text-30">Product Description</h2>
                <p class="mt-40">
                    {!! $long_description??'' !!}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="pt-60 pb-50">
    <div data-anim-wrap class="container">
        <div class="row y-gap-30 justify-between items-end">
            <div data-anim-child="slide-up delay-1" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">EXPLORE</div>
                <h2 class="text-50 md:text-40 lh-065">Similar Products</h2>
            </div>

            <div data-anim-child="slide-up delay-1" class="col-auto">
                <a href="{{ route('fresh-catch') }}" class="button -type-1">
                    <i class="-icon icon-arrow-circle-right text-30"></i>
                    VIEW ALL
                </a>
            </div>
        </div>

        <div class="relative mt-100 sm:mt-50">
            <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-3 lg-3 md-2 sm-1 base-1" data-nav-prev="js-slider2-prev" data-nav-next="js-slider2-next">
                <div class="swiper-wrapper">
                    @if(!empty($similarProducts))
                        @foreach($similarProducts as $datalist)
                        <div class="swiper-slide">
                            <a class="roomCard -type-3 d-block rounded-16 overflow-hidden" data-anim-child="img-right cover-light-1 delay-2">
                                <div class="roomCard__image ratio ratio-45:50">
                                    <img src="{{ asset('uploads/products/' . $datalist->image_1) }}" alt="image" class="img-ratio">
                                </div>

                                <div class="roomCard__content px-30 py-30 text-center">
                                    <h3 class="roomCard__title lh-065 text-40 md:text-24 text-white"> {{$datalist->name??''}}</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <div data-anim-child="slide-up delay-4">
                                <a href="{{ route('product.show', $datalist->slug) }}" data-anim-child="slide-up delay-2" class="roomCard -type-2 -hover-button-center d-block bg-accent-1 rounded-16 overflow-hidden">
                                    <div class="roomCard__image -no-line -hover-button-center__wrap">
                                        <img src="{{ asset('uploads/products/' . $datalist->image_1) }}" alt="image" class="">

                                        <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                                            <span class="text-15 fw-500 text-white">VIEW</span>
                                        </div>
                                    </div>

                                    <div class="roomCard__content text-center px-30 py-30">
                                        <h3 class="roomCard__title lh-065 text-40 md:text-24 text-white">{{!empty($datalist->category) ? $datalist->category->name : ''}}</h3>

                                        <p class="text-white mt-30 short-desc">
                                            {!! $datalist->short_description ?? '' !!}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="navAbsolute -type-2">
                <button class="button -outline-accent-1 size-80 md:size-60 flex-center rounded-full js-slider2-prev">
                    <i class="icon-arrow-left text-24"></i>
                </button>

                <button class="button -outline-accent-1 size-80 md:size-60 flex-center rounded-full js-slider2-next">
                    <i class="icon-arrow-right text-24"></i>
                </button>
            </div>
        </div>
    </div>
</section>
@endsection