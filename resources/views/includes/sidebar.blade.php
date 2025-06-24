<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">القائمة</li>
                <li>
                    <a href="{{route('home')}}" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>الصفحة الرئيسية</span>
                    </a>
                </li>
                @if(checkSuperAdmin())
                <li>
                    <a href="{{route('admin.index')}}" class=" waves-effect">
                        <i class="fas fa-user-check"></i>
                        <span>المسؤولين</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('roles.index')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>الأذونات</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{route('admin.site-settings.edit')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>اعدادات الموقع</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.aboutdata.edit')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>اعدادات صفحة عن الجمعية</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('categories.index')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>التصنيفات   </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('clients.index')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>الشركاء   </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('hero-slide.index')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>السلايدر الرئيسية   </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('articles.index')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>  المقالات  </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('services.index')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>  الخدمات  </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('projects.index')}}" class=" waves-effect">
                        <i class="fas fa-signature"></i>
                        <span>  المشاريع  </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
