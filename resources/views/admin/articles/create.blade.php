@extends('includes.main')



@section('content')


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">مقال جديد</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"> الرئيسية</a></li>
                        <li class="breadcrumb-item active">مقال جديد</li>
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
                    <form action=" {{route('articles.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                   <div class="mb-3 row">
                        <label class="col-md-2 col-form-label"> النوع </label>
                        <div class="col-md-10">
                            <select name="type" class="form-select">
                                <option {{old('type')=='article' ? 'selected' : ''}} value="1">مقال</option>
                                <option  {{old('type')=='gallery' ? 'selected' : ''}} value="0">معرض صور  </option>
                                <option  {{old('type')=='video' ? 'selected' : ''}} value="0">مقال فيديو   </option>
                            </select>
                        </div>
                        <input type="hidden" value="{{null}}" name="id">
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">الحالة</label>
                        <div class="col-md-10">
                            <select name="status" class="form-select">

                                <option {{old('status')=='draft' ? 'selected' : ''}} value="draft">مسودة </option>
                                <option  {{old('status')=='published' ? 'selected' : ''}} value="published"> تم النشر</option>
                                <option  {{old('status')=='archived' ? 'selected' : ''}} value="archived">مؤرشف</option>
                            </select>
                        </div>
                        <input type="hidden" value="{{null}}" name="id">
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">التصنيف</label>
                        <div class="col-md-10">
                            <select name="category_id" class="form-select">
                               <option value="">اختر </option>

                                @foreach($categories as $item)
                                  <option value="{{ $item->id }}">{{ $item->name['ar'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value="{{null}}" name="id">
                    </div>
                    
                    <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">تاريخ النشر </label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="published_at" value="{{ old('published_at') }}">
                            </div>
                     </div>

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
                        <label class="col-md-2 col-form-label"> مميزة </label>
                        <div class="col-md-10">
                            <select name="is_featured" class="form-select">
                                <option {{old('is_featured')=='1' ? 'selected' : ''}} value="1">نعم</option>
                                <option  {{old('is_featured')=='0' ? 'selected' : ''}} value="0">لا  </option>
                            </select>
                        </div>
                        <input type="hidden" value="{{null}}" name="id">
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="body_ar" class="col-md-2 col-form-label">محتوى المقال (عربي)</label>
                        <div class="col-md-10">
                           <textarea name="body[ar]" id="body_ar" class="form-control" rows="500">{{ old('body.ar') }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="body_en"class="col-md-2 col-form-label">Article Content (English)</label>
                        <div class="col-md-10">
                           <textarea name="body[en]" id="body_en" class="form-control" rows="500">{{ old('body.en') }}</textarea> 
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
                        <label for="example-text-input" class="col-md-2 col-form-label">رابط الفيديو</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="رابط الفيديو" type="text" name="video_url" value="{{ old('video_url') }}" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان SEO (عربي)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان SEO (عربي)" type="text" name="meta_title[ar]" value="{{ old('meta_title.ar') }}" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">العنوان SEO (الانجليزية)</label>
                        <div class="col-md-10">
                            <input class="form-control" placeholder="العنوان SEO (الانجليزية)" type="text" name="meta_title[en]" value="{{ old('meta_title.en') }}" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">وصف  SEO (عربي)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="وصف SEO (عربي)" type="text" name="meta_description[ar]" value="{{ old('meta_description.ar') }}" id="example-text-input"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">وصف SEO (الانجليزية)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="وصف SEO (الانجليزية)" type="text" name="meta_description[en]" value="{{ old('meta_description.en') }}" id="example-text-input"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الكلمات المفتاحية   (عربي)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="الكلمات المفتاحية (عربي)" type="text" name="meta_keywords[ar]" value="{{ old('meta_keywords.ar') }}" id="example-text-input"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">الكلمات المفتاحية (الانجليزية)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="الكلمات المفتاحية (الانجليزية)" type="text" name="meta_keywords[en]" value="{{ old('meta_keywords.en') }}" id="example-text-input"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label"> الصور</label>

                        <div class="col-md-10">

                        <input type="file" 
                                class="filestyle"  
                                data-buttonname="btn-secondary"
                                name="images[]"
                                id="images"
                                multiple
                                data-buttonBefore="true"
                                data-placeholder="لم يتم اختيار صورة بعد"
                                data-text="تصفح..">
                        </div>
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
