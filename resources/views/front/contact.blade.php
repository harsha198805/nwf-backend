@extends('layouts.front.front_layout')
@section('content')


<section class="pageHero -type-2 -items-center">
      <div class="pageHero__bg">
        <img src="{{ URL::to('assets/front/img/general/contact-us.jpg') }}" alt="image">
      </div>

      <div class="container">
        <div class="row justify-center">
          <div class="col-12">
            <div class="pageHero__content text-center">
              <div class="pageHero__subtitle text-white uppercase mb-20">Contact</div>
              <h1 class="pageHero__title lh-11 capitalize text-white">
                Your Trusted Seafood Partner
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contact-form-body">
      <div class="container">
        <div class="row justify-center text-center">
          <div class="col-xl-8 col-lg-10">
            <div class="mb-30">
              <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_632_5288)">
                  <path d="M47.9511 0.57683C45.9935 -0.55357 43.4816 0.119689 42.3516 2.07726L36.7643 11.7548H24.7149C24.1755 11.7548 23.7383 12.1921 23.7383 12.7313C23.7383 13.2706 24.1755 13.7079 24.7149 13.7079H35.6366L31.5821 20.7308H8.78948C8.25011 20.7308 7.81289 21.1681 7.81289 21.7073C7.81289 22.2467 8.25011 22.6839 8.78948 22.6839H30.4543L28.199 26.5903H8.78948C8.25011 26.5903 7.81289 27.0276 7.81289 27.5669C7.81289 28.1061 8.25011 28.5435 8.78948 28.5435H27.795L27.3742 32.4498H8.78948C8.25011 32.4498 7.81289 32.8871 7.81289 33.4264C7.81289 33.9657 8.25011 34.403 8.78948 34.403H27.1638L27.1118 34.8853C27.0704 35.2697 27.2597 35.6424 27.5944 35.8356C27.7461 35.9232 27.9146 35.9665 28.0826 35.9665C28.2857 35.9665 28.488 35.9033 28.6588 35.7785L34.8944 31.2232C35.0043 31.1429 35.0961 31.0407 35.1641 30.9229L42.7745 17.7414V36.6703C42.7745 38.8585 40.9943 40.6388 38.8061 40.6388H16.1736C15.8246 40.6388 15.5022 40.8249 15.3278 41.1271L11.913 47.0418L8.49817 41.1271C8.32375 40.8249 8.00138 40.6388 7.65244 40.6388H5.92164C3.7334 40.6388 1.95317 38.8585 1.95317 36.6703V17.6764C1.95317 15.4882 3.7334 13.7079 5.92164 13.7079H15.9257C16.4651 13.7079 16.9023 13.2706 16.9023 12.7313C16.9023 12.192 16.4651 11.7548 15.9257 11.7548H5.92164C2.65642 11.7548 0 14.4112 0 17.6764V36.6703C0 39.9355 2.65642 42.592 5.92164 42.592H7.08856L11.0673 49.4832C11.2417 49.7854 11.5641 49.9715 11.913 49.9715C12.2619 49.9715 12.5843 49.7854 12.7587 49.4832L16.7374 42.592H38.8062C42.0714 42.592 44.7278 39.9355 44.7278 36.6703V17.6764C44.7278 16.8393 44.5503 16.0123 44.2107 15.2541L49.4516 6.17648C50.5818 4.21901 49.9087 1.70703 47.9511 0.57683ZM46.9745 2.26828C47.9994 2.85999 48.3517 4.17507 47.76 5.1999L47.202 6.16643L43.485 4.02037L44.043 3.05385C44.6347 2.02911 45.9497 1.67686 46.9745 2.26828ZM29.7203 28.9075L32.5315 30.5306L29.2904 32.8984L29.7203 28.9075ZM33.9609 29.1006L30.2439 26.9545L42.5084 5.71182L46.2254 7.85787L33.9609 29.1006Z" fill="#122223" />
                  <path d="M20.3203 13.708C20.5771 13.708 20.8291 13.6035 21.0117 13.4219C21.1934 13.2402 21.2979 12.9883 21.2979 12.7314C21.2979 12.4746 21.1934 12.2227 21.0117 12.041C20.8291 11.8595 20.5781 11.7549 20.3203 11.7549C20.0635 11.7549 19.8115 11.8594 19.6299 12.041C19.4482 12.2227 19.3447 12.4746 19.3447 12.7314C19.3447 12.9883 19.4481 13.2402 19.6299 13.4219C19.8125 13.6035 20.0635 13.708 20.3203 13.708Z" fill="#122223" />
                </g>
                <defs>
                  <clipPath id="clip0_632_5288">
                    <rect width="50" height="50" fill="white" />
                  </clipPath>
                </defs>
              </svg>
            </div>

            <div class="text-15 uppercase mb-20">Get In touch</div>
            <h2 class="text-64 md:text-40 capitalize">How may we help you?</h2>
            <p class="lh-17 mt-30">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor tellus vel mauris scelerisque accumsan.
              Maecenas quis nunc sed sapien dignissim pulvinar. Se d at gravida.
            </p>

            <div class="contactForm row y-gap-30 pt-60">
              <div class="col-md-6">

                <div class="form-input ">
                  <input type="text" required class="">
                  <label class="lh-1 text-16 text-light-1">First Name</label>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-input ">
                  <input type="text" required class="">
                  <label class="lh-1 text-16 text-light-1">Last Name</label>
                </div>

              </div>
              <div class="col-12">

                <div class="form-input ">
                  <input type="email" required class="">
                  <label class="lh-1 text-16 text-light-1">Email</label>
                </div>

              </div>
              <div class="col-12">

                <div class="form-input ">
                  <textarea required class="border-1" rows="8"></textarea>
                  <label class="lh-1 ">Comment</label>
                </div>

              </div>
              <div class="col-12">
                <button class="button -md -type-2 w-1/1 bg-accent-2 -accent-1">SEND YOUR MESSAGE</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="relative layout-pt-lg layout-pb-lg md:pt-0 bg-accent-1">
      <div class="sectionBg col-md-6 -left z-1">
        <div class="h-full md:h-map md: mb-40 ">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.933272967483!2d79.8821881!3d7.297463499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2e9180da09355%3A0xe44bd116216e876f!2sNorthwest%20Fishery%20(Pvt)%20Ltd!5e1!3m2!1sen!2slk!4v1738404449294!5m2!1sen!2slk" width="100%" style="border:0; height:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="container">
        <div class="row justify-end">
          <div class="col-md-5">
            <div class="text-15 text-white">PERFECT</div>
            <h2 class="text-64 md:text-40 mt-30 text-white">Location</h2>
            <div class="text-white mt-30">
              <div>
                No 7, Industrial Estate, Dankotuwa, Sri Lanka.
              </div>
              <br>
              <div><a href="mailto:info@northwestfishery.lk;">info@northwestfishery.lk</a></div>
              <div><a href="tel:+94312259374;">+94 312 259 374</a></div>
            </div>

            <a href="https://maps.app.goo.gl/HeJ4RWAw1RGtFgT99" target="new" class="button -md -type-2 bg-accent-2 -light-1 mt-40 pull-left rounded-200">
              Get Directions
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-50 pb-50 contact-gallery">
      <div data-anim-wrap class="px-20 md:px-20">
        <div class="row justify-center text-center">
          <div data-split='lines' data-anim-child="split-lines delay-1" class="col-auto">
            <div class="text-15 uppercase mb-30 sm:mb-10">@NorthWestFishery</div>
            <h2 class="text-64 md:text-40">A Glimpse into the Freshest Catch</h2>
          </div>
        </div>

        <div class="row pt-100 sm:pt-50">

          <div class="w-1/5 md:w-1/2 sm:w-1/2">
            <div data-anim-child="img-right cover-white delay-2">
              <a href="gallery.php" class="ratio ratio-1:1">
                <img src="{{ URL::to('assets/front/img/gallery/35.jpg') }}" alt="image" class="img-ratio rounded-16">
              </a>
            </div>
          </div>

          <div class="w-1/5 md:w-1/2 sm:w-1/2">
            <div data-anim-child="img-right cover-white delay-4">
              <a href="gallery.php" class="ratio ratio-1:1">
                <img src="{{ URL::to('assets/front/img/gallery/18.jpg') }}" alt="image" class="img-ratio rounded-16">
              </a>
            </div>
          </div>

          <div class="w-1/5 md:w-1/2 sm:w-1/2">
            <div data-anim-child="img-right cover-white delay-6">
              <a href="gallery.php" class="ratio ratio-1:1">
                <img src="{{ URL::to('assets/front/img/gallery/37.jpg') }}" alt="image" class="img-ratio rounded-16">
              </a>
            </div>
          </div>

          <div class="w-1/5 md:w-1/2 sm:w-1/2">
            <div data-anim-child="img-right cover-white delay-8">
              <a href="gallery.php" class="ratio ratio-1:1">
                <img src="{{ URL::to('assets/front/img/gallery/16.jpg') }}" alt="image" class="img-ratio rounded-16">
              </a>
            </div>
          </div>

          <div class="w-1/5 md:w-1/2 sm:w-1/2">
            <div data-anim-child="img-right cover-white delay-10">
              <a href="gallery.php" class="ratio ratio-1:1">
                <img src="{{ URL::to('assets/front/img/gallery/40.jpg') }}" alt="image" class="img-ratio rounded-16">
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>


@endsection