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
    
    <section class="services section-padding services-page">
        <div class="services-shape">
          <img
            class="img-full"
            src="{{ asset('frontend/assets/images/logos/logo_w_02.png') }}"
            alt="اخبار"
          />
        </div>
        <div class="container">
          <div class="services-top-section">
            <h2 class="section-title" data-aos="fade-in" data-aos-delay="150">
              <span> {{ __('News') }} </span>
            </h2>
            <div class="row justify-content-center">
              <div class="col-xl-4">
                <p
                  class="top-section-paragraph"
                  data-aos="fade-up"
                  data-aos-delay="150"
                >
                  
                </p>
              </div>
            </div>
          </div>
          <div class="services-items" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4 " id="articles-container">
               @include('frontend.articles.partials.article-items', ['articles' => $articles])
            </div>
          </div>
        </div>

        @if($articles->hasMorePages())
            <div class="text-center mt-4">
                <button id="load-more-btn" data-next-page="2" class="btn custom-btn">
                    {{ __('عرض المزيد') }}
                </button>
            </div>
        @endif
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

    <script>
    $(document).ready(function() {
        $('#load-more-btn').on('click', function() {
            var button = $(this);
            var nextPage = button.data('next-page');

            $.ajax({
                url: '{{ route('articles.load') }}',
                method: 'GET',
                data: { page: nextPage },
                beforeSend: function () {
                    button.text('جاري التحميل...');
                },
                success: function(response) {
                    $('#articles-container').append(response);
                    button.data('next-page', nextPage + 1);

                    // تحقق من انتهاء الصفحات
                    if (!response.trim()) {
                        button.remove();
                    } else {
                        button.text('عرض المزيد');
                    }
                },
                error: function() {
                    button.text('فشل التحميل');
                }
            });
        });
    });
</script>
  </body>
</html>
