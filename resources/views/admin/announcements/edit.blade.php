@extends('includes.main')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">تعديل الإعلان</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">تعديل إعلان</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- الحالة --}}
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الحالة</label>
                            <div class="col-md-10">
                                <select name="status" class="form-select">
                                    <option value="inactive" {{ $announcement->status == 'inactive' ? 'selected' : '' }}>مسودة</option>
                                    <option value="active" {{ $announcement->status == 'active' ? 'selected' : '' }}>تم النشر</option>
                                </select>
                            </div>
                        </div>

                        {{-- تاريخ الانتهاء --}}
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">تاريخ الانتهاء</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="expiry_date" value="{{ $announcement->expiry_date }}">
                            </div>
                        </div>

                        {{-- العنوان --}}
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">العنوان (عربي)</label>
                            <div class="col-md-10">
                                <input type="text" name="title[ar]" class="form-control" value="{{ $announcement->title['ar'] ?? '' }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">العنوان (الإنجليزية)</label>
                            <div class="col-md-10">
                                <input type="text" name="title[en]" class="form-control" value="{{ $announcement->title['en'] ?? '' }}">
                            </div>
                        </div>

                        {{-- المحتوى --}}
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">المحتوى (عربي)</label>
                            <div class="col-md-10">
                                <textarea name="description[ar]" id="description_ar" class="form-control">{{ $announcement->description['ar'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">المحتوى (الإنجليزية)</label>
                            <div class="col-md-10">
                                <textarea name="description[en]" id="description_en" class="form-control">{{ $announcement->description['en'] ?? '' }}</textarea>
                            </div>
                        </div>


                        @if ($announcement->image)
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">الصورة الحالية</label>
                                <div class="col-md-10">
                                    <img src="{{ asset('storage/' . $announcement->image) }}" class="img-thumbnail" width="200">
                                </div>
                            </div>
                        @endif


                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">تحديث الصورة</label>
                            <div class="col-md-10">
                                <input type="file" name="image" class="filestyle" data-buttonname="btn-secondary" data-text="تصفح..">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">الرابط الخارجي</label>
                            <div class="col-md-10">
                                <input type="text" name="external_link" class="form-control" value="{{ $announcement->external_link }}">
                            </div>
                        </div>


                        @if($announcement->attachments->count())
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">المرفقات الحالية</label>
                                <div class="col-md-10">
                                    <ul>
                                        @foreach ($announcement->attachments as $attachment)
                                            <li class="d-flex justify-content-between align-items-center mb-2">
                                                <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">
                                                    📎 {{ $attachment->file_name }}
                                                </a>

                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteAttachment({{ $attachment->id }}, this)">حذف</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif


                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">إضافة مرفقات</label>
                            <div class="col-md-10">
                                <input type="file" name="attachments[]" class="filestyle" multiple data-buttonname="btn-secondary" data-text="تصفح..">
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">تحديث</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts.center')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/jquery-time-picker.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description_ar'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#description_en'))
            .catch(error => {
                console.error(error);
            });

    </script>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            console.log('تم الإرسال');
        });
    </script>
    <script>
        function deleteAttachment(id, btn) {
            if (!confirm('هل أنت متأكد من حذف المرفق؟')) return;

            fetch(`/panel/attachments/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({
                    _method: 'DELETE'
                })
            })
                .then(response => {
                    if (!response.ok) throw new Error('فشل الحذف');
                    // حذف العنصر من الصفحة
                    const li = btn.closest('li');
                    if (li) li.remove();
                })
                .catch(error => {
                    alert('حدث خطأ أثناء الحذف');
                    console.error(error);
                });
        }
    </script>



@endsection
