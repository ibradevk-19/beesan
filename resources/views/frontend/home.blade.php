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
      <section class="hero">
        <!-- Hero Slider HTML -->
        <div class="hero-slider">
          @foreach($sliders as $slider)
          <div
              class="hero-slide bg-cover"
              style="background-image: url({{ asset('storage/' . $slider['image']) }})"
            >
            <div class="container">
              <div class="hero-slide-content">
                <div>
                  <div class="row justify-content-center">
                    <div class="col-lg-8">
                      <div>

                        <h1>{{ $slider['title'] }}</h1>
                        <p>
                           {{  $slider['sub_title']  }}
                        </p>
                        @if($slider['have_but'])
                        <a class="navabr-link" href="{{ $slider['url']}}">
                          <button class="btn custom-btn custom-btn--with-icon">
                            {{ $slider['but_title']  }}
                          </button>
                        </a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <button class="slick-next custom-prev">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0_203_8786)">
              <path
                d="M11.3648 12.3903L18.6217 5.13306C18.9905 4.76469 19.1744 4.31416 19.1744 3.78151C19.1744 3.24892 18.9904 2.7986 18.6217 2.43028L17.502 1.31018C17.1339 0.941969 16.6833 0.757813 16.1508 0.757813C15.6184 0.757813 15.168 0.941969 14.7993 1.31018L5.06337 11.0313C4.69495 11.3997 4.51074 11.8501 4.51074 12.3828C4.51074 12.9155 4.6949 13.3657 5.06337 13.7342L14.7992 23.4553C15.168 23.8237 15.6183 24.0078 16.1508 24.0078C16.6833 24.0078 17.1338 23.8237 17.502 23.4553L18.6217 22.3354C18.9904 21.9672 19.1744 21.5193 19.1744 20.9914C19.1744 20.4639 18.9904 20.0109 18.6217 19.6327L11.3648 12.3903Z"
                fill="white"
              />
            </g>
            <defs>
              <clipPath id="clip0_203_8786">
                <rect
                  width="23.25"
                  height="23.25"
                  fill="white"
                  transform="translate(0.216797 0.757812)"
                />
              </clipPath>
            </defs>
          </svg>
        </button>
        <button class="slick-prev custom-next">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0_203_2914)">
              <path
                d="M12.726 12.2503L5.46907 19.5076C5.10034 19.8759 4.9164 20.3265 4.9164 20.8591C4.9164 21.3917 5.10039 21.842 5.46907 22.2103L6.58881 23.3304C6.95697 23.6987 7.40755 23.8828 7.93999 23.8828C8.47243 23.8828 8.9228 23.6987 9.29154 23.3304L19.0275 13.6093C19.3959 13.241 19.5801 12.7905 19.5801 12.2578C19.5801 11.7251 19.3959 11.275 19.0275 10.9065L9.29159 1.18534C8.92286 0.81697 8.47253 0.632814 7.94004 0.632814C7.40755 0.632814 6.95702 0.81697 6.58886 1.18534L5.46912 2.30523C5.10039 2.67339 4.91645 3.12136 4.91645 3.64925C4.91645 4.17672 5.10045 4.6297 5.46912 5.00796L12.726 12.2503Z"
                fill="white"
              />
            </g>
            <defs>
              <clipPath id="clip0_203_2914">
                <rect
                  width="23.25"
                  height="23.25"
                  fill="white"
                  transform="matrix(-1 0 0 -1 23.873 23.8828)"
                />
              </clipPath>
            </defs>
          </svg>
        </button>
      </section>
      <!-- news  -->
      <section class="news section-padding">
        <div class="news-shape">
          <img
            class="img-full"
            src="{{ asset('frontend/assets/images/logo-svg.svg') }}"
            alt="beuty"
          />
        </div>
        <div class="container">
          <div class="news-top-section">
            <h2 class="section-title" data-aos="fade-in" data-aos-delay="150">
              <span> {{ __('News') }} </span>
            </h2>
            <!-- <div class="row justify-content-center">
              <div class="col-xl-3">
                <p
                  class="top-section-paragraph"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                {{ __('Some recent articles from our news feed.') }}
              </p>
              </div>
            </div> -->
          </div>
          <div class="news-content">
            <div class="row gy-4">
            @if ($featuredArticle)
              <div class="col-lg-6">
                <div class="news-main-item" data-aos="fade-up" data-aos-delay="150">
                  <div class="news-main-item-image">
                    <img
                      class="img-full"
                      src="{{ asset('storage/' . $featuredArticle->image) }}"
                      alt="news"
                    />
                  </div>
                  <div class="news-main-item-content">
                    <h3>
                      <a href="{{ route('home.show', $featuredArticle->slug) }}">
                        {{ $featuredArticle->TranslatedTitle }}
                      </a>
                    </h3>
                    <p>
                      {{ Str::words(strip_tags(html_entity_decode($featuredArticle->TranslatedBody)), 20, '...') }}
                    </p>
                    <a class="btn custom-btn link-color" href="{{ route('home.show', $featuredArticle->slug) }}">
                      {{ __('Read more') }}
                    </a>
                  </div>
                </div>
              </div>
            @endif

              <div class="col-lg-6">
                <div class="news-items">
                  <div class="row gy-4">
                    @foreach($articles as $article)
                      <div class="col-lg-12 col-sm-6">
                        <div
                          class="news-item"
                          data-aos="fade-up"
                          data-aos-delay="150"
                        >
                          <div class="row gy-4">
                            <div class="col-lg-6">
                              <a href="{{ route('home.show', $article->slug) }}" class="news-item-image">
                                <img
                                  class="img-full"
                                  src="{{  asset('storage/' . $article->image )   }}"
                                  alt="{{ $article->TranslatedTitle  }}"
                                />
                              </a>
                            </div>
                            <div class="col-lg-6">
                              <div class="news-item-content-wrapper">
                                <div class="news-item-content">
                                  <h5> <a href="{{ route('home.show', $article->slug) }}"> {{ $article->TranslatedTitle  }}</a></h5>
                                  <p>
                                    {{ Str::words(strip_tags(html_entity_decode($article->TranslatedBody)), 20, '...') }}
                                  </p>
                                </div>
                                <div class="news-item-btn-wrapper">
                                  <a
                                    class="btn news-item-btn"
                                    href="{{ route('home.show', $article->slug) }}"
                                    title="{{ $article->TranslatedTitle  }}"
                                  >
                                    <svg
                                      width="18"
                                      height="18"
                                      viewBox="0 0 18 18"
                                      fill="none"
                                      xmlns="http://www.w3.org/2000/svg"
                                    >
                                      <path
                                        d="M8.85449 17.3359L10.3746 15.8158L4.35871 9.78906H17.4795V7.63281H4.35871L10.3746 1.60609L8.85449 0.0859354L0.22949 8.71094L8.85449 17.3359Z"
                                        fill="white"
                                      />
                                    </svg>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center my-3" data-aos="fade-up" data-aos-delay="250">
          <a href="{{ route('home.news') }}" class="btn custom-btn">
              {{ __('Show All News') }}
          </a>
      </div>
      </section>

     
      <!-- about us  -->
      <section class="about-us section-padding">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6">
              <div
                class="about-us-image"
                data-aos="fade-in"
                data-aos-delay="150"
              >
                <img
                  class="img-full"
                  src="{{  asset('storage/' . $aboutData->image_path )   }}"
                  alt="من نحن"
                />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="about-us-content">
                <div class="about-us-shape">
                  <img
                    class="img-full"
                    src="{{ asset('assets/images/logo.png') }}"
                    alt="beuty"
                    style="opacity: 0.2;"
                  />
                </div>
                <h3
                  data-aos="fade-in"
                  data-aos-delay="150"
                  class="section-title section-title--with-end-shape justify-content-start"
                >
                  <span> {{ __('About Us') }}</span>
                </h3>
                <!-- <h2
                  class="h2 text-primary-color"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                {{ $aboutData->TranslatedTitle }}
                </h2> -->
                  <p >
                      {!! $aboutData->TranslatedBody !!}
                  </p>
                <a
                  data-aos="fade-up"
                  data-aos-delay="230"
                  class="btn custom-btn mt-4"
                  href="{{ route('home.about') }}"
                  > {{ __('Read more') }}</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- services -->
      <!-- <section class="services section-padding">
        <div class="services-shape">
          <img
            class="img-full"
            src="{{ asset('frontend/assets/images/logos/logo_w_02.png') }}"
            alt="خدماتنا"
          />
        </div>
        <div class="container">
          <div class="services-top-section">
            <h2 class="section-title" data-aos="fade-in" data-aos-delay="150">
              <span> خدماتنا </span>
            </h2>
            <div class="row justify-content-center">
              <div class="col-xl-4">
                <p
                  class="top-section-paragraph"
                  data-aos="fade-up"
                  data-aos-delay="150"
                >
                  وجهتك الشاملة لجميع احتياجات المناظر الطبيعية الخاصة بك.
                </p>
              </div>
            </div>
          </div>
          <div class="services-items" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                  <a href="#" class="service-item-image">
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/service-item.png') }}"
                      alt="إمدادات المركبات والمعدات"
                    />
                  </a>
                  <div class="service-item-content">
                    <h4>المرافق العامة</h4>
                    <p>
                      يحاكي عشبنا الاصطناعي مظهر وملمس العشب الطبيعي بينما يتطلب
                      الحد الأدنى من الصيانة.
                    </p>
                    <a class="btn custom-btn" href="#">لمعرفة المزيد</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                  <a href="#" class="service-item-image">
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/service-item.png') }}"
                      alt="إمدادات المركبات والمعدات"
                    />
                  </a>
                  <div class="service-item-content">
                    <div>
                      <h4>المرافق العامة</h4>
                      <p>
                        يحاكي عشبنا الاصطناعي مظهر وملمس العشب الطبيعي بينما
                        يتطلب الحد الأدنى من الصيانة.
                      </p>
                    </div>
                    <a class="btn custom-btn" href="#">لمعرفة المزيد</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                  <a href="#" class="service-item-image">
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/service-item.png') }}"
                      alt="إمدادات المركبات والمعدات"
                    />
                  </a>
                  <div class="service-item-content">
                    <div>
                      <h4>المرافق العامة</h4>
                      <p>
                        يحاكي عشبنا الاصطناعي مظهر وملمس العشب الطبيعي بينما
                        يتطلب الحد الأدنى من الصيانة.
                      </p>
                    </div>

                    <a class="btn custom-btn" href="#">لمعرفة المزيد</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                  <a href="#" class="service-item-image">
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/service-item.png') }}"
                      alt="إمدادات المركبات والمعدات"
                    />
                  </a>
                  <div class="service-item-content">
                    <div>
                      <h4>المرافق العامة</h4>
                      <p>
                        يحاكي عشبنا الاصطناعي مظهر وملمس العشب الطبيعي بينما
                        يتطلب الحد الأدنى من الصيانة.
                      </p>
                    </div>

                    <a class="btn custom-btn" href="#">لمعرفة المزيد</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                  <a href="#" class="service-item-image">
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/service-item.png') }}"
                      alt="إمدادات المركبات والمعدات"
                    />
                  </a>
                  <div class="service-item-content">
                    <div>
                      <h4>المرافق العامة</h4>
                      <p>
                        يحاكي عشبنا الاصطناعي مظهر وملمس العشب الطبيعي بينما
                        يتطلب الحد الأدنى من الصيانة.
                      </p>
                    </div>

                    <a class="btn custom-btn" href="#">لمعرفة المزيد</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->

      <!-- projects -->
      <!-- <section id="projects" class="projects section-padding">
        <div class="projects-shape">
          
        </div>
        <div class="container">
          <div class="projects-top-section">
            <h2 data-aos="fade-up" data-aos-delay="150" class="section-title">
              <span> مشاريعنا </span>
            </h2>
          </div>
          <div data-aos="fade-up" data-aos-delay="200" class="projects-filters">
            <ul class="list">
              <li>
                <button class="btn mixitup-control-active" data-filter="*">
                  الكل
                </button>
              </li>
              <li>
                <button class="btn" data-filter=".previous-projects">
                  المشاريع السابقة
                </button>
              </li>
              <li>
                <button class="btn" data-filter=".under-construction">
                  تحت الإنشاء
                </button>
              </li>
            </ul>
          </div>
          <div class="projects-items" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mix under-construction">
                <div class="project-item">
                  <a
                    class="project-item-image"
                    data-fancybox="gallery"
                    data-src="{{ asset('frontend/assets/images/project-item.png') }}"
                    data-caption="مشروع 1"
                  >
                    <img
                      class="img-full"
                      src="{{ asset('frontend/assets/images/project-item.png') }}"
                      alt="مشروع 1"
                    />
                  </a>
                  <div class="project-item-content">
                    <h5>لوريم أوبسوم لوريم أوبسوم لوريم أوبسوم</h5>
                    <p>يم أوبسوم لوريم أوبسوم لوريم أوبسوم</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <!-- clients -->
      <section class="clients section-padding">
        <div class="container">
          <div class="clients-top-section">
            <h2 class="section-title" data-aos="fade-in" data-aos-delay="150">
              <span> {{ __('Partners') }} </span>
            </h2>
          </div>
          <div
            id="clients-slider"
            class="slider clients-slider"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            @foreach($clients as $client)
            <div class="client-slide">
              <a href="{{ $client->client_url }}">
                <img
                  class="img-fluid"
                  src="{{ asset('storage/' . $client->client_logo) }}"
                  alt=""
                />
              </a>
            
            </div>
            @endforeach
          </div>
        </div>
      </section>

      <!-- <div class="testimonials">
        <div class="container">
          <div class="testimonials-top-section">
            <h2 class="section-title" data-aos="fade-in" data-aos-delay="150">
              <span> آراء العملاء </span>
            </h2>
          </div>
          <div
            class="testimonials-items"
            data-aos="fade-in"
            data-aos-delay="200"
          >
            <div id="testimonials-slider" class="slider testimonials-slider">
              <div class="testimonials-slide">
                <div class="testimonials-slide-body">
                  <div class="testimonials-slide-shape">
                    <svg
                      width="20"
                      height="19"
                      viewBox="0 0 20 19"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_203_8860)">
                        <path
                          d="M19.4389 5.7618C19.4389 5.75978 19.4392 5.75776 19.4392 5.75573C19.4392 3.29962 17.4481 1.30859 14.992 1.30859C12.5359 1.30859 10.5449 3.29958 10.5449 5.75573C10.5449 8.21189 12.5361 10.2029 14.9921 10.2029C15.4968 10.2029 15.98 10.1149 16.4321 9.95985C15.4316 15.6996 10.9557 19.4012 15.1048 16.3547C19.7056 12.9765 19.4441 5.89142 19.4389 5.7618Z"
                          fill="white"
                        />
                        <path
                          d="M5.20788 10.2028C5.71265 10.2028 6.19583 10.1148 6.64817 9.95981C5.64738 15.6996 1.17145 19.4011 5.32062 16.3547C9.92143 12.9765 9.65995 5.89142 9.65476 5.7618C9.65476 5.75978 9.65498 5.75776 9.65498 5.75573C9.65498 3.29962 7.664 1.30859 5.20788 1.30859C2.75173 1.30859 0.760742 3.29958 0.760742 5.75573C0.760742 8.21189 2.75195 10.2028 5.20788 10.2028Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_203_8860">
                          <rect
                            width="18.6818"
                            height="18.6818"
                            fill="white"
                            transform="translate(0.761719 0.0390625)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                  <div class="testimonials-slide-content">
                    <p>
                      لوريم أوبسوم لوريم اوبسوم لوريم اوبسوم لوريم اوبسوم لوريم
                      اوبسوم لوريم اوبسوم
                    </p>
                  </div>

                  <div class="testimonials-slide-author-stars-wrapper">
                    <div class="author">
                      <div class="author-image">
                        <img
                          class="img-full"
                          src="./assets/images/testim.png"
                          alt="محمد علي"
                        />
                      </div>
                      <h5>محمد علي</h5>
                    </div>

                    <div class="stars">
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonials-slide">
                <div class="testimonials-slide-body">
                  <div class="testimonials-slide-shape">
                    <svg
                      width="20"
                      height="19"
                      viewBox="0 0 20 19"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_203_8860)">
                        <path
                          d="M19.4389 5.7618C19.4389 5.75978 19.4392 5.75776 19.4392 5.75573C19.4392 3.29962 17.4481 1.30859 14.992 1.30859C12.5359 1.30859 10.5449 3.29958 10.5449 5.75573C10.5449 8.21189 12.5361 10.2029 14.9921 10.2029C15.4968 10.2029 15.98 10.1149 16.4321 9.95985C15.4316 15.6996 10.9557 19.4012 15.1048 16.3547C19.7056 12.9765 19.4441 5.89142 19.4389 5.7618Z"
                          fill="white"
                        />
                        <path
                          d="M5.20788 10.2028C5.71265 10.2028 6.19583 10.1148 6.64817 9.95981C5.64738 15.6996 1.17145 19.4011 5.32062 16.3547C9.92143 12.9765 9.65995 5.89142 9.65476 5.7618C9.65476 5.75978 9.65498 5.75776 9.65498 5.75573C9.65498 3.29962 7.664 1.30859 5.20788 1.30859C2.75173 1.30859 0.760742 3.29958 0.760742 5.75573C0.760742 8.21189 2.75195 10.2028 5.20788 10.2028Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_203_8860">
                          <rect
                            width="18.6818"
                            height="18.6818"
                            fill="white"
                            transform="translate(0.761719 0.0390625)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                  <div class="testimonials-slide-content">
                    <p>
                      لوريم أوبسوم لوريم اوبسوم لوريم اوبسوم لوريم اوبسوم لوريم
                      اوبسوم لوريم اوبسوم
                    </p>
                  </div>

                  <div class="testimonials-slide-author-stars-wrapper">
                    <div class="author">
                      <div class="author-image">
                        <img
                          class="img-full"
                          src="./assets/images/testim.png"
                          alt="محمد علي"
                        />
                      </div>
                      <h5>محمد علي</h5>
                    </div>

                    <div class="stars">
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonials-slide">
                <div class="testimonials-slide-body">
                  <div class="testimonials-slide-shape">
                    <svg
                      width="20"
                      height="19"
                      viewBox="0 0 20 19"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_203_8860)">
                        <path
                          d="M19.4389 5.7618C19.4389 5.75978 19.4392 5.75776 19.4392 5.75573C19.4392 3.29962 17.4481 1.30859 14.992 1.30859C12.5359 1.30859 10.5449 3.29958 10.5449 5.75573C10.5449 8.21189 12.5361 10.2029 14.9921 10.2029C15.4968 10.2029 15.98 10.1149 16.4321 9.95985C15.4316 15.6996 10.9557 19.4012 15.1048 16.3547C19.7056 12.9765 19.4441 5.89142 19.4389 5.7618Z"
                          fill="white"
                        />
                        <path
                          d="M5.20788 10.2028C5.71265 10.2028 6.19583 10.1148 6.64817 9.95981C5.64738 15.6996 1.17145 19.4011 5.32062 16.3547C9.92143 12.9765 9.65995 5.89142 9.65476 5.7618C9.65476 5.75978 9.65498 5.75776 9.65498 5.75573C9.65498 3.29962 7.664 1.30859 5.20788 1.30859C2.75173 1.30859 0.760742 3.29958 0.760742 5.75573C0.760742 8.21189 2.75195 10.2028 5.20788 10.2028Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_203_8860">
                          <rect
                            width="18.6818"
                            height="18.6818"
                            fill="white"
                            transform="translate(0.761719 0.0390625)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                  <div class="testimonials-slide-content">
                    <p>
                      لوريم أوبسوم لوريم اوبسوم لوريم اوبسوم لوريم اوبسوم لوريم
                      اوبسوم لوريم اوبسوم
                    </p>
                  </div>

                  <div class="testimonials-slide-author-stars-wrapper">
                    <div class="author">
                      <div class="author-image">
                        <img
                          class="img-full"
                          src="./assets/images/testim.png"
                          alt="محمد علي"
                        />
                      </div>
                      <h5>محمد علي</h5>
                    </div>

                    <div class="stars">
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonials-slide">
                <div class="testimonials-slide-body">
                  <div class="testimonials-slide-shape">
                    <svg
                      width="20"
                      height="19"
                      viewBox="0 0 20 19"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_203_8860)">
                        <path
                          d="M19.4389 5.7618C19.4389 5.75978 19.4392 5.75776 19.4392 5.75573C19.4392 3.29962 17.4481 1.30859 14.992 1.30859C12.5359 1.30859 10.5449 3.29958 10.5449 5.75573C10.5449 8.21189 12.5361 10.2029 14.9921 10.2029C15.4968 10.2029 15.98 10.1149 16.4321 9.95985C15.4316 15.6996 10.9557 19.4012 15.1048 16.3547C19.7056 12.9765 19.4441 5.89142 19.4389 5.7618Z"
                          fill="white"
                        />
                        <path
                          d="M5.20788 10.2028C5.71265 10.2028 6.19583 10.1148 6.64817 9.95981C5.64738 15.6996 1.17145 19.4011 5.32062 16.3547C9.92143 12.9765 9.65995 5.89142 9.65476 5.7618C9.65476 5.75978 9.65498 5.75776 9.65498 5.75573C9.65498 3.29962 7.664 1.30859 5.20788 1.30859C2.75173 1.30859 0.760742 3.29958 0.760742 5.75573C0.760742 8.21189 2.75195 10.2028 5.20788 10.2028Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_203_8860">
                          <rect
                            width="18.6818"
                            height="18.6818"
                            fill="white"
                            transform="translate(0.761719 0.0390625)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                  <div class="testimonials-slide-content">
                    <p>
                      لوريم أوبسوم لوريم اوبسوم لوريم اوبسوم لوريم اوبسوم لوريم
                      اوبسوم لوريم اوبسوم
                    </p>
                  </div>

                  <div class="testimonials-slide-author-stars-wrapper">
                    <div class="author">
                      <div class="author-image">
                        <img
                          class="img-full"
                          src="./assets/images/testim.png"
                          alt="محمد علي"
                        />
                      </div>
                      <h5>محمد علي</h5>
                    </div>

                    <div class="stars">
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonials-slide">
                <div class="testimonials-slide-body">
                  <div class="testimonials-slide-shape">
                    <svg
                      width="20"
                      height="19"
                      viewBox="0 0 20 19"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_203_8860)">
                        <path
                          d="M19.4389 5.7618C19.4389 5.75978 19.4392 5.75776 19.4392 5.75573C19.4392 3.29962 17.4481 1.30859 14.992 1.30859C12.5359 1.30859 10.5449 3.29958 10.5449 5.75573C10.5449 8.21189 12.5361 10.2029 14.9921 10.2029C15.4968 10.2029 15.98 10.1149 16.4321 9.95985C15.4316 15.6996 10.9557 19.4012 15.1048 16.3547C19.7056 12.9765 19.4441 5.89142 19.4389 5.7618Z"
                          fill="white"
                        />
                        <path
                          d="M5.20788 10.2028C5.71265 10.2028 6.19583 10.1148 6.64817 9.95981C5.64738 15.6996 1.17145 19.4011 5.32062 16.3547C9.92143 12.9765 9.65995 5.89142 9.65476 5.7618C9.65476 5.75978 9.65498 5.75776 9.65498 5.75573C9.65498 3.29962 7.664 1.30859 5.20788 1.30859C2.75173 1.30859 0.760742 3.29958 0.760742 5.75573C0.760742 8.21189 2.75195 10.2028 5.20788 10.2028Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_203_8860">
                          <rect
                            width="18.6818"
                            height="18.6818"
                            fill="white"
                            transform="translate(0.761719 0.0390625)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                  <div class="testimonials-slide-content">
                    <p>
                      لوريم أوبسوم لوريم اوبسوم لوريم اوبسوم لوريم اوبسوم لوريم
                      اوبسوم لوريم اوبسوم
                    </p>
                  </div>

                  <div class="testimonials-slide-author-stars-wrapper">
                    <div class="author">
                      <div class="author-image">
                        <img
                          class="img-full"
                          src="./assets/images/testim.png"
                          alt="محمد علي"
                        />
                      </div>
                      <h5>محمد علي</h5>
                    </div>

                    <div class="stars">
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonials-slide">
                <div class="testimonials-slide-body">
                  <div class="testimonials-slide-shape">
                    <svg
                      width="20"
                      height="19"
                      viewBox="0 0 20 19"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0_203_8860)">
                        <path
                          d="M19.4389 5.7618C19.4389 5.75978 19.4392 5.75776 19.4392 5.75573C19.4392 3.29962 17.4481 1.30859 14.992 1.30859C12.5359 1.30859 10.5449 3.29958 10.5449 5.75573C10.5449 8.21189 12.5361 10.2029 14.9921 10.2029C15.4968 10.2029 15.98 10.1149 16.4321 9.95985C15.4316 15.6996 10.9557 19.4012 15.1048 16.3547C19.7056 12.9765 19.4441 5.89142 19.4389 5.7618Z"
                          fill="white"
                        />
                        <path
                          d="M5.20788 10.2028C5.71265 10.2028 6.19583 10.1148 6.64817 9.95981C5.64738 15.6996 1.17145 19.4011 5.32062 16.3547C9.92143 12.9765 9.65995 5.89142 9.65476 5.7618C9.65476 5.75978 9.65498 5.75776 9.65498 5.75573C9.65498 3.29962 7.664 1.30859 5.20788 1.30859C2.75173 1.30859 0.760742 3.29958 0.760742 5.75573C0.760742 8.21189 2.75195 10.2028 5.20788 10.2028Z"
                          fill="white"
                        />
                      </g>
                      <defs>
                        <clipPath id="clip0_203_8860">
                          <rect
                            width="18.6818"
                            height="18.6818"
                            fill="white"
                            transform="translate(0.761719 0.0390625)"
                          />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                  <div class="testimonials-slide-content">
                    <p>
                      لوريم أوبسوم لوريم اوبسوم لوريم اوبسوم لوريم اوبسوم لوريم
                      اوبسوم لوريم اوبسوم
                    </p>
                  </div>

                  <div class="testimonials-slide-author-stars-wrapper">
                    <div class="author">
                      <div class="author-image">
                        <img
                          class="img-full"
                          src="./assets/images/testim.png"
                          alt="محمد علي"
                        />
                      </div>
                      <h5>محمد علي</h5>
                    </div>

                    <div class="stars">
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                      <svg
                        width="17"
                        height="20"
                        viewBox="0 0 17 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.875 0.341797L10.6655 6.61562L16.994 5.0293L12.4559 9.7168L16.994 14.4043L10.6655 12.818L8.875 19.0918L7.08453 12.818L0.756012 14.4043L5.29407 9.7168L0.756012 5.0293L7.08453 6.61562L8.875 0.341797Z"
                          fill="#EAC14E"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
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
