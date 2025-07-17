<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(10); // عرض 10 تقارير مع التصفح
        return view('admin.reports.index', compact('reports'));
    }
    public function create(){
        return view('admin.reports.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|array',
            'title.ar' => 'required|string',
            'title.en' => 'required|string',
            'body' => 'required|array',
            'body.ar' => 'required|string',
            'body.en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'date' => 'required|date',
            'tag' => 'required|in:y_reports,fin_reports,pre_reports',
        ]);

        // رفع الملفات
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('reports/images', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('reports/files', 'public');
        }

        Report::create($validated);

        return redirect()->route('reports.index')->with('success', 'تم حفظ التقرير بنجاح.');
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $data = $request->validate([
            'title' => 'required|array',
            'title.ar' => 'required|string',
            'title.en' => 'required|string',

            'body' => 'required|array',
            'body.ar' => 'required|string',
            'body.en' => 'required|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file'  => 'nullable|mimes:pdf,doc,docx|max:10240',

            'date' => 'required|date',
            'tag'  => 'required|in:y_reports,fin_reports,pre_reports',
        ]);

        // ✅ تحديث الصورة إن وُجدت
        if ($request->hasFile('image')) {
            if ($report->image && Storage::disk('public')->exists($report->image)) {
                Storage::disk('public')->delete($report->image);
            }

            $data['image'] = $request->file('image')->store('reports/images', 'public');
        }

        // ✅ تحديث الملف إن وُجد
        if ($request->hasFile('file')) {
            if ($report->file && Storage::disk('public')->exists($report->file)) {
                Storage::disk('public')->delete($report->file);
            }

            $data['file'] = $request->file('file')->store('reports/files', 'public');
        }

        // ✅ التحديث النهائي
        $report->update($data);

        return redirect()->route('reports.index')->with('success', 'تم تعديل التقرير بنجاح');
    }

    public function destroy(Report $report)
    {
        // حذف الصورة من التخزين إن وُجدت
        if ($report->image && Storage::disk('public')->exists($report->image)) {
            Storage::disk('public')->delete($report->image);
        }

        // حذف الملف من التخزين إن وُجد
        if ($report->file && Storage::disk('public')->exists($report->file)) {
            Storage::disk('public')->delete($report->file);
        }

        // حذف السجل من قاعدة البيانات
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'تم حذف التقرير بنجاح');
    }


}
