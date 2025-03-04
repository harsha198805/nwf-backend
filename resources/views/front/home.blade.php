@extends('layouts.front.front_layout')
@section('content')

<section data-anim-wrap class="hero -type-6">
    <div data-anim-child="img-right cover-light-1 delay-2" class="hero__bg rounded-16">
        <video muted autoplay loop src="{{ URL::to('assets/front/video/main.mp4') }}" width="100%" height=""> </video>
    </div>
</section>
<section class="layout-pt-md">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-8 col-lg-10">
                <div data-split='lines' data-anim-child="split-lines delay-2">
                    <div class="text-15 uppercase mb-30 sm:mb-10">
                        NORTHWEST FISHERY (PVT) LTD
                    </div>
                    <h2 class="text-50 md:text-40 capitalize">
                        Get ready to experience the finest <br class="lg:d-none">
                        export-quality fish worldwide
                    </h2>
                </div>
                <div data-anim-child="slide-up delay-4" class="row justify-center">
                    <div class="col-lg-8">
                        <p class="mt-40 md:mt-20">
                            NorthWest Fishery has established itself as a supplier of high quality export grade fish worldwide, to its key customers in Japan, USA, Europe and more. The emphasis on quality is achieved through owning and operating our own vessels, EU approved state of the art production facility with our higher level of quality control and traceability procedures.
                        </p>
                    </div>
                </div>
                <div data-anim-child="slide-up delay-5">
                    <button class="button -type-1 mx-auto mt-50 md:mt-30">
                        <i class="-icon">
                            <svg width="50" height="30" viewBox="0 0 50 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.8 28.0924C43.3451 28.0924 49.4616 21.9759 49.4616 14.4308C49.4616 6.88577 43.3451 0.769287 35.8 0.769287C28.255 0.769287 22.1385 6.88577 22.1385 14.4308C22.1385 21.9759 28.255 28.0924 35.8 28.0924Z" stroke="#122223" />
                                <path d="M33.4808 10.2039L32.9985 10.8031L37.2931 14.2623H0.341553V15.0315H37.28L33.0008 18.4262L33.4785 19.0285L39 14.6492L33.4808 10.2039Z" fill="#122223" />
                            </svg>
                        </i>
                        Get to know
                    </button>
                </div>
            </div>
        </div>
        <div class="row x-gap-50 y-gap-30 pt-100 sm:pt-50">
            <div class="col-lg-4 col-sm-6 col-6">
                <div data-anim-child="img-right cover-light-1 delay-2" class="rounded-16 home-banner-1">
                    <img src="{{ URL::to('assets/front/img/about/1.png') }}" alt="image" class="rounded-16 col-12">
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-6">
                <div class="pt-100 md:pt-0">
                    <div data-anim-child="img-right cover-light-1 delay-3" class="rounded-16 home-banner-2">
                        <img src="{{ URL::to('assets/front/img/about/2.png') }}" alt="image" class="rounded-16 col-12">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div data-anim-child="img-right cover-light-1 delay-4" class="rounded-16 home-banner-3">
                    <img src="{{ URL::to('assets/front/img/about/3.png') }}" alt="image" class="rounded-16 col-12">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- count start -->
<section class="company-count layout-pt-md layout-pb-md">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-10 col-lg-11">
                <div class="row y-gap-30 justify-between">
                    <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto count-mob">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">12m+</h3>
                        <div class="uppercase lh-1 mt-30">Happy Customers</div>
                    </div>
                    <div data-split='lines' data-anim-child="split-lines delay-4" class="col-auto count-mob">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">100%</h3>
                        <div class="uppercase lh-1 mt-30">Sustainably Sourced</div>
                    </div>
                    <div data-split='lines' data-anim-child="split-lines delay-6" class="col-auto count-mob">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">25+</h3>
                        <div class="uppercase lh-1 mt-30">Years Experience</div>
                    </div>
                    <div data-split='lines' data-anim-child="split-lines delay-8" class="col-auto count-mob">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">100+</h3>
                        <div class="uppercase lh-1 mt-30">Products</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- count end -->
