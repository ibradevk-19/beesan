@extends('includes.main')
@section('content')

<div class="container-fluid">
    <h4 class="mb-4">تعديل التقرير</h4>

    <form action="{{ route('reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- العنوان --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">عنوان التقرير (عربي)</label>
            <div class="col-md-10">
                <input type="text" name="title[ar]" class="form-control" value="{{ $report->title['ar'] ?? '' }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">عنوان التقرير (إنجليزي)</label>
            <div class="col-md-10">
                <input type="text" name="title[en]" class="form-control" value="{{ $report->title['en'] ?? '' }}">
            </div>
        </div>

        {{-- المحتوى --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">محتوى التقرير (عربي)</label>
            <div class="col-md-10">
                <textarea name="body[ar]" class="form-control" rows="4">{{ $report->body['ar'] ?? '' }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Report Body (English)</label>
            <div class="col-md-10">
                <textarea name="body[en]" class="form-control" rows="4">{{ $report->body['en'] ?? '' }}</textarea>
            </div>
        </div>

        {{-- الصورة --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">صورة التقرير</label>
            <div class="col-md-10">
                @if($report->image)
                    <img src="{{ asset('storage/' . $report->image) }}" width="100" class="mb-2">
                @endif
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        {{-- الملف --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">ملف التقرير</label>
            <div class="col-md-10">
                @if($report->file)
                    <a href="{{ asset('storage/' . $report->file) }}" class="btn btn-sm btn-primary mb-2" target="_blank">عرض الملف الحالي</a>
                @endif
                <input type="file" name="file" class="form-control">
            </div>
        </div>

        {{-- التاريخ --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">تاريخ التقرير</label>
            <div class="col-md-10">
                <input type="date" name="date" class="form-control" value="{{ $report->date }}">
            </div>
        </div>

        {{-- التصنيف --}}
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">نوع التقرير</label>
            <div class="col-md-10">
                <select name="tag" class="form-select">
                    <option value="y_reports" {{ $report->tag === 'y_reports' ? 'selected' : '' }}>تقارير سنوية</option>
                    <option value="fin_reports" {{ $report->tag === 'fin_reports' ? 'selected' : '' }}>تقارير مالية</option>
                    <option value="pre_reports" {{ $report->tag === 'pre_reports' ? 'selected' : '' }}>تقارير مشاريع</option>
                </select>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">تحديث التقرير</button>
        </div>
    </form>
</div>

@endsection
