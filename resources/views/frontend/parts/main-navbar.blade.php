<header>
      <div class="container">
        <nav id="navbar" class="navbar main-navbar">
          <div class="container">
            <div class="navbar-inner-wrapper">
              <a href="{{ route('home.index') }}" class="navbar-logo">
                <img
                  class="img-full"
                   src="{{ asset('frontend/assets/images/logos/full_logo_color01.png') }}"
                  alt="beesan.org"
                />
              </a>

              <div id="navbar-menu" class="navbar-links">
                <ul>
                  <li>
                    <a
                      class="navabr-link active"
                      href="{{ route('home.index') }}"
                      title="{{ __('Home') }}"
                      >{{ __('Home') }}</a
                    >
                  </li>
                  <li>
                    <a class="navabr-link" href="{{ route('home.news') }}" title="{{ __('About Us') }}">
                       {{ __('News') }}
                    </a>
                  </li>
                  <li>
                    <a class="navabr-link" href="{{ route('home.about') }}" title="{{ __('About Us') }}"
                      >{{ __('About Us') }}</a
                    >
                  </li>
                  <li>
                    <a
                      class="navabr-link"
                      href="{{ route('home.sectors') }}"
                      title="{{__('Our Sectors')}}">
                      {{__('Our Sectors')}}
                    </a>
                  </li>
                  <li>
                    <a
                      class="navabr-link"
                      href="{{ route('home.projects') }}"
                      title="{{ __('Our projects')}}">{{ __('Our projects')}}</a>
                  </li>

                  <li>
                    <a
                      class="navabr-link"
                      href="{{ route('home.announcements') }}"
                      title="{{ __('Announcements')}}">{{ __('Announcements')}}</a>
                  </li>

                  <li>
                    <a
                      class="navabr-link"
                      href="{{ route('home.contact') }}"
                      title="{{__('Contact us')}}"
                      >{{__('Contact us')}}
                    </a>
                  </li>
                </ul>
              </div>
              <div class="navbar-toggler-with-lang-wrapper">
                <div class="navbar-language">
                  <div class="dropdown">
                    <button
                      class="dropdown-toggle"
                      type="button"
                      id="dropdownMenuButton1"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <svg
                        width="33"
                        height="33"
                        viewBox="0 0 33 33"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M16.0961 0.841797C7.22434 0.841797 0.0322266 8.03391 0.0322266 16.9056C0.0322266 25.7774 7.22434 32.9695 16.0961 32.9695C24.9678 32.9695 32.1599 25.7774 32.1599 16.9056C32.15 8.03813 24.9636 0.851703 16.0961 0.841797ZM29.989 22.5332L25.4207 23.3215C25.9435 21.4038 26.2259 19.4285 26.2611 17.4411H31.0756C31.0152 19.1891 30.6474 20.9128 29.989 22.5332H29.989ZM1.11654 17.4411H5.931C5.96633 19.4285 6.2487 21.4038 6.77161 23.3215L2.20319 22.5332C1.54476 20.9128 1.1769 19.1891 1.11647 17.4411H1.11654ZM2.20319 11.2781L6.77161 10.4898C6.24865 12.4075 5.96624 14.3828 5.93087 16.3702H1.11654C1.17694 14.6222 1.54478 12.8985 2.20319 11.2781ZM16.6315 9.43923C18.5557 9.46377 20.475 9.63904 22.3718 9.96345L24.2619 10.2895C24.8426 12.2656 25.155 14.3108 25.1908 16.3702H16.6315V9.43923ZM22.5543 8.90799C20.5972 8.57346 18.6169 8.39301 16.6315 8.36831V1.94277C19.7013 2.23768 22.3679 5.04838 23.8791 9.13884L22.5543 8.90799ZM15.5606 8.36831C13.5755 8.39301 11.5953 8.57346 9.6384 8.90799L8.31307 9.13723C9.82428 5.04584 12.4909 2.23413 15.5606 1.9405V8.36831ZM9.82086 9.96345C11.7175 9.63905 13.6366 9.4638 15.5606 9.4393V16.3702H7.00132C7.03713 14.3108 7.34958 12.2656 7.93028 10.2895L9.82086 9.96345ZM7.00132 17.4411H15.5606V24.372C13.6364 24.3475 11.7171 24.1722 9.82033 23.8478L7.93028 23.5218C7.34958 21.5457 7.03713 19.5005 7.00132 17.4411ZM9.6378 24.9033C11.5949 25.2383 13.5752 25.4197 15.5606 25.4458V31.8714C12.4909 31.5762 9.82428 28.7655 8.31307 24.6751L9.6378 24.9033ZM16.6315 25.4458C18.6167 25.4197 20.5968 25.2383 22.5537 24.9033L23.8791 24.674C22.3679 28.7654 19.7013 31.5772 16.6315 31.8708V25.4458ZM22.3713 23.8478C20.4747 24.1722 18.5555 24.3475 16.6315 24.372V17.4411H25.1908C25.155 19.5005 24.8426 21.5457 24.2619 23.5218L22.3713 23.8478ZM26.2611 16.3702C26.2258 14.3828 25.9435 12.4075 25.4206 10.4898L29.989 11.2781C30.6474 12.8985 31.0152 14.6222 31.0757 16.3702H26.2611ZM29.4473 10.0979L25.0682 9.34225C24.281 6.77388 22.8081 4.46893 20.808 2.67562C24.5482 3.92373 27.6499 6.58851 29.4473 10.0979H29.4473ZM11.3841 2.67555C9.38408 4.46888 7.91113 6.77386 7.12394 9.34225L2.74481 10.0979C4.54222 6.58849 7.64396 3.92368 11.3841 2.67555ZM2.74481 23.7134L7.12394 24.469C7.91115 27.0374 9.38409 29.3424 11.3841 31.1357C7.64397 29.8876 4.54224 27.2228 2.74481 23.7134V23.7134ZM20.808 31.1355C22.808 29.3423 24.281 27.0373 25.0682 24.469L29.4473 23.7134C27.6499 27.2228 24.5482 29.8876 20.808 31.1357V31.1355Z"
                          fill="#1D8751"
                        />
                      </svg>
                    </button>
                    <ul
                      class="dropdown-menu center"
                      aria-labelledby="dropdownMenuButton1"
                    >
                      <li><a class="dropdown-item" href="{{ route('lang.switch', 'ar') }}">عربي</a></li>
                      <li>
                        <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">English </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <button id="navbar-toggler" class="navbar-toggler">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    version="1.1"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <div id="overlay" class="overlay"></div>
    <aside id="sidebar" class="sidebar">
      <div id="navbar-menu" class="navbar-links">
        <ul>
          <li>
            <a class="navabr-link active" href="{{ route('home.index') }}" title="الرئيسية"
              >{{ __('Home') }}</a
            >
          </li>
          <li>
            <a class="navabr-link active" href="{{ route('home.news') }}" title="{{ __('News') }}"
              >{{ __('News') }}</a
            >
          </li>
          <li>
            <a class="navabr-link" href="{{ route('home.about') }}" title="من نحن"
              >{{ __('About Us') }} </a
            >
          </li>
          <li>
            <a class="navabr-link" href="{{ route('home.sectors') }}" title="قطاعاتنا"
              >  {{__('Our Sectors')}}
            </a>
          </li>
          <li>
            <a class="navabr-link" href="{{ route('home.projects') }}" title="مشاريعنا"
              >  {{ __('Our projects')}}
            </a>
          </li>
          <li>
            <a class="navabr-link" href="{{ route('home.announcements') }}" title="مشاريعنا"
              > {{ __('Announcements')}}
            </a>
          </li>

            <a class="navabr-link" href="./contact-us.html" title="تواصل معنا"
              >{{__('Contact us')}}
            </a>
          </li>
        </ul>
      </div>
      <div class="sidebar-language dropdown mt-4 px-3">
        <button class="btn dropdown-toggle language-selector w-100" type="button" id="mobileLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; justify-content: center; align-items: center; gap: 3px;">
          <span class="globe-icon">🌐</span> {{ __('Language') }} <i class="dropdown-arrow"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="mobileLanguageDropdown" style="">
          <li><a class="dropdown-item active" href="{{ route('lang.switch', 'ar') }}">العربية</a></li>
          <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">English</a></li>
        </ul>
      </div>
    </aside>