<!-- product start -->
<section class="relative layout-pt-md layout-pb-md">
    <div class="sectionBg bg-light-1 rounded-16 ml-10 mr-10"></div>

    <div data-anim-wrap class="container">
        <div class="row justify-center text-center explore-text-pro">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">
                    Explore
                </div>
                <h2 class="text-64 md:text-40 lh-11">
                    Our Products
                </h2>
            </div>
        </div>

        <div class="pt-100 sm:pt-50">
            <div class="relative overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-4 md-2 sm-2 base-1" data-pagination="js-slider1-pagination">
                <div class="swiper-wrapper">



                    @if(!empty($categoriesList))
                        @foreach($categoriesList as $category)
                            <div class="swiper-slide">
                                <a class="roomCard -type-3 d-block rounded-16 overflow-hidden" data-anim-child="img-right cover-light-1 delay-2">
                                    <div class="roomCard__image ratio ratio-45:50">
                                        <img src="{{ asset('uploads/category/' . $category->image) }}" alt="image" class="img-ratio">
                                    </div>

                                    <div class="roomCard__content px-30 py-30 text-center">
                                        <h3 class="roomCard__title lh-065 text-40 md:text-24 text-white"> {{$category->name??''}}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif

                </div>

                <div class="row justify-center pt-100 md:pt-50 pb-10">
                    <div class="col-auto">
                        <div class="pagination -type-1 -accent-1 js-slider1-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product end -->
<!-- process start -->
<section class="layout-pb-md layout-pt-md process-section">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">Unforgettable Experience</div>
                <h2 class="text-64 md:text-40">Process</h2>
            </div>
        </div>
        <div class="pt-100 sm:pt-50">
            <div class="relative js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-4 md-3 sm-2 base-1" data-nav-prev="js-slider4-prev" data-nav-next="js-slider4-next">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/1.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Supply into Factory</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/2.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Receiving</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/3.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Weighing of whole fish</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/4.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Grading Table</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/5.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Grading for Colour</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/6.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Samples for Histamine Test</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/7.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Gilling & Gutting</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/8.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">De-Heading</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/9.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Filleting</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/10.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Removal of Centre Borne</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/11.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Seperation into Loins</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/12.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Seperatoin of 4 loins</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/13.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Skinning</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/14.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Trimming of meat attached to Skin</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/15.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Removal of Black Meat</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/16.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Finshed Loins prio to vacuum</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/17.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Stuffing in vacuum bags</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/18.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Vacuuming</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/19.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Vacuumed Loins</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/20.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Labeling with weight mark</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/21.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Recording of weight prior to packing</h4>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{ URL::to('assets/front/img/process/22.jpg') }}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Despatch</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="navAbsolute -type-4">
                    <button class="size-80 flex-center bg-accent-1-50 blur-1 rounded-full js-slider4-prev">
                        <i class="icon-arrow-left text-24 text-white"></i>
                    </button>
                    <button class="size-80 flex-center bg-accent-1-50 blur-1 rounded-full js-slider4-next">
                        <i class="icon-arrow-right text-24 text-white"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- process end -->
