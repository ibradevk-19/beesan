@php
    $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    $align = app()->getLocale() == 'ar' ? 'right' : 'left';
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $dir }}">
  <head>

  @include('frontend.parts.seo')


    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- English font -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/english-font/stylesheet.css') }}" />
    <!-- arabic font  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/stylesheet.css') }}" />
    <!-- slick slider just use it in the pages that have slider -->
    <!-- Slick CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"
    />

    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <!-- fancy box just use it for gallery -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />
    <!-- aos animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  </head>

  <body>
     @include('frontend.parts.pages-navbar')
    <main class="main-content">


      <!-- services -->
      <section
        class="services services-page-section section-padding"
        data-aos="fade-up"
      >
        <div class="services-shape">
          <img
            class="img-full"
            src="{{ asset('frontend/assets/images/logos/logo_w_02.png') }}"
            alt="{{ __('Our Sectors') }}"
          />
        </div>
        <div class="container">
          <div class="services-top-section">
            <h2 data-aos="fade-up" data-aos-delay="150" class="section-title">
              <span> {{ __('Our Sectors') }} </span>
            </h2>
            <div
              data-aos="fade-up"
              data-aos-delay="200"
              class="row justify-content-center"
            >
              <div class="col-xl-4">

              </div>
            </div>
          </div>
          <div class="services-items" data-aos="fade-up" data-aos-delay="150">
            <div class="services-slider slider">
                <div class="services-items" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4 " id="articles-container">
                  @include('frontend.articles.partials.service-items', ['services' => $services])
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
      <section class="services-bottom section-padding">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="services-bottom-content">
                <h2
                  class="mb-3 text-primary-color"
                  data-aos="fade-up"
                  data-aos-delay="150"
                >
                   {{ $settings->TranslatedServicesTitle }}
                </h2>
                <p data-aos="fade-up" data-aos-delay="200">
                    {{ Str::words(strip_tags($settings->TranslatedServicesBody), 500, '...') }}
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div
                class="services-bottom-image"
                data-aos="fade-n"
                data-aos-delay="150"
              >
                <img
                  class="img-full"
                  src="{{ asset('storage/' . $settings['services_image']) }}"
                  alt="{{ $settings->TranslatedServicesTitle }}   "
                />
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- footer -->
    @include('frontend.parts.footer')

    <!-- bootstrap js  -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Slick JS -->
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>

    <!-- mixitup -->
    <script src="https://cdn.jsdelivr.net/npm/mixitup@3/dist/mixitup.min.js"></script>
    <!-- fancy box just use it for gallery -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <!-- aos js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
  </body>
</html>
