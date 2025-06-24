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
    <section class="about-us-hero">
        <div
          class="pages-hero bg-cover"
          style="background-image: url({{ asset('storage/' . $aboutData['cover_image']) }})"
        >
          <div class="container">
            <div class="pages-hero-content">
              <div>
                <h1 data-aos="fade-up" data-aos-delay="150">{{ __('About Us') }}</h1>
               
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- about us  -->
      <section class="about-us-brief section-padding">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="about-us-brief-content">
                <div
                  class="about-us-brief-title"
                  data-aos="fade-up"
                  data-aos-delay="150"
                >
                  <div class="vertical-title"> {{ __('About Us') }}</div>
                  <h2 class="title">  {{ $settings->TranslatedTitle }} </h2>
                </div>
                <p class="mt-4" data-aos="fade-up" data-aos-delay="200">
                    {!! $aboutData->TranslatedBody !!}
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div
                class="about-us-brief-image"
                data-aos="zoom-in"
                data-aos-delay="150"
              >
                <img
                  class="img-full"
                  src="{{ asset('storage/' . $aboutData['image_path']) }}"
                  alt="من نحن"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- mession and message -->
      <section class="vision-message section-padding">
        <div class="vision-message-shape">
          <img
            class="img-full"
            src="{{ asset('frontend/assets/images/logos/logo_w_02.png') }}"
            alt="vision-messgae"
          />
        </div>
        <div class="container">
          <!-- vision -->
          <section class="vision">
            <div class="row">
              <div class="col-lg-6">
                <div
                  class="vision-image"
                  data-aos="fade-in"
                  data-aos-delay="150"
                >
                  <img
                    class="img-full"
                    src="{{ asset('storage/' . $aboutData['vision_image']) }}"
                    alt="رؤيتنا"
                  />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="vision-content">
                  <div class="vision-shape">
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/vision-shape.png') }} "
                      alt="رؤيتنا"
                    />
                  </div>
                  <div class="vision-content-inner">
                    <h2
                      class="section-title"
                      data-aos="fade-up"
                      data-aos-delay="150"
                    >
                      <span> {{ __('Vision') }} </span>
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="200">
                        {{ strip_tags($aboutData->TranslatedVision) }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- message -->
          <section class="message">
            <div class="row">
              <div class="col-lg-6">
                <div class="message-content">
                  <div class="message-shape">
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/vision-shape.png') }} "
                      alt="رسالتنا"
                    />
                  </div>
                  <div class="message-content-inner">
                    <h2
                      data-aos="fade-in"
                      data-aos-delay="150"
                      class="section-title"
                    >
                      <span> {{__('Message')}} </span>
                    </h2>
                    <p
                      data-aos="fade-up"
                      data-aos-delay="200"
                      class="text-center"
                    >
                    {{ strip_tags($aboutData->TranslatedMessage) }}
                    </p>
                  
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div
                  class="message-image"
                  data-aos="fade-in"
                  data-aos-delay="150"
                >
                  <img
                    class="img-full"
                    src="{{ asset('storage/' . $aboutData['message_image']) }}"
                    alt="رؤيتنا"
                  />
                </div>
              </div>
            </div>
          </section>
        </div>
      </section>

      <!-- why choose us  -->
      <!-- <section class="why-choose-us section-padding">
        <div class="container">
          <div class="why-choose-us-top-section">
            <h2 data-aos="fade-up" data-aos-delay="150" class="section-title">
              <span> لماذا نحن </span>
            </h2>
            <h2
              data-aos="fade-up"
              data-aos-delay="200"
              class="text-center text-primary-color"
            >
              يجب عليك اختيارنا
            </h2>
          </div>
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
              <div
                class="choose-us-card"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="choose-us-card-icon">
                  <img
                    class="img-full"
                    src="./assets/images/choose-us.svg"
                    alt="choose-us"
                  />
                </div>
                <div class="choose-us-card-content">
                  <h5 class="text-primary-color mb-2 text-center">
                    خبراء معتمدين
                  </h5>
                  <p>
                    يتم تسعير خدماتنا بشكل تنافسي لضمان القدرة على تحمل التكاليف
                    دون المساس بالجودة. استمتع بالتوازن المثالي بين القيمة
                    والجمال مع Beautyscape.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div
                class="choose-us-card"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="choose-us-card-icon">
                  <img
                    class="img-full"
                    src="./assets/images/choose-us.svg"
                    alt="choose-us"
                  />
                </div>
                <div class="choose-us-card-content">
                  <h5 class="text-primary-color mb-2 text-center">
                    خبراء معتمدين
                  </h5>
                  <p>
                    يتم تسعير خدماتنا بشكل تنافسي لضمان القدرة على تحمل التكاليف
                    دون المساس بالجودة. استمتع بالتوازن المثالي بين القيمة
                    والجمال مع Beautyscape.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div
                class="choose-us-card"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="choose-us-card-icon">
                  <img
                    class="img-full"
                    src="./assets/images/choose-us.svg"
                    alt="choose-us"
                  />
                </div>
                <div class="choose-us-card-content">
                  <h5 class="text-primary-color mb-2 text-center">
                    خبراء معتمدين
                  </h5>
                  <p>
                    يتم تسعير خدماتنا بشكل تنافسي لضمان القدرة على تحمل التكاليف
                    دون المساس بالجودة. استمتع بالتوازن المثالي بين القيمة
                    والجمال مع Beautyscape. يتم تسعير خدماتنا بشكل تنافسي لضمان
                    القدرة على تحمل التكاليف دون المساس بالجودة. استمتع بالتوازن
                    المثالي بين القيمة والجمال مع Beautyscape.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
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