<!-- partner start  -->
<section data-anim-wrap class="relative z-0 pt-50 pb-30 md:pt-0 mb-50 partner-section">
    <div class="sectionBg -type-2 overflow-hidden">
        <div class="sectionBg__bg rounded-16"></div>
        <img src="{{ URL::to('assets/front/img/general/partner.jpg') }}" alt="image">
    </div>
    <div class="container">
        <div class="row y-gap-30">
            <div class="col-xl-6 col-lg-7">
                <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-1 lg-1 md-1 sm-1 base-1" data-pagination="js-slider3-pagination">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div data-anim-child="slide-up delay-1" class="mb-50 md:mb-20">
                                <svg width="45" height="44" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_524_698)">
                                        <path d="M9.67883 38C6.64234 38 4.27007 36.9524 2.56204 34.8571C0.854015 32.6667 0 29.4286 0 25.1429C0 20.6667 0.99635 16.381 2.98905 12.2857C5.07664 8.19048 8.01825 4.14286 11.8139 0.142864C11.9088 0.0476213 12.0511 0 12.2409 0C12.5255 0 12.7153 0.142858 12.8102 0.428574C13 0.619048 13.0474 0.857143 12.9526 1.14286C10.6752 4.19048 9.10949 7.14286 8.25548 10C7.49635 12.7619 7.11679 15.8571 7.11679 19.2857C7.11679 21.8571 7.44891 23.8571 8.11314 25.2857C8.77737 26.7143 9.67883 28 10.8175 29.1429L5.40876 30.1429C5.31387 28.5238 5.74088 27.2857 6.68978 26.4286C7.73358 25.5714 9.06205 25.1429 10.6752 25.1429C12.6679 25.1429 14.1861 25.7143 15.2299 26.8571C16.3686 28 16.938 29.5714 16.938 31.5714C16.938 33.6667 16.2737 35.2857 14.9453 36.4286C13.7117 37.4762 11.9562 38 9.67883 38ZM31.5985 38C28.562 38 26.1898 36.9524 24.4818 34.8571C22.8686 32.6667 22.062 29.4286 22.062 25.1429C22.062 20.5714 23.0584 16.2381 25.0511 12.1429C27.0438 8.04762 29.9854 4.04762 33.8759 0.142864C33.9708 0.0476213 34.1131 0 34.3029 0C34.5876 0 34.7774 0.142858 34.8723 0.428574C35.062 0.619048 35.1095 0.857143 35.0146 1.14286C32.7372 4.19048 31.1715 7.14286 30.3175 10C29.5584 12.7619 29.1788 15.8571 29.1788 19.2857C29.1788 21.8571 29.4635 23.9048 30.0328 25.4286C30.6971 26.8571 31.5985 28.0952 32.7372 29.1429L27.4708 30.1429C27.3759 28.5238 27.8029 27.2857 28.7518 26.4286C29.7007 25.5714 31.0292 25.1429 32.7372 25.1429C34.7299 25.1429 36.2482 25.7143 37.292 26.8571C38.4307 28 39 29.5714 39 31.5714C39 33.6667 38.3358 35.2857 37.0073 36.4286C35.7737 37.4762 33.9708 38 31.5985 38Z" fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_524_698" x="0" y="0" width="45" height="44" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dx="6" dy="6" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.1 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_524_698" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_524_698" result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                            <div data-split='lines' data-anim-child="split-lines delay-3">
                                <div class="text-sec text-30 lg:text-30 md:text-24 text-white">
                                    Sea Fresh is a leading company in the field of import, export and distribution of all kinds of fresh fish. The people at Sea Fresh work in a close team to offer our customers the best from the sea. We are enthusiasts who appreciate and recognize quality fresh fish.
                                </div>
                                <a href="https://www.seafresh.nl/nl/" style="width: max-content;" target="_blank" class="button -md -type-2 bg-accent-2 -accent-1 rounded-200 mt-50 md:mt-20">
                                    Our Partner
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- partner end -->
<!-- hero start -->
<section class="relative layout-pt-md layout-pb-md mb-30">
    <div class="sectionBg bg-light-1 rounded-16 ml-20 mr-20"></div>
    <div data-anim-wrap class="imageGrid__wrap -type-6">
        <div class="imageGrid -type-6">

            <div>
                <div data-anim-child="img-right cover-white delay-2">
                    <img src="{{ URL::to('assets/front/img/hero/1.png') }}" alt="image">
                </div>
            </div>

            <div>
                <div data-anim-child="img-right cover-white delay-4">
                    <img src="{{ URL::to('assets/front/img/hero/2.png') }}" alt="image">
                </div>
            </div>

            <div>
                <div data-anim-child="img-right cover-white delay-6">
                    <img src="{{ URL::to('assets/front/img/hero/3.png') }}" alt="image">
                </div>
            </div>

            <div>
                <div data-anim-child="img-right cover-white delay-8">
                    <img src="{{ URL::to('assets/front/img/hero/4.png') }}" alt="image">
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-10 col-lg-11">
                    <div data-split='lines' data-anim-child="split-lines delay-2">
                        <h2 class="text-64 md:text-40">
                            Experience elegant , savor culinary delights, and let our hospitality<br class="lg:d-none">
                            embrace you.
                        </h2>
                    </div>

                    <div data-anim-child="slide-up delay-5" class="d-flex justify-center">
                        <button class="button -md -type-2 bg-accent-2 -accent-1 rounded-200 mt-50 md:mt-20">
                            Get in touch
                        </button>
                    </div>

                    <p data-anim-child="slide-up delay-6" class="text-19 text-sec fw-500 mt-50 md:mt-20">
                        As our valued clients always expect the best, our relentless<br class="md:d-none">
                        pursuit for perfection never ends.
                    </p>

                    <div data-anim-child="slide-up delay-7" class="row justify-center pt-60 lg:pt-30">

                        <div class="col-auto">
                            <img src="{{ URL::to('assets/front/img/hero/verfied-1.png') }}" alt="icon">
                        </div>

                        <div class="col-auto">
                            <img src="{{ URL::to('assets/front/img/hero/verfied-2.png') }}" alt="icon">
                        </div>

                        <div class="col-auto">
                            <img src="{{ URL::to('assets/front/img/hero/verfied-3.png') }}" alt="icon">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection