@extends('layouts.front.front_layout')
@section('content')

<section data-anim-wrap class="hero -type-3 bg-accent-1">
    <div class="container">
        <div class="row">
            <div class="hero__contentCol col-xl-4">
                <div class="hero__content">
                    <div data-anim-child="slide-up" class="hero__subtitle text-white mb-20">
                        Authentic Seafood from Northwest Fishery
                    </div>

                    <h1 data-anim-child="slide-up delay-2" class="hero__title text-white">
                        Bringing the Best Catch
                    </h1>
                </div>
            </div>

            <div data-anim-child="img-right cover-accent-1 delay-2" class="col-xl-8">
                <div class="hero-slider verticalSlider js-verticalSlider-type-2">
                    <div class="swiper-wrapper flex-column h-auto">

                        <div class="swiper-slide">
                            <img src="{{ URL::to('assets/front/img/general/pro-banner.png') }}" alt="image" class="hero-slider__image">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero__arrow">
        <button class="size-70 flex-center rounded-full">
            <i class="icon-arrow-down text-24"></i>
        </button>
    </div>
</section>

<section class="pb-60">
    <div data-anim-wrap class="container">
        @if(!empty($categories_with_products))
            @foreach($categories_with_products as $category)
            <div class="row pt-60">
                <div class="col-auto">
                    <h2 class="text-50 md:text-40 lh-11">
                        {{$category->name??''}}
                    </h2>
                </div>
            </div>
            <div class="row x-gap-30 y-gap-60 pt-50 sm:pt-50">
                @foreach($category->products as $product)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('product.show', $product->slug) }}" data-anim-child="slide-up delay-2" class="roomCard -type-2 -hover-button-center d-block bg-accent-1 rounded-16 overflow-hidden">
                        <div class="roomCard__image -no-line -hover-button-center__wrap">
                            <img src="{{ asset('uploads/products/' . $product->image_1) }}" alt="{{ $product->name??'' }}">

                            <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                                <span class="text-15 fw-500 text-white">VIEW</span>
                            </div>
                        </div>

                        <div class="roomCard__content text-center px-30 py-30">
                            <h3 class="roomCard__title lh-065 text-30 md:text-24 text-white">{{$product->name??''}}</h3>

                            <p class="text-white mt-30 short-desc">
                            {!! $product->short_description ?? '' !!}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endforeach
        @endif
    </div>
</section>


@endsection