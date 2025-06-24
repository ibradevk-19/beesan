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
        <section class="blog-details section-padding">
            <div class="container">
              <!-- صورة رئيسية -->

              <!-- عنوان وتفاصيل -->
              <div class="mb-4 blog-details-title" data-aos="fade-up">

                <h1 class="text-primary-color">{{ $article->TranslatedTitle ?? '' }}  </h1>
              </div>

              <!-- محتوى المقال -->
              <div class="article-content">
                <div  data-aos="fade-up" class="mb-4 ">
                    <img src="{{  asset('storage/' . $article->image )   }}" class="img-fluid rounded" style="max-width: 100%; width: 100%; height: auto;" alt="عنوان المقال" />
                  </div>

                  <div class="article-content container">
                    {!! $article->TranslatedBody !!}
                  </div>



                @if($article->images && count($article->images) != 0 )
                <div class="my-5" data-aos="fade-up" data-aos-delay="400">
                  <h3 class="mb-3">{{ __('Photo Gallery') }}</h3>
                  <div class="row g-3">
                    @foreach($article->images as $image)
                    <div class="col-md-3">
                      <a data-fancybox="gallery" href="{{  asset('storage/' . $image->image_path )   }}">
                        <img src="{{  asset('storage/' . $image->image_path )   }}"  class="img-fluid rounded" alt="صورة 1" />
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
                @endif

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
