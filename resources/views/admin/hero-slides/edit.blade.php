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
                        <li class="breadcrumb-item active">سلايدر </li>
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
                    <form action=" {{route('hero-slide.update', ['hero_slide' => $obj->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الرائيسي (عربي)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي (عربي)" type="text" value="{{$obj->title_ar}}" name="title_ar" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الرائيسي (الانجليزية)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الرائيسي ( الانجليزية)" type="text"  value="{{$obj->title_en}}" name="title_en" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الفرعي (عربي)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الفرعي (عربي)" type="text"  value="{{$obj->sub_title_en}}" name="sub_title_ar" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الفرعي (الانجليزية)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الفرعي ( الانجليزية)" type="text"  value="{{$obj->sub_title_en}}" name="sub_title_en" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">زر التوجيه</label>
                        <div class="col-md-10">
                            <select name="have_but" class="form-select">
                                <option value="1"{{$obj->have_but == '1' ? 'selected' : ''}} >يوجد</option>
                                <option value="0" {{$obj->have_but == '0' ? 'selected' : ''}}>لا يوجد  </option>
                            </select>
                        </div>
                        <input type="hidden" value="{{null}}" name="id">
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الزر (عربي)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الزر (عربي)" type="text" value="{{$obj->but_title_ar}}" name="but_title_ar" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان الزر (الانجليزية)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان الزر ( الانجليزية)" type="text" value="{{$obj->but_title_en}}" name="but_title_en" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الرابط</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="الرابط " type="text" value="{{$obj->url}}" name="url" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">الحالة</label>
                        <div class="col-md-10">
                            <select name="status" class="form-select">

                                <option value="1"{{$obj->status == '1' ? 'selected' : ''}} >فعّال</option>
                                <option value="0" {{$obj->status == '0' ? 'selected' : ''}}>غير فعّال</option>
                            </select>
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
                    <div class=""  id="image_thumbnail_show"  style="margin-right: 168px">
                        <img id="image_thumbnail" class="image_thumbnail" alt="200x200" style="width: 200px; height: 200px;"
                            src="{{$obj->image}}" data-holder-rendered="true">
                    </div>

                    <input type="hidden" name="id" value="{{$obj->id}}" id="">
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
