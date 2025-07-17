@extends('includes.main')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12 mb-4">
            <h4 class="mb-0">قائمة التقارير</h4>
            <a href="{{ route('reports.create') }}" class="btn btn-success mt-2">+ إضافة تقرير جديد</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($reports->count())
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>عنوان التقرير</th>
                                <th>تاريخ التقرير</th>
                                <th>نوع التقرير</th>
                                <th>الصورة</th>
                                <th>الملف</th>
                                <th>الخيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $index => $report)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $report->title['ar'] ?? '-' }}</td>
                                    <td>{{ $report->date }}</td>
                                    <td>
                                        @switch($report->tag)
                                            @case('y_reports') تقارير سنوية @break
                                            @case('fin_reports') تقارير مالية @break
                                            @case('pre_reports') تقارير مشاريع @break
                                            @default - 
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($report->image)
                                            <img src="{{ asset('storage/' . $report->image) }}" width="60">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($report->file)
                                            <a href="{{ asset('storage/' . $report->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">عرض / تحميل</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $reports->links() }}
            @else
                <p class="text-center">لا توجد تقارير بعد.</p>
            @endif
        </div>
    </div>

</div>

@endsection
