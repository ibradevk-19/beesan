@extends('includes.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">إعدادات الموقع</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">إعدادات الموقع</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @php
            function val($array, $key) {
                return $array[$key] ?? '';
            }
        @endphp

        <div class="card">
            <div class="card-body">

                {{-- العنوان --}}
                <div class="mb-3">
                    <label class="form-label">العنوان (عربي)</label>
                    <input type="text" name="title[ar]" class="form-control" value="{{ val($settings->title, 'ar') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">العنوان (إنجليزي)</label>
                    <input type="text" name="title[en]" class="form-control" value="{{ val($settings->title, 'en') }}">
                </div>

                {{-- الوصف --}}
                <div class="mb-3">
                    <label class="form-label">الوصف (عربي)</label>
                    <textarea name="description[ar]" id="body_ar" class="form-control">{{ val($settings->description, 'ar') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">الوصف (إنجليزي)</label>
                    <textarea name="description[en]" id="body_en" class="form-control">{{ val($settings->description, 'en') }}</textarea>
                </div>

                {{-- OG Meta --}}
                <div class="mb-3">
                    <label class="form-label">OG Title (عربي)</label>
                    <input type="text" name="og_title[ar]" class="form-control" value="{{ val($settings->og_title, 'ar') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">OG Title (إنجليزي)</label>
                    <input type="text" name="og_title[en]" class="form-control" value="{{ val($settings->og_title, 'en') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">OG Description (عربي)</label>
                    <textarea name="og_description[ar]" class="form-control">{{ val($settings->og_description, 'ar') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">OG Description (إنجليزي)</label>
                    <textarea name="og_description[en]" class="form-control">{{ val($settings->og_description, 'en') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">OG Site Name (عربي)</label>
                    <input type="text" name="og_site_name[ar]" class="form-control" value="{{ val($settings->og_site_name, 'ar') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">OG Site Name (إنجليزي)</label>
                    <input type="text" name="og_site_name[en]" class="form-control" value="{{ val($settings->og_site_name, 'en') }}">
                </div>

                {{-- العنوان --}}
                <div class="mb-3">
                    <label class="form-label">العنوان (عربي)</label>
                    <input type="text" name="address[ar]" class="form-control" value="{{ val($settings->address, 'ar') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">العنوان (إنجليزي)</label>
                    <input type="text" name="address[en]" class="form-control" value="{{ val($settings->address, 'en') }}">
                </div>

                {{-- معلومات عامة --}}
                <div class="mb-3">
                    <label class="form-label">رابط الموقع</label>
                    <input type="text" name="site_url" class="form-control" value="{{ $settings->site_url }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">رقم الجوال</label>
                    <input type="text" name="mobile_number" class="form-control" value="{{ $settings->mobile_number }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" value="{{ $settings->email }}">
                </div>

                {{-- السوشيال ميديا --}}
                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook_url" class="form-control" value="{{ $settings->facebook_url }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Twitter</label>
                    <input type="text" name="twitter_url" class="form-control" value="{{ $settings->twitter_url }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="instagram_url" class="form-control" value="{{ $settings->instagram_url }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">TikTok</label>
                    <input type="text" name="tiktok_url" class="form-control" value="{{ $settings->tiktok_url }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telegram</label>
                    <input type="text" name="telegram_url" class="form-control" value="{{ $settings->telegram_url }}">
                </div>

                {{-- الفوتر --}}
                <div class="mb-3">
                    <label class="form-label">نبذة الفوتر (عربي)</label>
                    <textarea name="footer_bio[ar]" class="form-control">{{ val($settings->footer_bio, 'ar') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">نبذة الفوتر (إنجليزي)</label>
                    <textarea name="footer_bio[en]" class="form-control">{{ val($settings->footer_bio, 'en') }}</textarea>
                </div>



                {{-- الصور --}}
                @foreach (['main_logo' => 'الشعار الرئيسي', 'footer_logo' => 'شعار الفوتر', 'bg_logo' => 'شعار الخلفية' , 'projects_image' => ' صورة صفحة المشاريع','services_image'=> 'صورة صفحة الخدمات'] as $field => $label)
                    <div class="mb-3">
                        <label class="form-label">{{ $label }}</label>
                        <input type="file" name="{{ $field }}" class="form-control">
                        @if ($settings->$field)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $settings->$field) }}" style="max-height: 120px;">
                            </div>
                        @endif
                    </div>
                @endforeach
                <div class="mb-3">
                    <label class="form-label">العنوان  صفحة الخدمات (عربي)</label>
                    <input type="text" name="services_title[ar]" class="form-control" value="{{ val($settings->services_title, 'ar') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">العنوان صفحة الخدمات (إنجليزي)</label>
                    <input type="text" name="services_title[en]" class="form-control" value="{{ val($settings->services_title, 'en') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">نبذة صفحة الخدمات (عربي)</label>
                    <textarea name="services_body[ar]" class="form-control">{{ val($settings->services_body, 'ar') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">نبذة صفحة الخدمات (إنجليزي)</label>
                    <textarea name="services_body[en]" class="form-control">{{ val($settings->services_body, 'en') }}</textarea>
                </div>


                <div class="mb-3">
                    <label class="form-label">العنوان  صفحة المشاريع (عربي)</label>
                    <input type="text" name="projects_title[ar]" class="form-control" value="{{ val($settings->projects_title, 'ar') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">العنوان صفحة المشاريع (إنجليزي)</label>
                    <input type="text" name="projects_title[en]" class="form-control" value="{{ val($settings->projects_title, 'en') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">نبذة صفحة المشاريع (عربي)</label>
                    <textarea name="projects_body[ar]" class="form-control">{{ val($settings->projects_body, 'ar') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">نبذة صفحة المشاريع (إنجليزي)</label>
                    <textarea name="projects_body[en]" class="form-control">{{ val($settings->projects_body, 'en') }}</textarea>
                </div>


          
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts.center')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#body_ar')).catch(console.error);
    ClassicEditor.create(document.querySelector('#body_en')).catch(console.error);
</script>
@endsection
