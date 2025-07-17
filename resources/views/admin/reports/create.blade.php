@extends('includes.main')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">إضافة تقرير جديد</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">إضافة تقرير</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- العنوان --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">عنوان التقرير (عربي)</label>
            <div class="col-md-10">
                <input type="text" name="title[ar]" class="form-control" placeholder="عنوان التقرير باللغة العربية">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">عنوان التقرير (إنجليزي)</label>
            <div class="col-md-10">
                <input type="text" name="title[en]" class="form-control" placeholder="Report title in English">
            </div>
        </div>

        {{-- محتوى التقرير --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">محتوى التقرير (عربي)</label>
            <div class="col-md-10">
                <textarea name="body[ar]" class="form-control" rows="5" placeholder="محتوى التقرير باللغة العربية"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Report Body (English)</label>
            <div class="col-md-10">
                <textarea name="body[en]" class="form-control" rows="5" placeholder="Report body in English"></textarea>
            </div>
        </div>

        {{-- الصورة --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">صورة التقرير</label>
            <div class="col-md-10">
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        {{-- ملف التقرير --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">ملف التقرير</label>
            <div class="col-md-10">
                <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
            </div>
        </div>

        {{-- التاريخ --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">تاريخ التقرير</label>
            <div class="col-md-10">
                <input type="date" name="date" class="form-control">
            </div>
        </div>

        {{-- التصنيف --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">نوع التقرير</label>
            <div class="col-md-10">
                <select name="tag" class="form-select">
                    <option value="y_reports">تقارير سنوية</option>
                    <option value="fin_reports">تقارير مالية</option>
                    <option value="pre_reports">تقارير المشاريع</option>
                </select>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">حفظ التقرير</button>
        </div>
    </form>
</div>

@endsection
