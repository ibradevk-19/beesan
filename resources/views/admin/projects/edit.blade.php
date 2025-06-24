@extends('includes.main')
@section('content')

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">تعديل المشروع</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">تعديل مشروع</li>
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
                    <form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- العنوان -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">العنوان (عربي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title[ar]" value="{{ old('title.ar', $project->title['ar'] ?? '') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">العنوان (إنجليزي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title[en]" value="{{ old('title.en', $project->title['en'] ?? '') }}">
                            </div>
                        </div>

                        <!-- الوصف -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الوصف (عربي)</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="body[ar]" id="body_ar">{{ old('body.ar', $project->body['ar'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الوصف (إنجليزي)</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="body[en]" id="body_en">{{ old('body.en', $project->body['en'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- العميل -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">اسم العميل (عربي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="client[ar]" value="{{ old('client.ar', $project->client['ar'] ?? '') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">اسم العميل (إنجليزي)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="client[en]" value="{{ old('client.en', $project->client['en'] ?? '') }}">
                            </div>
                        </div>

                        <!-- التواريخ -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">تاريخ البدء</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $project->start_date) }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">تاريخ الانتهاء</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date', $project->end_date) }}">
                            </div>
                        </div>

                        <!-- الصور -->
                        @foreach (['image' => 'الصورة', 'main_imge' => 'الصورة الرئيسية', 'client_logo' => 'شعار العميل'] as $key => $label)
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">{{ $label }}</label>
                            <div class="col-md-10">
                                <input type="file" name="{{ $key }}" class="filestyle" data-buttonname="btn-secondary">
                                @if ($project->$key)
                                    <img src="{{ asset('storage/' . $project->$key) }}" width="100" class="mt-2" alt="Current {{ $label }}">
                                @endif
                            </div>
                        </div>
                        @endforeach

                        <!-- الصور الإضافية -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">صور إضافية</label>
                            <div class="col-md-10">
                                <input type="file" name="images[]" multiple class="filestyle" data-buttonname="btn-secondary">
                                @if (is_array($project->images))
                                    <div class="mt-2">
                                        @foreach ($project->images as $img)
                                            <img src="{{ asset('storage/' . $img) }}" width="100" class="me-2 mb-2">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- الخيارات المنطقية -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">يحتوي على صور؟</label>
                            <div class="col-md-10">
                                <input type="checkbox" name="have_images" value="1" {{ old('have_images', $project->have_images) ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">يحتوي على أخبار؟</label>
                            <div class="col-md-10">
                                <input type="checkbox" name="have_news" value="1" {{ old('have_news', $project->have_news) ? 'checked' : '' }}>
                            </div>
                        </div>

                        <!-- زر الحفظ -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">تحديث</button>
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
