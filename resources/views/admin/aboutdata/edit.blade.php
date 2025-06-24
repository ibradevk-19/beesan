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
