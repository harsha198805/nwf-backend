@extends('layouts.front.front_layout')
@section('content')


<section class="pageHero -type-2 -items-center">
      <div class="pageHero__bg">
        <img src="{{ URL::to('assets/front/img/about/about-us.jpg') }}" alt="image">
      </div>

      <div class="container">
        <div class="row justify-center">
          <div class="col-12">
            <div class="pageHero__content text-center">
              <div class="pageHero__subtitle text-white uppercase mb-20">About</div>
              <h1 class="pageHero__title lh-11 capitalize text-white">
                NorthWest Fishery
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about-welcome">
      <div class="container">
        <div class="row justify-center text-center">
          <div class="col-xl-9 col-lg-9">
            <i class="d-flex justify-center text-50 icon-rocks mb-30"></i>
            <div class="text-15 uppercase mb-30 sm:mb-10">EXPLORE</div>
            <h2 class="text-64 md:text-40 capitalize">
              Crafting Quality Seafood with Care and Innovation
            </h2>
            <p class="lh-18 mt-50 md:mt-30">
              North West Fishery is committed to export many kinds of seafood including Tuna from Indian Ocean to Europe, Japan, USA and the Middle East. Company is having a state of the art production facility which is EU approved and has been Registered with the export development board of Sri Lanka. Quality of our Products have never been compromised and always assured to the fullest satisfaction of customers. In Europe every prominent super market shelves proudly display our products, which comply with HACCP and EU standard. The activities include the Collection, Storage, Processing and Marketing of Tuna and Tuna related products and our major international markets presently supplied are Thailand, China, Japan, Iran, Oman, and New-Zealand. North West Fishery own and manage a fleet of vessels to assist in the collection of fresh fish from different fishing grounds within our permitted fishing zones. The management is heavily invested and diversified the business to meet both the needs of the Sri Lankan fishing industry and very competitive and quality oriented international market.
            </p>
          </div>
        </div>

        <div class="lineGrid -type-1 pt-100 sm:pt-50">
          <div class="lineGrid__content text-center">
            <img src="{{ URL::to('assets/front/img/about/abt-1.jpg') }}" alt="image">

            <h3 class="text-40 sm:text-24 mt-50">
              Our Production
            </h3>
            <p class="text-19 lh-18 mt-20">
              Northwest Fishery operates a state-of-the-art processing facility dedicated to delivering premium quality seafood to local and international markets. Our production includes freshly caught whole fish, expertly prepared fresh loins, and a range of value-added products such as marinated cuts, fillets, seafood mixes, and smoked fish. With a strong commitment to sustainability and stringent hygiene standards, we ensure that every product meets the highest quality benchmarks. Advanced processing techniques and cold chain logistics guarantee that our seafood retains its freshness, flavor, and nutritional value from ocean to table. Northwest Fishery is your trusted partner for superior seafood, tailored to meet the needs of households, restaurants, and global buyers.
            </p>
          </div>

          <div class="lineGrid__line"></div>

          <div class="lineGrid__content">
            <div class="px-20 lg:px-0 text-center mb-60">
              <h3 class="text-40 sm:text-24">
                Our Guiding Principles
              </h3>

              <p class="mt-20">
                Our vision is to become a globally recognized leader in sustainable seafood production, delivering premium-quality products that uphold the highest standards of freshness, taste, and environmental responsibility. Guided by this vision, our mission is to utilize state-of-the-art technology and sustainable practices to provide exceptional seafood to local and international markets. We are dedicated to supporting responsible fishing, ensuring product excellence, and fostering lasting partnerships with our customers and stakeholders.
              </p>
            </div>

            <img src="{{ URL::to('assets/front/img/about/abt-2.jpg') }}" alt="image">
            <img src="{{ URL::to('assets/front/img/about/abt-3.jpg') }}" alt="image" class="mt-50">
          </div>
        </div>
      </div>
    </section>

    <section class="certificates">
      <div class="container">
        <div class="row justify-center">
          <div class="col-12">
            <div class="pageHero__content text-center">
              <h3 class="text-40">
                Awards and Achievements
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="layout-pt-md layout-pb-md px-60 sm:px-0">
        <div data-anim-wrap class="relative">
          <div class="overflow-hidden js-section-slider" data-gap="15" data-slider-cols="xl-4 lg-3 md-2 sm-1 base-1" data-loop data-nav-prev="js-slider1-prev" data-nav-next="js-slider1-next">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="ratio ratio-44:60" data-anim-child="img-right cover-white delay-2">
                  <img src="{{ URL::to('assets/front/img/certificates/FDA-Northwest.jpg') }}" alt="image" class="img-ratio">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="ratio ratio-44:60" data-anim-child="img-right cover-white delay-4">
                  <img src="{{ URL::to('assets/front/img/certificates/BRC-2014.jpg') }}" alt="image" class="img-ratio">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="ratio ratio-44:60" data-anim-child="img-right cover-white delay-6">
                  <img src="{{ URL::to('assets/front/img/certificates/friend-of-the-sea.jpg') }}" alt="image" class="img-ratio">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="ratio ratio-44:60" data-anim-child="img-right cover-white delay-8">
                  <img src="{{ URL::to('assets/front/img/certificates/friend-of-the-sea-1.jpg') }}" alt="image" class="img-ratio">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="ratio ratio-44:60" data-anim-child="img-right cover-white delay-8">
                  <img src="{{ URL::to('assets/front/img/certificates/licence-fish-processing.jpg') }}" alt="image" class="img-ratio">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="ratio ratio-44:60" data-anim-child="img-right cover-white delay-8">
                  <img src="{{ URL::to('assets/front/img/certificates/dolphin-safe.jpg') }}" alt="image" class="img-ratio">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="ratio ratio-44:60" data-anim-child="img-right cover-white delay-8">
                  <img src="{{ URL::to('assets/front/img/certificates/licence-fish-processing-1.jpg') }}" alt="image" class="img-ratio">
                </div>
              </div>

            </div>
          </div>

          <div class="navAbsolute -type-3">
            <button class="size-80 flex-center bg-accent-1-50 blur-1 rounded-full js-slider1-prev">
              <i class="icon-arrow-left text-24 text-white"></i>
            </button>

            <button class="size-80 flex-center bg-accent-1-50 blur-1 rounded-full js-slider1-next">
              <i class="icon-arrow-right text-24 text-white"></i>
            </button>
          </div>
        </div>
      </div>
    </section>

@endsection