@extends('layouts.front.front_layout')
@section('content')


<section class="about -type-1 layout-pt-lg">
      <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="about__backTitle text-sec text-light-2">
          NORTHWEST FISHERY
        </div>

        <div class="about__images">

          <div data-anim-child="img-right cover-white delay-2">
            <img src="{{ URL::to('assets/front/img/quality/1.png') }}" alt="image" class="rounded-16">
          </div>

          <div data-anim-child="img-right cover-white delay-4">
            <img src="{{ URL::to('assets/front/img/quality/2.png') }}" alt="image" class="rounded-16">
          </div>

          <div data-anim-child="img-right cover-white delay-6">
            <img src="{{ URL::to('assets/front/img/quality/3.png') }}" alt="image" class="rounded-16">
          </div>

        </div>

        <div class="about__content">
          <div class="row justify-center text-center">
            <div class="col-xl-9 col-lg-10">
              <div>
                <h2 class="about__title text-120">
                  Quality & Traceability
                </h2>
                <p class="lh-18">
                  We are highly committed to quality and freshness of our raw materials which comes from the unpolluted waters around us. Due to this our products are the best environmental choice around the globe. Our fishermen are well trained and fishing boats are well equipped with the most modern facilities. The fish is transported in refrigerated trucks as per the company requirements and at receiving, goods are checked same as company goods and only acceptable goods are received. For each lot boat details are received from the suppliers. Time to time company representatives do inspections on boats – (company own suppliers and contractors) to check its hygienic conditions and operations. Our processing plants work strictly according to HACCP rules. A certified quality controller critically tests each fish for Histamine and other health issues. Our Products are packed in to European standard approved by the EU.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="pt-100">
      <div class="container">
        <div data-anim-wrap class="row y-gap-30 items-center">
          <div data-anim-child="img-right cover-light-1 delay-2" class="col-md-6">
            <div class="ratio ratio-1:1">
              <img src="{{ URL::to('assets/front/img/quality/quality-1.jpg') }}" alt="image" class="img-ratio rounded-16">
            </div>
          </div>

          <div class="col-lg-4 col-md-5 offset-md-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="quality-svg mb-30"><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
            <i data-anim-child="slide-up delay-5" class=""></i>
            <h3 data-anim-child="slide-up delay-6" class="text-40 md:text-30 lh-065">Organoleptic Checks</h3>
            <p data-anim-child="slide-up delay-7" class="text-17 lh-17 mt-30">These parameters are checked under organoleptic checks. Those are as follows.<br><br>

            • Nature of the eyes<br>
            • Nature of the skin<br>
            • Nature of the skin mucus<br>
            • Gill color<br>
            • Gill and Flesh smell<br>
            • Flesh color</p>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div data-anim-wrap class="row y-gap-30 items-center">
          <div class="col-md-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="quality-svg mb-30"><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
            <h3 data-anim-child="slide-up delay-6" class="text-40 md:text-30 lh-065">Laboratory Testing</h3>
            <p data-anim-child="slide-up delay-7" class="text-17 lh-17 mt-30">Histamine level was checked for each individual fish, since Histamine is a hazardous chemical which can be  “CRITICAL” to the end user’s health. Acceptable Histamine level of Tuna for European Union 100ppm. If any fish exceeds this limit of 100 ppm, it was rejected. in order to overcome this Histamine risk, Sri Lankan tuna processor’s have reduce their Histamine control level up to 5 ppm for composite samples and 10 ppm for individual samples (these control levels may differ with the processor).</p>
          </div>

          <div data-anim-child="img-right cover-light-1 delay-2" class="col-md-6 offset-md-1">
            <div class="ratio ratio-1:1">
              <img src="{{ URL::to('assets/front/img/quality/quality-2.jpg') }}" alt="image" class="img-ratio rounded-16">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pb-100">
      <div class="container">
        <div data-anim-wrap class="row y-gap-30 items-center">
          <div data-anim-child="img-right cover-light-1 delay-2" class="col-md-6">
            <div class="ratio ratio-1:1">
              <img src="{{ URL::to('assets/front/img/quality/quality-3.jpg') }}" alt="image" class="img-ratio rounded-16">
            </div>
          </div>

          <div class="col-lg-4 col-md-5 offset-md-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="quality-svg mb-30"><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
            <h3 data-anim-child="slide-up delay-6" class="text-40 md:text-30 lh-065">Temperature Checking</h3>
            <p data-anim-child="slide-up delay-7" class="text-17 lh-17 mt-30">Body temperature of the receiving fish should be below 4ºC. If any fish which exceeds this temperature limit, was rejected.<br><br> If even one parameter was out of the acceptable level, the fish was rejected.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="pb-50">
      <div class="container">
        <div class="row justify-center text-center">
          <div class="col-xl-9 col-lg-9">
            <div class="text-15 uppercase mb-30 sm:mb-10">DRIVEN BY QUALITY</div>
            <h2 class="text-64 md:text-40 capitalize">
              When discussing quality, we emphasize two key Dimensions
            </h2>
            <p class="lh-18 mt-50 md:mt-30">
              We at North West Fisheries, we strictly follow HACCP method on quality assurance and control standards.Temperature at each & every step is controlled along with the other critical control points and critical points. In this respect we are obliged to ensure that any harmful material is not consumed, as it is to be achieved continuous official control for the removals of the bad Quality is very widely applied.
            </p>
          </div>
        </div>

        <div class="lineGrid -type-1 pt-100 sm:pt-50">
          <div class="lineGrid__content text-center">
            <img src="{{ URL::to('assets/front/img/quality/food-3.jpg') }}" alt="image">

            <h3 class="text-40 sm:text-24 mt-50">
              Traceability
            </h3>
            <p class="text-19 lh-18 mt-20">
              Traceability is actually a means of keeping a track of the whole process of the production of a product, right from the place of its origin till the point of its sale. This is basically done through proper record keeping from the very beginning of the production process. It also provides basic information to the consumers like whether the product has been made keeping human welfare in mind, whether it has any ingredients that can cause allergies, and so on. Though this adds to the cost of production in a way, but at the same time it streamlines the process too.<br><br> Our products themselves have a very clear,reliable and complete traceability with their labeling.We cater products that can be traced back even up to the particular vessels’s information which the product came from through a particular processing plant.Every time we are committed to fill our customers with every kind of required information through a particular product itself with the most simple and representative manner. In any case, an end customer can investigate it by tracing back with the information given on the product labels through the processor. This will further depict the reliability of our products.
            </p>
          </div>

          <div class="lineGrid__line"></div>

          <div class="lineGrid__content">
            <div class="px-20 lg:px-0 text-center mb-60">
              <h3 class="text-40 sm:text-24">
                Food Safety
              </h3>

              <p class="mt-20">
                Food safety is becoming an increasingly important issue for any food industry. Consumers are ever more wary about their health and need to be assured that their fish is healthy and safe to eat. That’s why we – North West Fisheries is keen on food safety. <br><br> We trust and got to know from our experience that the fish is highly perishable product if not handled correctly. That’s why we have optimized  post-harvest handling, and quality assurance systems which are  required  to reduce post harvest losses and maximize the value of the catch. This is even more important in a context of dwindling resources and helps to improve the sustainability of the industry as a whole.<br><br> The key to food safety and quality assurance systems is traceability. Traceability lies at the heart of any certification system: without traceability, quality or safety cannot be ensured to the customer.
              </p>
            </div>

            <img src="{{ URL::to('assets/front/img/quality/food-1.jpg') }}" alt="image">
            <img src="{{ URL::to('assets/front/img/quality/food-2.jpg') }}" alt="image" class="mt-50">
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="quality-policy bg-accent-1">
        <div data-anim-wrap class="container">
          <div class="row y-gap-30 justify-between">
            <div class="col-xl-12">
                <h2 class="text-64 md:text-40 lh-11 text-white">
                  Food Safety & Quality Policy
                </h2>
                <p class="lh-18 text-white mt-40">
                  Northwest Fishery is Committed to,
                </p>
            </div>

            <div class="col-xl-12 col-lg-12">
              <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-1 lg-1 md-1 sm-1 base-1" data-number-pagination="js-number-pag">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        The supply of highest quality, safe, legal and authentic food products all the time
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Work closely with its Customers and Suppliers in seeking to establish the highest quality standards
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Comply with the requirements of statutory and regulatory bodies
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Constantly strive to meet it’s customer’s expectations
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Use good quality raw materials
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Operates in a cost-effective and profitable manner
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        The care and maintenance of our environment
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Comply with the regulations regarding occupational health, safety, and welfare
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Train all members of staff in the needs and responsibilities of food safety and quality management system and ensure competencies
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Regularly review the food safety and quality management system
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div data-anim-child="slide-up delay-4">
                      <div class="lh-19 text-white pr-20 mt-40 lg:mt-20">
                        Works towards the continual improvement of the food safety and quality management system
                      </div>
                    </div>
                  </div>

                </div>

                <!-- <div class="pagination -type-progress d-flex items-center fw-500 text-white mt-50 md:mt-30 js-number-pag"></div> -->
                <div data-anim-child="slide-up delay-6" class="justify-center pagination -type-number d-flex items-center fw-500 text-white pt-50 md:pt-60 js-number-pag"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection