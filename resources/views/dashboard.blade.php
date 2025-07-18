<!doctype html>
<html lang="en" dir="rtl" >
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title> | جمعية بيسان الخيرية
        Bisan Charity Association</title>
    <!-- CSS files -->
    <link href="{{ asset('frontend/dist/css/tabler.rtl.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('frontend/dist/css/tabler-flags.rtl.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('frontend/dist/css/tabler-payments.rtl.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('frontend/dist/css/tabler-vendors.rtl.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('frontend/dist/css/demo.rtl.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="http://www.fontstatic.com/f=jazeera,jazeera-light" rel="stylesheet">

    <style>

      @import url('http://www.fontstatic.com/f=jazeera,jazeera-light');
      :root {
      	font-family: 'jazeera-light';
      }
      body * {
        font-family: 'jazeera-light';
      }
    </style>
  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">

          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <img src="{{ asset('/frontend/assets/logo.svg') }}" width="110" height="32" alt="جمعية بيسان الخيرية" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
              <div class="btn-list">


              </div>
            </div>
            <div class="d-none d-md-flex">


            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./dist/img/menu-2.png)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>{{ Auth::user()->name }}    </div>
                  <div class="mt-1 small text-secondary">{{ Auth::user()->id_number }}</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="" class="dropdown-item">تغير كلمة المرور</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">تسجيل الخروج</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="page-wrapper">
        <!-- Page header -->

        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">

              <div class="col-12">
                <div class="card card-md">
                  <div class="card-stamp card-stamp-lg">

                  </div>
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-10">
                        <h3 class="h1">إرشادات</h3>
                        <div class="markdown text-secondary">
                          <!-- <div class="alert alert-success">
                              اضافة معلومات الابناء <a href="#" class="alert-link">اضغط هنا </a>!
                          </div> -->
                          <div class="alert alert-success">
                            تعديل البيانات — <a href="{{ route('dashboard.user.index') }}" class="alert-link">اضغط هنا</a>!
                          </div>
                          <!-- <div class="alert alert-success">
                            تعديل المندوب — <a href="#" class="alert-link">اضغط هنا</a>!
                          </div> -->
                        </div>
                        <!-- <div class="mt-3">
                          <a href="" class="btn btn-primary" target="_blank" rel="noopener">اضافة الأبناء</a>
                          <a href="" class="btn btn-primary" target="_blank" rel="noopener">اضافة الأبناء</a>
                          <a href="" class="btn btn-primary" target="_blank" rel="noopener">اضافة الأبناء</a>
                        </div> -->

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">دورة المساعدات </h3>
                  </div>

                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>نوع المساعدة</th>
                            <th>التاريخ </th>
                            <th>المندوب</th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse ($beneficial->deliveryRecordBeneficials as $item)
                        <tr>
                            <td>£</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->product->name ?? 'No product available' }}</td>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>{{ $beneficial->actor->name ?? 'No actor available' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">لم يتم العثور على سجلات التسليم</td>
                        </tr>
                    @endforelse

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">

                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    <a href="https//beesan.org" class="link-secondary"> Saudi Center for Culture and Heritage</a>
                  </li>
                  <li class="list-inline-item">
                    <a href="https//beesan.org" class="link-secondary" rel="noopener">
                      v1.0.0
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <!-- Tabler Core -->
    <script src="{{ asset('frontend/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('frontend/dist/js/demo.min.js?1692870487') }}" defer></script>

  </body>
</html>
