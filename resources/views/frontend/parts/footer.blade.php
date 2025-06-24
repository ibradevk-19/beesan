<footer class="footer">
      <div class="footer-bg">
        <img
          class="img-fluid"

          alt="footer"
          src="{{ asset('frontend/assets/images/logos/logo_01.png') }}"
           style="opacity: 0.2;"
        />
      </div>
      <div class="footer-top">
        <div class="container">
          <div class="row gy-4">
            <div class="col-xl-4 col-sm-6">
              <div class="footer-logo-content-wrap">
                <a href="#" title="beuty" class="footer-logo">
                  <img
                    class="img-full"
                    src="{{ asset('storage/' . $settings->footer_logo) }}"
                    alt="beuty"
                  />
                </a>
                <p>
                    {{ Str::words(strip_tags($settings->TranslatedFooter), 150, '...') }}
                </p>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6">
              <div class="footer-links">
                <h4 class="footer-links-title">
                  <span>
                    {{ __('Links') }}
                    <img src="{{ asset('frontend/assets/images/under-title.svg') }}" alt="روابط" />
                  </span>
                </h4>
                <ul>
                  <li>
                    <a href="{{ route('home.index') }}">{{ __('Home') }} </a>
                  </li>
                  <li>
                    <a href="{{ route('home.news') }}"> {{ __('News') }} </a>
                  </li>
                  <li>
                    <a href="{{ route('home.about') }}"> {{ __('About Us') }} </a>
                  </li>
                  <li>
                    <a href="{{ route('home.sectors') }}">{{ __('Our Sectors') }}</a>
                  </li>
                  <li>
                    <a href="{{ route('home.projects') }}">{{ __('Our projects') }}</a>
                  </li>
                  <li>
                    <a href="{{ route('home.contact') }}"> {{ __('Contact us') }} </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <!-- <div class="footer-links">
                <h4 class="footer-links-title">
                  <span>
                    ساعات العمل
                    <img src="{{ asset('frontend/assets/images/under-title.svg') }}" alt="روابط" />
                  </span>
                </h4>
                <ul class="working-time">
                  <li>
                    <span>الأحد</span>
                    <span>10:00 AM to 3:00 PM</span>
                  </li>
                  <li>
                    <span>الأحد</span>
                    <span>10:00 AM to 3:00 PM</span>
                  </li>
                  <li>
                    <span>الأحد</span>
                    <span>10:00 AM to 3:00 PM</span>
                  </li>
                  <li>
                    <span>الأحد</span>
                    <span>10:00 AM to 3:00 PM</span>
                  </li>
                  <li>
                    <span>الأحد</span>
                    <span>10:00 AM to 3:00 PM</span>
                  </li>
                </ul>
              </div> -->
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="footer-links">
                <h4 class="footer-links-title">
                  <span>
                    {{ __('Contact information') }}
                    <img src="{{ asset('frontend/assets/images/under-title.svg') }}" alt="روابط" />
                    </span>
                </h4>
                <ul class="working-time">
                  <li>{{ $settings->TranslatedAddress }}</li>
                  <li>
                    <a href="{{ $settings->site_url }}">{{ $settings->site_url }}</a>
                  </li>
                  <li>
                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                  </li>
                  <li>
                    <a href="tel:{{ $settings->mobile_number }}">{{ $settings->mobile_number }}</a>
                  </li>
                </ul>
                <div class="footer-social">
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
            </div>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="container">
           <p>{{ __('copyright', ['year' => date('Y')]) }}</p>
        </div>
      </div>
    </footer>
