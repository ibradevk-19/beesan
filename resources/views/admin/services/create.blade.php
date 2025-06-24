@extends('includes.main')
@section('content')


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">سلايدر جديد</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"> الرئيسية</a></li>
                        <li class="breadcrumb-item active">شريك جديد</li>
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
                    <form action=" {{route('services.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                 
                   <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الرائيسي (عربي)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي (عربي)" type="text" name="title[ar]" value="{{ old('title.ar') }}" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الرائيسي (الانجليزية)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي ( الانجليزية)" type="text" name="title[en]" value="{{ old('title.en') }}" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">وصف   (عربي)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="وصف  (عربي)" type="text" name="body[ar]"  id="body_ar"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">وصف  (الانجليزية)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="وصف  (الانجليزية)" type="text" name="body[en]"  id="body_en"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الصورة</label>

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
                    <div class="col-12">
                        <button type="submit"  class="btn btn-primary disabled_button_click">إضافة</button>
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
