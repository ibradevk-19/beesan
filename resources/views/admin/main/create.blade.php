@extends('includes.main')
@section('style')

<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
      </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">مستفيد جديد</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"> الرئيسية</a></li>
                        <li class="breadcrumb-item active">مستفيد جديد </li>
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
                    <form action=" {{route('admin.main.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="full_name" class="form-label">اسم المعيل رباعي </label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                            </div>
                            <div class="col-md-3">
                                <label for="id_num" class="form-label">رقم هوية المعيل </label>
                                <input type="number" min="100000000" min="999999999" class="form-control" id="id_num" name="id_num" required>

                                    <a href="javascript:void(0)" class=" btn btn-primary waves-effect waves-light btn-sm " onclick="checkIdNumber()">
                                    <i class=" ri-eye-line align-middle me-2"></i>
                                        فحص
                                    </a>


                            </div>

                            <div class="col-md-3">
                                <label for="wife_name" class="form-label">اسم الزوجة </label>
                                <input type="text" class="form-control" id="wife_name" name="wife_name" >
                            </div>
                            <div class="col-md-3">
                                <label for="wife_id_num" class="form-label">رقم هوية الزوجة</label>
                                <input type="number" class="form-control" id="wife_id_num" name="wife_id_num" >
                                <a href="javascript:void(0)" class=" btn btn-primary waves-effect waves-light btn-sm " onclick="checkIdNumberwife()">
                                    <i class=" ri-eye-line align-middle me-2"></i>
                                        فحص
                                    </a>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3">
                                <label for="marital_status" class="form-label">الحالة الاجتماعية</label>
                                <select class="form-select" id="marital_status" name="marital_status" required>
                                    <option value="" disabled selected>اختر الحالة الاجتماعية</option>
                                    <option value="single">أعزب</option>
                                    <option value="married">متزوج</option>
                                    <option value="divorced">مطلق</option>
                                    <option value="widowed">أرمل</option>
                                    <option value="breadwinner">بلا معيل</option>
                                    <option value="suspended">معلقة</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="mobile" class="form-label">رقم الجوال</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="col-md-3">
                                <label for="family_count" class="form-label">عدد افراد  </label>
                                <input type="number" class="form-control" id="family_count" name="family_count" required>
                            </div>
                            <div class="col-md-3">
                                <label for="mobile" class="form-label">عدد الذكور </label>
                                <input type="number" class="form-control" id="male_count" name="male_count" required>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md-3">
                                <label for="female_count" class="form-label"> عدد الاناث </label>
                                <input type="number" class="form-control" id="female_count" name="female_count" required>
                            </div>

                            <div class="col-md-3">
                                <label for="children_under_2" class="form-label">عدد الاطفال اقل من سنتين</label>
                                <input type="number" class="form-control" id="children_under_2" name="children_under_2" required>
                            </div>

                            <div class="col-md-3">
                                <label for="children_under_3" class="form-label">عدد اطفال اقل من 3 سنوات </label>
                                <input type="number" class="form-control" id="children_under_3" name="children_under_3" required>
                            </div>

                            <div class="col-md-3">
                                <label for="children_5_to_16" class="form-label">عدد الابناء من 5 ل 16 </label>
                                <input type="number" class="form-control" id="children_5_to_16" name="children_5_to_16" required>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3">
                                <label for="document" class="form-label">الوثيقة </label>
                                <select class="form-select" id="document" name="document" required>
                                    <option value="" disabled selected>اختر  </option>
                                    <option value="palestinian_identity"> هوية فلسطينية</option>
                                    <option value="passport">جواز سفر </option>
                                    <option value="identification_number">رقم تعريف </option>
                                    <option value="jordanian_document">وثيقة اردنية </option>
                                    <option value="other">اخرى</option>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="is_breadwinner_disabled" class="form-label">هل المعيل مصاب حرب </label>
                                <select class="form-select" id="is_breadwinner_disabled" name="is_breadwinner_disabled" required>
                                    <option value="" disabled selected>اختر  </option>
                                    <option value="1"> نعم </option>
                                    <option value="0">لا  </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="has_disability" class="form-label">هل المعيل ذو اعاقة </label>
                                <select class="form-select" id="has_disability" name="has_disability" required>
                                    <option value="" disabled selected>اختر  </option>
                                    <option value="1"> نعم </option>
                                    <option value="0">لا  </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="disability_type" class="form-label"> نوع الاعاقة</label>
                                <select class="form-select" id="disability_type" name="disability_type" >
                                    <option value=""  selected>اختر  </option>
                                    <option value="visual_impairment">إعاقة بصرية</option>
                                    <option value="hearing_disability">إعاقة سمعية</option>
                                    <option value="movement_disability">إعاقة حركية </option>
                                    <option value="mental_disability"> إعاقة عقلية</option>
                                    <option value="psychological_disability">إعاقة نفسية  </option>
                                    <option value="speech_disability"> إعاقة نطقية </option>
                                    <option value="social_disability">إعاقة اجتماعية (التوحد أو اضطرابات التواصل)</option>
                                    <option value="sensory_impairment"> إعاقة حسية</option>
                                    <option value="multiple_disabilities"> إعاقة متعددة</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3">
                                <label for="has_chronic_disease" class="form-label">لديه امراض مزمنه  </label>
                                <select class="form-select" id="has_chronic_disease" name="has_chronic_disease" required>
                                    <option value=""  selected>اختر  </option>
                                    <option value="1"> نعم </option>
                                    <option value="0"> لا </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="war_victim" class="form-label">هل  يوجد فقيد حرب </label>
                                <select class="form-select" id="war_victim" name="war_victim" required>
                                    <option value=""  selected>اختر  </option>
                                    <option value="1"> نعم </option>
                                    <option value="0">لا  </option>
                                </select>
                            </div>

                            {{-- <div class="col-md-3">
                                <label for="income_source" class="form-label">هل يوجد مصدر دخل   </label>
                                <select class="form-select" id="income_source" name="income_source" required>
                                    <option value=""  selected>اختر  </option>
                                    <option value="1"> نعم </option>
                                    <option value="0">لا  </option>
                                </select>
                            </div> --}}

                            {{-- <div class="col-md-3">
                                <label for="is_employee" class="form-label"> هل المعيل موظف ؟ </label>
                                <select class="form-select" id="is_employee" name="is_employee" required>
                                    <option value=""  selected>اختر  </option>
                                    <option value="1"> نعم </option>
                                    <option value="0">لا  </option>
                                </select>
                            </div> --}}
                            <div class="col-md-3">
                                <label for="province" class="form-label"> المحافظة </label>
                                <select class="form-select" id="province" name="province" required>
                                    <option value="" disabled selected>اختر  </option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="city" class="form-label"> المدينة </label>
                                <select class="form-select" id="city" name="city" required>
                                    <option disabled value="">اختر مدينة</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            {{-- <div class="col-md-3">
                                <label for="average_income" class="form-label">متوسط الدخل </label>
                                <input type="number" class="form-control" id="average_income" name="average_income" >
                            </div> --}}



                            <div class="col-md-3">
                                <label for="housing_complex" class="form-label"> التجمع السكني </label>
                                <select class="form-select" id="housing_complex" name="housing_complex" required>
                                    <option disabled value="">اختر </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="neighborhood" class="form-label">الحى</label>
                                <input type="text" class="form-control" id="neighborhood" name="neighborhood" required>
                            </div>

                            <div class="col-md-3">
                                <label for="street" class="form-label">الشارع</label>
                                <input type="text" class="form-control" id="street" name="street" required>
                            </div>
                            <div class="col-md-3">
                                <label for="nearest_landmark" class="form-label">اقرب معلم</label>
                                <input type="text" class="form-control" id="nearest_landmark" name="nearest_landmark" required>
                            </div>
                        </div>

                        <div class="row mb-3">


                            <div class="col-md-3">
                                <label for="is_displaced" class="form-label">نازح / مقيم</label>
                                <select class="form-select" id="is_displaced" name="is_displaced" required>
                                    <option  value="">اختر </option>
                                    <option value="3">نازح</option>
                                    <option value="1">مقيم</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="is_owner" class="form-label">ملك / إجار</label>
                                <select class="form-select" id="is_owner" name="is_owner" required>
                                    <option  value="">اختر </option>
                                    <option value="1">ملك</option>
                                    <option value="0">إجار</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="housing_type" class="form-label">نوع السكن</label>
                                <select class="form-select" id="housing_type" name="housing_type" required>
                                    <option  value="">اختر </option>
                                    <option value="concrete">باطون</option>
                                    <option value="asbestos_sheets">زينقو</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="war_damage" class="form-label">هل يوجد أضرار حرب 2023</label>
                                <select class="form-select" id="war_damage" name="war_damage" required>
                                    <option  value="">اختر </option>
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="damage_type" class="form-label">نوع الضرر</label>
                                <select class="form-select" id="damage_type" name="damage_type" >
                                    <option  value="">اختر </option>
                                    <option value="total_damage">ضرر كلي</option>
                                    <option value="partial_damage">ضرر جزئي</option>
                                    <option value="uninhabitable_part">جزئي غير قابل للسكن</option>
                                    <option value="inhabitable_part">جزئي قابل للسكن</option>
                                </select>


                            </div>
                        </div>

                    {{-- <div class="mb-3 row">
                        <label for="full_name" class="col-md-2 col-form-label">الإسم</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="الإسم" type="text" value="{{old('full_name')}}" name="full_name" id="full_name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_num" class="col-md-2 col-form-label">رقم الهوية</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="رقم الهوية" type="text" value="{{old('id_num')}}" name="id_num" id="id_num">
                        </div>
                        <div class="col-md-2">
                                <a href="javascript:void(0)" class=" btn btn-primary waves-effect waves-light btn-sm " onclick="checkIdNumber()">
                                <i class=" ri-eye-line align-middle me-2"></i>
                                    فحص
                                </a>

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="wife_name" class="col-md-2 col-form-label">اسم الزوجة</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="اسم الزوجة" type="text" value="{{old('wife_name')}}" name="wife_name" id="wife_name">
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="wife_id_num" class="col-md-2 col-form-label">رقم الهوية الزوجة</label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="رقم الهوية الزوجة" type="text" value="{{old('wife_id_num')}}" name="wife_id_num" id="wife_id_num">
                        </div>
                        <div class="col-md-2">
                                <a href="javascript:void(0)" class=" btn btn-primary waves-effect waves-light btn-sm " onclick="checkIdNumberwife()">
                                <i class=" ri-eye-line align-middle me-2"></i>
                                    فحص
                                </a>

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">رقم الجوال </label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder="رقم الجوال " type="text" value="{{old('mobile')}}" name="mobile" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label"> الحالة الاجتماعية </label>
                        <div class="col-md-5">
                          <select name="marital_status" class="form-select">
                               <option>اختار الحالة الاجتماعية</option>
                                  <option value="1">اعزب</option>
                                  <option value="2">متزوج</option>
                                  <option value="3">مطلق</option>
                                  <option value="4">ارملة</option>
                                  <option value="5">ارمل</option>
                                  <option value="6">حالة اجتماعية</option>
                                  <option value="7">اخر</option>
                           </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label"> عدد الافراد  </label>
                        <div class="col-md-5">
                            <input class="form-control" placeholder=" عدد الافراد " type="number" value="{{old('family_count')}}" name="family_count" id="example-text-input">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label"> العائلة</label>
                        <div class="col-md-5">
                          <select id="family_id" name="family_id" class="form-select">
                               <option>اختار العائلة </option>
                               @foreach($families as $family)
                                  <option value="{{$family->id}}">{{ $family->name }}</option>
                               @endforeach

                           </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">  المندوب </label>
                        <div class="col-md-5">
                          <select id="actor_id" name="actor_id" class="form-select">
                               <option>اختار المندوب </option>
                               @foreach($actors as $actor)
                                  <option value="{{$actor->id}}">{{ $actor->name }}</option>
                               @endforeach
                           </select>
                        </div>
                    </div> --}}
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
<script src="{{asset('assets/libs/axios/dist/axios.min.js')}}"></script>
<script>

    $(document).ready(function () {
        $('#province').on('change', function () {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: '/get-cities/' + provinceId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#city').empty();
                        $('#city').append('<option disabled selected>اختر مدينة</option>');
                        $.each(data, function (key, value) {
                            $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });

        $('#city').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/get-housing-complexes/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#housing_complex').empty();
                        $('#housing_complex').append('<option disabled selected>اختر</option>');
                        $.each(data, function (key, value) {
                            $('#housing_complex').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });
    });

     </script>
    <script>


    function checkIdNumber() {
        var id = document.getElementById('id_num').value;
         // Make a request for a user with a given ID
         return axios.get(`check_number/` +id)
                    .then(function (response) {
                        if(response.data.data.full_name){
                            var id = document.getElementById('full_name').value = response.data.data.full_name ;
                        }else{
                            var id = document.getElementById('full_name').value = 'لا يوجد له بيانات' ;
                        }
                        console.log(response.data.data.full_name);
                    })
    }

    function checkIdNumberwife() {
        var id = document.getElementById('wife_id_num').value;
         // Make a request for a user with a given ID
         return axios.get(`check_number/` +id)
                    .then(function (response) {
                        if(response.data.data.full_name){
                            var id = document.getElementById('wife_name').value = response.data.data.full_name ;
                        }else{
                            var id = document.getElementById('wife_name').value = 'لا يوجد له بيانات' ;
                        }
                        console.log(response.data.data.full_name);
                    })
    }


    </script>
@endsection
