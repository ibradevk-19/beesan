@extends('includes.main')
@section('content')


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
           <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">عن الجمعية</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"> الرئيسية</a></li>
                        <li class="breadcrumb-item active">عن الجمعية </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
            @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{route('admin.aboutdata.update', ['aboutdata' => $data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الرائيسي (عربي)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي (عربي)" type="text" name="title[ar]" value="{{ $data->title['ar'] }}" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الرائيسي (الانجليزية)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي ( الانجليزية)" type="text" name="title[en]" value="{{ $data->title['en'] }}" id="example-text-input">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="body_ar" class="col-md-2 col-form-label">محتوى الصفحة الرئيسية (عربي)</label>
                        <div class="col-md-10">
                           <textarea name="body[ar]" id="body_ar" class="form-control" rows="500">{{ $data->body['ar'] }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="body_en"class="col-md-2 col-form-label">محتوي الصفحة الرئيسية  (English)</label>
                        <div class="col-md-10">
                           <textarea name="body[en]" id="body_en" class="form-control" rows="500">{{ $data->body['en'] }}</textarea>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">نص الزر  (عربي)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي (عربي)" type="text" name="button[ar]" value="{{ $data->button['ar'] }}" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">نص الزر (الانجليزية)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي ( الانجليزية)" type="text" name="button[en]" value="{{ $data->button['en'] }}" id="example-text-input">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="vision_ar" class="col-md-2 col-form-label">محتوى رؤيتنا (عربي)</label>
                        <div class="col-md-10">
                           <textarea name="vision[ar]" id="vision_ar" class="form-control" rows="500">{{ $data->vision['ar'] ?? ' ' }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="vision_en"class="col-md-2 col-form-label">محتوي رؤيتنا   (English)</label>
                        <div class="col-md-10">
                           <textarea name="vision[en]" id="vision_en" class="form-control" rows="500">{{ $data->vision['en'] ?? '' }}</textarea>
                        </div>
                    </div>



                    <div class="mb-3 row">
                        <label for="message_ar" class="col-md-2 col-form-label">محتوى رسالتنا (عربي)</label>
                        <div class="col-md-10">
                           <textarea name="message[ar]" id="message_ar" class="form-control" rows="500">{{ $data->message['ar'] ?? ' ' }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="vision_en"class="col-md-2 col-form-label">محتوي رسالتنا   (English)</label>
                        <div class="col-md-10">
                           <textarea name="message[en]" id="message_en" class="form-control" rows="500">{{ $data->message['en'] ?? '' }}</textarea>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الصورة الرائيسية</label>

                        <div class="col-md-10">

                            <input type="file" class="filestyle" onchange="showImage('image','image_thumbnail')" data-buttonname="btn-secondary" name="image" id="image"
                                   data-buttonBefore="true"
                                   value="{{ (old('image')) ? old('image') : '' }}"
                                   data-placeholder="لم يتم اختيار صورة بعد"
                                   id="image" data-text="تصفح..">
                        </div>
                    </div>


                    <div class="" hidden  id="image_thumbnail_show"  style="margin-right: 168px">
                        <img id="image_thumbnail" class="image_thumbnail" alt="200x200" style="width: 200px; height: 200px;"
                            src="" data-holder-rendered="true">
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الصورة - رسالتنا</label>

                        <div class="col-md-10">

                            <input type="file" class="filestyle"  data-buttonname="btn-secondary" name="message_image" id="message_image"
                                   data-buttonBefore="true"
                                   value="{{ (old('message_image')) ? old('message_image') : '' }}"
                                   data-placeholder="لم يتم اختيار صورة بعد"
                                   id="message_image" data-text="تصفح..">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الصورة - رؤيتنا</label>

                        <div class="col-md-10">

                            <input type="file" class="filestyle"  data-buttonname="btn-secondary" name="vision_image" id="vision_image"
                                   data-buttonBefore="true"
                                   value="{{ (old('vision_image')) ? old('vision_image') : '' }}"
                                   data-placeholder="لم يتم اختيار صورة بعد"
                                   id="vision_image" data-text="تصفح..">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الصورة - Cover</label>

                        <div class="col-md-10">

                            <input type="file" class="filestyle"  data-buttonname="btn-secondary" name="cover_image" id="cover_image"
                                   data-buttonBefore="true"
                                   value="{{ (old('cover_image')) ? old('cover_image') : '' }}"
                                   data-placeholder="لم يتم اختيار صورة بعد"
                                   id="cover_image" data-text="تصفح..">
                        </div>
                    </div>
                    <hr>
<h4 class="mb-3">قسم التاريخ (history_section)</h4>
<div id="history-section-wrapper">
    @foreach ($data->history_section ?? [['title' => ['ar' => '', 'en' => ''], 'description' => ['ar' => '', 'en' => '']]] as $index => $history)
        <div class="card p-3 mb-3 border" data-index="{{ $index }}">
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>العنوان (عربي)</label>
                    <input type="text" name="history_section[{{ $index }}][title][ar]" class="form-control" value="{{ $history['title']['ar'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label>العنوان (إنجليزي)</label>
                    <input type="text" name="history_section[{{ $index }}][title][en]" class="form-control" value="{{ $history['title']['en'] ?? '' }}">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>الوصف (عربي)</label>
                    <textarea name="history_section[{{ $index }}][description][ar]" class="form-control">{{ $history['description']['ar'] ?? '' }}</textarea>
                </div>
                <div class="col-md-6">
                    <label>الوصف (إنجليزي)</label>
                    <textarea name="history_section[{{ $index }}][description][en]" class="form-control">{{ $history['description']['en'] ?? '' }}</textarea>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-history-item">حذف</button>
        </div>
    @endforeach
</div>
<button type="button" id="add-history-item" class="btn btn-outline-secondary mb-4">إضافة تاريخ جديد</button>


<hr>
<h4 class="mb-3">فريق العمل (team_section)</h4>
<div id="team-section-wrapper">
    
    @foreach ($data->team_section ?? [['image' => '', 'name' => ['ar' => '', 'en' => ''], 'position' => ['ar' => '', 'en' => ''], 'bio' => ['ar' => '', 'en' => '']]] as $index => $team)
        <div class="card p-3 mb-3 border" data-index="{{ $index }}">
            <div class="row mb-2">
                <div class="col-md-12">
                    <label>صورة العضو</label>
                    <input type="file" name="team_section[{{ $index }}][image]" class="form-control"
                        onchange="previewImage(this, 'team-preview-{{ $index }}')">
                    <img id="team-preview-{{ $index }}" style="max-width: 150px; margin-top:10px;"
                         src="{{ $team['image'] ? asset('storage/' . $team['image']) : '' }}">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>الاسم (عربي)</label>
                    <input type="text" name="team_section[{{ $index }}][name][ar]" class="form-control" value="{{ $team['name']['ar'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label>الاسم (إنجليزي)</label>
                    <input type="text" name="team_section[{{ $index }}][name][en]" class="form-control" value="{{ $team['name']['en'] ?? '' }}">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>الوظيفة (عربي)</label>
                    <input type="text" name="team_section[{{ $index }}][position][ar]" class="form-control" value="{{ $team['position']['ar'] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label>الوظيفة (إنجليزي)</label>
                    <input type="text" name="team_section[{{ $index }}][position][en]" class="form-control" value="{{ $team['position']['en'] ?? '' }}">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>السيرة الذاتية (عربي)</label>
                    <textarea name="team_section[{{ $index }}][bio][ar]" class="form-control">{{ $team['bio']['ar'] ?? '' }}</textarea>
                </div>
                <div class="col-md-6">
                    <label>السيرة الذاتية (إنجليزي)</label>
                    <textarea name="team_section[{{ $index }}][bio][en]" class="form-control">{{ $team['bio']['en'] ?? '' }}</textarea>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-team-item">حذف</button>
        </div>
    @endforeach
</div>
<button type="button" id="add-team-item" class="btn btn-outline-secondary">إضافة عضو جديد</button>

                    <input type="hidden" name="id" value="{{$data->id}}" id="">
                    <div class="col-12">
                        <button type="submit"  class="btn btn-primary">تعديل</button>
                    </div>
                </form>
                </div>
            </div>

        </div> <!-- end col -->



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
let historyIndex = {{ count($data->history_section ?? []) }};
let teamIndex = {{ count($data->team_section ?? []) }};

$('#add-history-item').click(function () {
    $('#history-section-wrapper').append(`
        <div class="card p-3 mb-3 border" data-index="${historyIndex}">
            <div class="row mb-2">
                <div class="col-md-6"><label>العنوان (عربي)</label><input type="text" name="history_section[${historyIndex}][title][ar]" class="form-control"></div>
                <div class="col-md-6"><label>العنوان (إنجليزي)</label><input type="text" name="history_section[${historyIndex}][title][en]" class="form-control"></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><label>الوصف (عربي)</label><textarea name="history_section[${historyIndex}][description][ar]" class="form-control"></textarea></div>
                <div class="col-md-6"><label>الوصف (إنجليزي)</label><textarea name="history_section[${historyIndex}][description][en]" class="form-control"></textarea></div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-history-item">حذف</button>
        </div>
    `);
    historyIndex++;
});

$('#history-section-wrapper').on('click', '.remove-history-item', function () {
    $(this).closest('.card').remove();
});


$('#add-team-item').click(function () {
    $('#team-section-wrapper').append(`
        <div class="card p-3 mb-3 border" data-index="${teamIndex}">
            <div class="row mb-2">
                <div class="col-md-12">
                    <label>صورة العضو</label>
                    <input type="file" name="team_section[${teamIndex}][image]" class="form-control" onchange="previewImage(this, 'team-preview-${teamIndex}')">
                    <img id="team-preview-${teamIndex}" style="max-width: 150px; margin-top:10px;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><label>الاسم (عربي)</label><input type="text" name="team_section[${teamIndex}][name][ar]" class="form-control"></div>
                <div class="col-md-6"><label>الاسم (إنجليزي)</label><input type="text" name="team_section[${teamIndex}][name][en]" class="form-control"></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><label>الوظيفة (عربي)</label><input type="text" name="team_section[${teamIndex}][position][ar]" class="form-control"></div>
                <div class="col-md-6"><label>الوظيفة (إنجليزي)</label><input type="text" name="team_section[${teamIndex}][position][en]" class="form-control"></div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6"><label>السيرة الذاتية (عربي)</label><textarea name="team_section[${teamIndex}][bio][ar]" class="form-control"></textarea></div>
                <div class="col-md-6"><label>السيرة الذاتية (إنجليزي)</label><textarea name="team_section[${teamIndex}][bio][en]" class="form-control"></textarea></div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-team-item">حذف</button>
        </div>
    `);
    teamIndex++;
});

$('#team-section-wrapper').on('click', '.remove-team-item', function () {
    $(this).closest('.card').remove();
});

function previewImage(input, targetId) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById(targetId).src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>

<script>
      ClassicEditor
        .create(document.querySelector('#vision_ar'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#vision_en'))
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#message_ar'))
        .catch(error => {
            console.error(error);
        });
        ClassicEditor
        .create(document.querySelector('#message_en'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body_ar'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#body_en'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    function showImage(id_input,id_show_image = 'show_image'){

document.getElementById(id_show_image+'_show').hidden = false;

const imagefile = document.querySelector('#'+id_input);

console.log( imagefile.files[0]);
var reader = new FileReader();
reader.onload = function(e) {
$('#'+id_show_image).attr('src', e.target.result);
};

reader.readAsDataURL(imagefile.files[0]);
}
</script>
@endsection
