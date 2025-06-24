@php
    $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    $align = app()->getLocale() == 'ar' ? 'right' : 'left';
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $dir }}">
  <head>
    @include('frontend.parts.seo')

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- English font -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/english-font/stylesheet.css') }}" />
    <!-- Arabic font -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/stylesheet.css') }}" />
    <!-- Slick slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <!-- AOS animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
  </head>

  <body>
    @include('frontend.parts.pages-navbar')

    <main class="main-content">
      <section class="section-padding">
        <div class="container">
          <h2 class="section-title mb-5 text-center">{{ __('إعلانات المؤسسة') }}</h2>

          @forelse($announcements as $announcement)
            @php
              $isExpired = $announcement->expiry_date && \Carbon\Carbon::parse($announcement->expiry_date)->isPast();
            @endphp

            <div class="card mb-4 shadow-sm" style="direction: {{ $dir }};">
              <div class="row g-0">
                {{-- الصورة --}}
                <div class="col-md-4">
                  <img src="{{ asset('storage/' . $announcement->image) }}" class="img-fluid rounded-start w-100 h-100" alt="{{ $announcement->title[app()->getLocale()] }}">
                </div>

                {{-- التفاصيل --}}
                <div class="col-md-8 position-relative">
                  {{-- شارة إعلان منتهي --}}


                  <div class="card-body">
                  @if($isExpired)
                    <span class="badge bg-danger m-2">
                      {{ __('الإعلان منتهي') }}
                    </span>
                  @endif
                    <h5 class="card-title">
                      {{ $announcement->title[app()->getLocale()] }}
                    </h5>

                    <p class="card-text">
                        {{ Str::words(strip_tags(str_replace('&nbsp;', ' ', $announcement->description[app()->getLocale()]) ?? ''), 50, '...') }}
                    </p>

                    <p class="card-text">
                      <small class="text-muted">
                        {{ __('ينتهي في') }}: {{ \Carbon\Carbon::parse($announcement->expiry_date)->format('Y-m-d') }}
                      </small>
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                      @if($isExpired)
                        <button class="btn btn-outline-primary btn-sm" disabled>🔗 {{ __('الرابط الخارجي') }}</button>
                        <button class="btn btn-outline-secondary btn-sm" disabled>📎 {{ __('تحميل المرفق') }}</button>
                        <button class="btn btn-primary btn-sm" disabled>{{ __('عرض التفاصيل') }}</button>
                      @else
                        @if ($announcement->external_link)
                          <a href="{{ $announcement->external_link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                            🔗 {{ __('الرابط الخارجي') }}
                          </a>
                        @endif

                        @if ($announcement->attachments->count())
                          <a href="{{ asset('storage/' . $announcement->attachments->first()->file_path) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                            📎 {{ __('تحميل المرفق') }}
                          </a>
                        @endif


                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="alert alert-info text-center">
              {{ __('لا توجد إعلانات متاحة حالياً.') }}
            </div>
          @endforelse

          {{-- Pagination --}}
          <div class="d-flex justify-content-center mt-4">
            {{ $announcements->links() }}
          </div>
        </div>
      </section>
    </main>

    @include('frontend.parts.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mixitup@3/dist/mixitup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
  </body>
</html>
