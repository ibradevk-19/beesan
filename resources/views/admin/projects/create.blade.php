@extends('includes.main')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">مشروع جديد</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">إضافة مشروع</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- start form -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- العنوان -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">العنوان (عربي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title[ar]" placeholder="العنوان (عربي)" value="{{ old('title.ar') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">العنوان (إنجليزي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title[en]" placeholder="العنوان (إنجليزي)" value="{{ old('title.en') }}">
                            </div>
                        </div>

                        <!-- الوصف -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الوصف (عربي)</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="body[ar]" id="body_ar" placeholder="الوصف (عربي)">{{ old('body.ar') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الوصف (إنجليزي)</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="body[en]" id="body_en" placeholder="الوصف (إنجليزي)">{{ old('body.en') }}</textarea>
                            </div>
                        </div>

                        <!-- العميل -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">اسم العميل (عربي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="client[ar]" placeholder="اسم العميل (عربي)" value="{{ old('client.ar') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">اسم العميل (إنجليزي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="client[en]" placeholder="اسم العميل (إنجليزي)" value="{{ old('client.en') }}">
                            </div>
                        </div>

                        <!-- التواريخ -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">تاريخ البدء</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">تاريخ الانتهاء</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}">
                            </div>
                        </div>

                        <!-- الصور -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الصورة</label>
                            <div class="col-md-10">
                                <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الصورة الرئيسية</label>
                            <div class="col-md-10">
                                <input type="file" name="main_imge" class="filestyle" data-buttonname="btn-secondary">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">شعار العميل</label>
                            <div class="col-md-10">
                                <input type="file" name="client_logo" class="filestyle" data-buttonname="btn-secondary">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">صور إضافية</label>
                            <div class="col-md-10">
                                <input type="file" name="images[]" class="filestyle" multiple data-buttonname="btn-secondary">
                            </div>
                        </div>

                        <!-- خيارات منطقية -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">يحتوي على صور؟</label>
                            <div class="col-md-10">
                                <input type="checkbox" name="have_images" value="1">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">يحتوي على أخبار؟</label>
                            <div class="col-md-10">
                                <input type="checkbox" name="have_news" value="1">
                            </div>
                        </div>

                        <!-- زر الإرسال -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">إضافة</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts.center')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#body_ar')).catch(console.error);
    ClassicEditor.create(document.querySelector('#body_en')).catch(console.error);
</script>
@endsection
