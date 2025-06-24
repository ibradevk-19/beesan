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
    <section class="contact-us-hero">
        <div
          class="pages-hero bg-cover"
          style="background-image: url(./assets/images/hero.png)"
        >
          <div class="container">
            <div class="pages-hero-content">
              <div>
                <h1 data-aos="fade-up" data-aos-delay="150">{{ __('Contact us')}} </h1>
              
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contact-us section-padding">
        <div class="container">
        @if(session('success'))
          <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
          <div class="contact-us-top">
            <h2
              class="text-center text-primary-color mb-1"
              data-aos="fade-up"
              data-aos-delay="150"
            >
            {{ __('Contact us')}}
            </h2>
            <p class="h2 text-center" data-aos="fade-up" data-aos-delay="200">
              {{ __('We are always here to provide the best service')}}
            </p>
          </div>
          <div class="contact-us-form-map-wrapper">
            <div class="row gy-4">
              <div class="col-lg-6">
                <div
                  class="contact-us-form"
                  data-aos="fade-in"
                  data-aos-delay="150"
                >
                  <form  method="POST" action="{{ route('contact.store') }}">
                  @csrf
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">{{ __('Your email') }}* </label>
                          <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="{{ __('Your email here') }}"
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="name"> {{__('Your Name')}} * </label>
                          <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="{{ __('Your name here') }}"
                          />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="mobile"> {{ __('Contact number') }}* </label>
                          <input
                            type="text"
                            class="form-control"
                            id="mobile"
                            name="number"
                            placeholder=""
                          />
                        
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="subject"> {{ __('Subject') }} * </label>
                          <input
                            type="text"
                            class="form-control"
                            id="subject"
                             name="subject"
                            placeholder=""
                          />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="message"> {{ __('Message text') }}  * </label>
                        <textarea
                          placeholder="  "
                          class="form-control"
                          id="message"
                           name="text"
                          rows="3"
                        ></textarea>
                      
                      </div>
                      <div class="form-group submit-wrap">
                        <button type="submit" class="btn custom-btn">
                          {{ __('Send a message') }}
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6">
                <div
                  class="contact-us-map-contact-wrapper"
                  data-aos="fade-in"
                  data-aos-delay="150"
                >
                  <div class="contact-us-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3408.1276721522286!2d34.343593!3d31.327846999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDE5JzQwLjMiTiAzNMKwMjAnMzYuOSJF!5e0!3m2!1sar!2s!4v1746344920500!5m2!1sar!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                  <div class="contact-us-social">
                    <div class="row gy-3">
                      <div class="col-xl-4">
                        <div class="footer-social contact-us-social-media">
                        <ul>
                    <li>
                      <a title="تابعنا عبر  الفيسبوك" href="{{ $settings->facebook_url }}"
                        ><svg
                          width="19"
                          height="20"
                          viewBox="0 0 19 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <g
                            clip-path="url(#clip0_203_9363)"
                            filter="url(#filter0_i_203_9363)"
                          >
                            <path
                              d="M13.9297 11.4916L14.4506 8.09844H11.1945V5.89648C11.1945 4.96836 11.6492 4.06309 13.1076 4.06309H14.5877V1.17441C14.5877 1.17441 13.2447 0.945312 11.9604 0.945312C9.2791 0.945312 7.52656 2.5707 7.52656 5.51269V8.09902H4.5459V11.4922H7.52656V19.6953H11.1945V11.4922L13.9297 11.4916Z"
                              fill="#1D8751"
                            />
                          </g>
                          <defs>
                            <filter
                              id="filter0_i_203_9363"
                              x="0.191406"
                              y="0.945312"
                              width="18.75"
                              height="21.75"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="BackgroundImageFix"
                                result="shape"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="3" />
                              <feGaussianBlur stdDeviation="5.625" />
                              <feComposite
                                in2="hardAlpha"
                                operator="arithmetic"
                                k2="-1"
                                k3="1"
                              />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="shape"
                                result="effect1_innerShadow_203_9363"
                              />
                            </filter>
                            <clipPath id="clip0_203_9363">
                              <rect
                                width="18.75"
                                height="18.75"
                                fill="white"
                                transform="translate(0.191406 0.945312)"
                              />
                            </clipPath>
                          </defs>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a title="تابعنا عبر  تويتر" href="{{ $settings->twitter_url }}"
                        ><svg
                          width="22"
                          height="22"
                          viewBox="0 0 22 22"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <g
                            clip-path="url(#clip0_203_9358)"
                            filter="url(#filter0_i_203_9358)"
                          >
                            <path
                              d="M20.8111 5.26544C20.0805 5.58919 19.2956 5.80794 18.4705 5.90681C19.3219 5.39738 19.9588 4.5956 20.2625 3.65106C19.4626 4.12618 18.5872 4.46061 17.6742 4.63981C17.0603 3.98432 16.2472 3.54985 15.361 3.40385C14.4749 3.25786 13.5653 3.40851 12.7736 3.83241C11.9818 4.25631 11.3522 4.92975 10.9824 5.74818C10.6126 6.5666 10.5233 7.48422 10.7285 8.35856C9.10771 8.27718 7.52216 7.85592 6.07473 7.1221C4.6273 6.38829 3.35035 5.35833 2.32673 4.09906C1.97673 4.70281 1.77548 5.40281 1.77548 6.14831C1.77509 6.81943 1.94036 7.48028 2.25663 8.0722C2.57289 8.66413 3.03038 9.16885 3.58848 9.54156C2.94123 9.52097 2.30825 9.34607 1.74223 9.03144V9.08394C1.74217 10.0252 2.06776 10.9375 2.66377 11.6661C3.25978 12.3946 4.08948 12.8945 5.01211 13.0809C4.41167 13.2434 3.78216 13.2674 3.17111 13.1509C3.43142 13.9608 3.93848 14.6691 4.62131 15.1765C5.30413 15.6839 6.12854 15.9651 6.97911 15.9807C5.53521 17.1142 3.75201 17.729 1.91636 17.7263C1.59119 17.7264 1.2663 17.7074 0.943359 17.6694C2.80665 18.8675 4.97566 19.5033 7.19086 19.5008C14.6896 19.5008 18.789 13.2901 18.789 7.90356C18.789 7.72856 18.7846 7.55181 18.7767 7.37681C19.5741 6.80017 20.2624 6.0861 20.8094 5.26806L20.8111 5.26544Z"
                              fill="#1D8751"
                            />
                          </g>
                          <defs>
                            <filter
                              id="filter0_i_203_9358"
                              x="0.123047"
                              y="0.945312"
                              width="21"
                              height="24"
                              filterUnits="userSpaceOnUse"
                              color-interpolation-filters="sRGB"
                            >
                              <feFlood
                                flood-opacity="0"
                                result="BackgroundImageFix"
                              />
                              <feBlend
                                mode="normal"
                                in="SourceGraphic"
                                in2="BackgroundImageFix"
                                result="shape"
                              />
                              <feColorMatrix
                                in="SourceAlpha"
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                result="hardAlpha"
                              />
                              <feOffset dy="3" />
                              <feGaussianBlur stdDeviation="5.625" />
                              <feComposite
                                in2="hardAlpha"
                                operator="arithmetic"
                                k2="-1"
                                k3="1"
                              />
                              <feColorMatrix
                                type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"
                              />
                              <feBlend
                                mode="normal"
                                in2="shape"
                                result="effect1_innerShadow_203_9358"
                              />
                            </filter>
                            <clipPath id="clip0_203_9358">
                              <rect
                                width="21"
                                height="21"
                                fill="white"
                                transform="translate(0.123047 0.945312)"
                              />
                            </clipPath>
                          </defs>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a title="تابعنا عبر إنستقرام" href="{{ $settings->instagram_url }}">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                          <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.206.057 2.003.25 2.474.418a4.92 4.92 0 011.675 1.09 4.92 4.92 0 011.09 1.675c.168.471.361 1.268.418 2.474.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.057 1.206-.25 2.003-.418 2.474a4.92 4.92 0 01-1.09 1.675 4.92 4.92 0 01-1.675 1.09c-.471.168-1.268.361-2.474.418-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.206-.057-2.003-.25-2.474-.418a4.92 4.92 0 01-1.675-1.09 4.92 4.92 0 01-1.09-1.675c-.168-.471-.361-1.268-.418-2.474C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.057-1.206.25-2.003.418-2.474a4.92 4.92 0 011.09-1.675 4.92 4.92 0 011.675-1.09c.471-.168 1.268-.361 2.474-.418C8.416 2.175 8.796 2.163 12 2.163zm0 1.837c-3.17 0-3.548.012-4.797.07-1.022.047-1.576.218-1.946.363a3.09 3.09 0 00-1.115.725 3.09 3.09 0 00-.725 1.115c-.145.37-.316.924-.363 1.946-.058 1.249-.07 1.627-.07 4.797s.012 3.548.07 4.797c.047 1.022.218 1.576.363 1.946.155.41.362.761.725 1.115.354.354.705.57 1.115.725.37.145.924.316 1.946.363 1.249.058 1.627.07 4.797.07s3.548-.012 4.797-.07c1.022-.047 1.576-.218 1.946-.363a3.09 3.09 0 001.115-.725 3.09 3.09 0 00.725-1.115c.145-.37.316-.924.363-1.946.058-1.249.07-1.627.07-4.797s-.012-3.548-.07-4.797c-.047-1.022-.218-1.576-.363-1.946a3.09 3.09 0 00-.725-1.115 3.09 3.09 0 00-1.115-.725c-.37-.145-.924-.316-1.946-.363-1.249-.058-1.627-.07-4.797-.07zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z" fill="#1D8751"/>
                        </svg>
                      </a>
                    </li>

                    <li>
                      <a title="تابعنا عبر تيك توك" href="{{ $settings->tiktok_url }}">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                          <path d="M17 2c.52 2.598 2.104 4 5 4v3c-2.031 0-3.563-.648-5-1.625V15a7 7 0 11-7-7h1v3h-1a4 4 0 104 4V2h3z" fill="#1D8751"/>
                        </svg>
                      </a>
                    </li>
                    <li>
                    <a title="تابعنا عبر تليجرام" href="{{ $settings->telegram_url }}">
                      <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M21.45 3.05a1.25 1.25 0 00-1.34-.2L3.6 10.38a1.25 1.25 0 00.1 2.35l3.73 1.14 1.35 4.21a1.25 1.25 0 002.05.58l2.54-2.44 3.44 2.58a1.25 1.25 0 001.99-.73l3.3-13a1.25 1.25 0 00-.25-1.14zM9.07 13.9l-.58 3.5-.9-2.82 9.45-6.05-7.97 5.37z" fill="#1D8751"/>
                      </svg>
                    </a>
                  </li>


                  </ul>
                        </div>
                      </div>
                      <div class="col-xl-8">
                        <ul class="contact-us-info text-start">
                          <li>
                            <a
                              title="beauty-scape.com"
                              href="mailto:{{ $settings->email }}">{{ $settings->email }}</a
                            >
                            <svg
                              width="21"
                              height="17"
                              viewBox="0 0 21 17"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M18.5 0.0546875H2.5C1.4 0.0546875 0.51 0.954687 0.51 2.05469L0.5 14.0547C0.5 15.1547 1.4 16.0547 2.5 16.0547H18.5C19.6 16.0547 20.5 15.1547 20.5 14.0547V2.05469C20.5 0.954687 19.6 0.0546875 18.5 0.0546875ZM18.5 4.05469L10.5 9.05469L2.5 4.05469V2.05469L10.5 7.05469L18.5 2.05469V4.05469Z"
                                fill="white"
                              />
                            </svg>
                          </li>
                          <li>
                            <span>{{ $settings->TranslatedAddress }} </span>
                            <svg
                              width="15"
                              height="19"
                              viewBox="0 0 15 19"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M7.41016 18.9488C6.1471 17.8715 4.97635 16.6903 3.91016 15.4178C2.31016 13.5068 0.410157 10.6608 0.410157 7.94882C0.409463 6.56378 0.819665 5.20967 1.58885 4.05785C2.35804 2.90603 3.45163 2.00828 4.73122 1.47822C6.01082 0.948159 7.4189 0.809613 8.77727 1.08011C10.1356 1.35062 11.3832 2.01801 12.3622 2.99782C13.0139 3.64668 13.5305 4.41836 13.882 5.2682C14.2336 6.11803 14.4131 7.02915 14.4102 7.94882C14.4102 10.6608 12.5102 13.5068 10.9102 15.4178C9.84396 16.6903 8.67321 17.8714 7.41016 18.9488ZM7.41016 4.94882C6.61451 4.94882 5.85145 5.26489 5.28884 5.8275C4.72623 6.39011 4.41016 7.15317 4.41016 7.94882C4.41016 8.74447 4.72623 9.50753 5.28884 10.0701C5.85145 10.6328 6.61451 10.9488 7.41016 10.9488C8.20581 10.9488 8.96887 10.6328 9.53148 10.0701C10.0941 9.50753 10.4102 8.74447 10.4102 7.94882C10.4102 7.15317 10.0941 6.39011 9.53148 5.8275C8.96887 5.26489 8.20581 4.94882 7.41016 4.94882Z"
                                fill="white"
                              />
                            </svg>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
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
