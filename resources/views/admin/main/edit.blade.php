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
                <h4 class="mb-sm-0">تعديل مستفيد</h4>
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
                    <form action=" {{route('admin.main.update')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row row-cards">
                            <div class="col-md-3">
                              <div class="mb-3">
                                  <label for="full_name" class="form-label">اسم المعيل رباعي </label>
                                  <input type="text"  class="form-control" value="{{ $beneficial->full_name }}" id="full_name" name="full_name" required>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="id_num" class="form-label">رقم هوية المعيل </label>
                                  <input type="number"  min="100000000" min="999999999" class="form-control" value="{{ $beneficial->id_num }}" id="id_num" name="id_num" required>
                                  <a href="javascript:void(0)" class=" btn btn-primary waves-effect waves-light btn-sm " onclick="checkIdNumber()">
                                    <i class=" ri-eye-line align-middle me-2"></i>
                                        فحص
                                    </a>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="wife_name" class="form-label">اسم الزوجة </label>
                                  <input type="text"  class="form-control" id="wife_name" value="{{ $beneficial->wife_name }}" name="wife_name" >
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="wife_id_num" class="form-label">رقم هوية الزوجة</label>
                                  <input type="number"  class="form-control" id="wife_id_num" value="{{ $beneficial->wife_id_num }}" name="wife_id_num" >
                                  <a href="javascript:void(0)" class=" btn btn-primary waves-effect waves-light btn-sm " onclick="checkIdNumberwife()">
                                    <i class=" ri-eye-line align-middle me-2"></i>
                                        فحص
                                    </a>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="marital_status" class="form-label">الحالة الاجتماعية</label>
                                  <select class="form-select" id="marital_status" name="marital_status" required>
                                      <option value="" disabled selected>اختر الحالة الاجتماعية</option>
                                      <option @if ($beneficial->familyDetailsInfo?->marital_status == 'single') selected @endif value="single">أعزب</option>
                                      <option @if ($beneficial->familyDetailsInfo?->marital_status == 'married') selected @endif value="married">متزوج</option>
                                      <option @if ($beneficial->familyDetailsInfo?->marital_status == 'divorced') selected @endif value="divorced">مطلق</option>
                                      <option @if ($beneficial->familyDetailsInfo?->marital_status == 'widowed') selected @endif value="widowed">أرمل</option>
                                      <option @if ($beneficial->familyDetailsInfo?->marital_status == 'breadwinner') selected @endif value="breadwinner">بلا معيل</option>
                                      <option @if ($beneficial->familyDetailsInfo?->marital_status == 'suspended') selected @endif value="suspended">معلقة</option>

                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="mobile" class="form-label">رقم الجوال</label>
                                  <input type="text" value="{{ $beneficial->mobile }}" class="form-control" id="mobile" name="mobile" required>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="family_count" class="form-label">عدد افراد  </label>
                                  <input type="number" value="{{ $beneficial->family_count }}" class="form-control" id="family_count" name="family_count" required>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="mobile" class="form-label">عدد الذكور </label>
                                  <input type="number" value="{{ $beneficial->familyDetailsInfo?->male_count }}" class="form-control" id="male_count" name="male_count" required>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="female_count" class="form-label"> عدد الاناث </label>
                                  <input type="number" value="{{ $beneficial->familyDetailsInfo?->female_count }}" class="form-control" id="female_count" name="female_count" required>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="children_under_2" class="form-label">عدد الاطفال اقل من سنتين</label>
                                  <input type="number" class="form-control" value="{{ $beneficial->familyDetailsInfo?->children_under_2 }}"  id="children_under_2" name="children_under_2" required>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="children_under_3" class="form-label">عدد اطفال اقل من 3 سنوات </label>
                                  <input type="number" class="form-control" value="{{ $beneficial->familyDetailsInfo?->children_under_3 }}" id="children_under_3" name="children_under_3" required>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="children_5_to_16" class="form-label">عدد الابناء من 5 ل 16 </label>
                                   <input type="number" class="form-control" value="{{ $beneficial->familyDetailsInfo?->children_5_to_16 }}" id="children_5_to_16" name="children_5_to_16" required>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="document" class="form-label">الوثيقة </label>
                                  <select class="form-select" id="document" name="document" required>
                                      <option value="" disabled selected>اختر  </option>
                                      <option @if ($beneficial->familyDetailsInfo?->document == 'palestinian_identity') selected @endif value="palestinian_identity"> هوية فلسطينية</option>
                                      <option @if ($beneficial->familyDetailsInfo?->document == 'passport') selected @endif value="passport">جواز سفر </option>
                                      <option @if ($beneficial->familyDetailsInfo?->document == 'identification_number') selected @endif value="identification_number">رقم تعريف </option>
                                      <option @if ($beneficial->familyDetailsInfo?->document == 'jordanian_document') selected @endif value="jordanian_document">وثيقة اردنية </option>
                                      <option @if ($beneficial->familyDetailsInfo?->document == 'other') selected @endif value="other">اخرى</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="is_breadwinner_disabled" class="form-label">هل المعيل مصاب حرب </label>
                                  <select class="form-select" id="is_breadwinner_disabled" name="is_breadwinner_disabled" required>
                                      <option value="" disabled selected>اختر  </option>
                                      <option @if ($beneficial->familyDetailsInfo?->is_breadwinner_disabled == '1') selected @endif value="1"> نعم </option>
                                      <option @if ($beneficial->familyDetailsInfo?->is_breadwinner_disabled == '0') selected @endif value="0">لا  </option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="has_disability" class="form-label">هل المعيل ذو اعاقة </label>
                                  <select class="form-select" id="has_disability" name="has_disability" required>
                                      <option value="" disabled selected>اختر  </option>
                                      <option @if ($beneficial->familyDetailsInfo?->has_disability == '1') selected @endif value="1"> نعم </option>
                                      <option @if ($beneficial->familyDetailsInfo?->has_disability == '0') selected @endif value="0">لا  </option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="disability_type" class="form-label"> نوع الاعاقة</label>
                                  <select class="form-select" id="disability_type" name="disability_type" >
                                      <option value=""  selected>اختر  </option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'visual_impairment') selected @endif value="visual_impairment">إعاقة بصرية</option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'hearing_disability') selected @endif value="hearing_disability">إعاقة سمعية</option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'movement_disability') selected @endif value="movement_disability">إعاقة حركية </option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'mental_disability') selected @endif value="mental_disability"> إعاقة عقلية</option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'psychological_disability') selected @endif value="psychological_disability">إعاقة نفسية  </option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'speech_disability') selected @endif value="speech_disability"> إعاقة نطقية </option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'social_disability') selected @endif value="social_disability">إعاقة اجتماعية (التوحد أو اضطرابات التواصل)</option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'sensory_impairment') selected @endif value="sensory_impairment"> إعاقة حسية</option>
                                      <option @if ($beneficial->familyDetailsInfo?->disability_type == 'multiple_disabilities') selected @endif value="multiple_disabilities"> إعاقة متعددة</option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="has_chronic_disease" class="form-label">لديه امراض مزمنه  </label>
                                  <select class="form-select" id="has_chronic_disease" name="has_chronic_disease" required>
                                      <option value=""  selected>اختر  </option>
                                      <option @if ($beneficial->familyDetailsInfo?->has_chronic_disease == '1') selected @endif value="1"> نعم </option>
                                      <option @if ($beneficial->familyDetailsInfo?->has_chronic_disease == '0') selected @endif value="0"> لا </option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="war_victim" class="form-label">هل  يوجد فقيد حرب </label>
                                  <select class="form-select" id="war_victim" name="war_victim" required>
                                      <option value=""  selected>اختر  </option>
                                      <option @if ($beneficial->familyDetailsInfo?->war_victim == '1') selected @endif value="1"> نعم </option>
                                      <option @if ($beneficial->familyDetailsInfo?->war_victim == '0') selected @endif value="0">لا  </option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="province" class="form-label"> المحافظة </label>
                                  <select class="form-select" id="province" name="province" required>
                                      <option value="" disabled selected>اختر  </option>
                                      @foreach($provinces as $province)
                                          <option @if ($beneficial->familyDetailsInfo?->province == $province->id) selected @endif value="{{ $province->id }}">{{ $province->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="city" class="form-label"> المدينة </label>
                                  <select class="form-select" id="city" name="city" required>
                                      <option disabled value="">اختر مدينة</option>
                                      @foreach($cities as $city)
                                      <option @if ($beneficial->familyDetailsInfo?->city == $city->id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="housing_complex" class="form-label"> التجمع السكني </label>
                                  <select class="form-select" id="housing_complex" name="housing_complex" required>
                                      <option disabled value="">اختر </option>
                                      @foreach($housing_complexs as $housing_complex)
                                         <option @if ($beneficial->familyDetailsInfo?->housing_complex == $housing_complex->id) selected @endif value="{{ $housing_complex->id }}">{{ $housing_complex->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="neighborhood" class="form-label">الحى</label>
                                  <input type="text" value="{{ $beneficial->familyDetailsInfo?->neighborhood }}" class="form-control" id="neighborhood" name="neighborhood" required>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="street" class="form-label">الشارع</label>
                                  <input type="text" value="{{ $beneficial->familyDetailsInfo?->street }}" class="form-control" id="street" name="street" required>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="nearest_landmark" class="form-label">اقرب معلم</label>
                                 <input type="text" value="{{ $beneficial->familyDetailsInfo?->nearest_landmark }}" class="form-control" id="nearest_landmark" name="nearest_landmark" required>
                               </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="is_displaced" class="form-label">نازح / مقيم</label>
                                  <select class="form-select" id="is_displaced" name="is_displaced" required>
                                      <option  value="">اختر </option>
                                      <option @if ($beneficial->familyDetailsInfo?->is_displaced == '0') selected @endif value="0">نازح</option>
                                      <option @if ($beneficial->familyDetailsInfo?->is_displaced == '1') selected @endif value="1">مقيم</option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="is_owner" class="form-label">ملك / إجار</label>
                                  <select class="form-select" id="is_owner" name="is_owner" required>
                                      <option  value="">اختر </option>
                                      <option @if ($beneficial->familyDetailsInfo?->is_owner == '1') selected @endif value="1">ملك</option>
                                      <option @if ($beneficial->familyDetailsInfo?->is_owner == '0') selected @endif value="0">إجار</option>
                                  </select>
                              </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="housing_type" class="form-label">نوع السكن</label>
                                  <select class="form-select" id="housing_type" name="housing_type" required>
                                      <option  value="">اختر </option>
                                      <option @if ($beneficial->familyDetailsInfo?->housing_type == 'concrete') selected @endif value="concrete">باطون</option>
                                      <option @if ($beneficial->familyDetailsInfo?->housing_type == 'asbestos_sheets') selected @endif  value="asbestos_sheets">زينقو</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="war_damage" class="form-label">هل يوجد أضرار حرب 2023</label>
                                  <select class="form-select" id="war_damage" name="war_damage" required>
                                      <option  value="">اختر </option>
                                      <option  @if ($beneficial->familyDetailsInfo?->war_damage == '1') selected @endif value="1">نعم</option>
                                      <option  @if ($beneficial->familyDetailsInfo?->war_damage == '0') selected @endif value="0">لا</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="damage_type" class="form-label">نوع الضرر</label>
                                  <select class="form-select" id="damage_type" name="damage_type" >
                                      <option  value="">اختر </option>
                                      <option @if ($beneficial->familyDetailsInfo?->damage_type == 'total_damage') selected @endif value="total_damage">ضرر كلي</option>
                                      <option @if ($beneficial->familyDetailsInfo?->damage_type == 'partial_damage') selected @endif value="partial_damage">ضرر جزئي</option>
                                      <option @if ($beneficial->familyDetailsInfo?->damage_type == 'uninhabitable_part') selected @endif value="uninhabitable_part">جزئي غير قابل للسكن</option>
                                      <option @if ($beneficial->familyDetailsInfo?->damage_type == 'inhabitable_part') selected @endif value="inhabitable_part">جزئي قابل للسكن</option>
                                  </select>

                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                            <div class="mb-3">
                                    <label for="has_foot_amputation" class="form-label">هل يوجد حالات بتر في العائلة </label>
                                    <select class="form-select" id="has_foot_amputation" name="has_foot_amputation" >
                                        <option  value="">اختر </option>
                                        <option @if ($beneficial->familyDetailsInfo?->has_foot_amputation == 'yes') selected @endif value="yes">نعم  </option>
                                        <option @if ($beneficial->familyDetailsInfo?->has_foot_amputation == 'no') selected @endif value="no">لا  </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                              <div class="mb-3">
                                  <label for="foot_amputation_count" class="form-label">عدد حالات البتر في حال وجدودها </label>
                                  <input type="number" class="form-control" value="{{ $beneficial->familyDetailsInfo?->foot_amputation_count }}" id="foot_amputation_count" name="foot_amputation_count" >
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label for="actor_id" class="form-label">المندوب </label>
                                    <select class="form-select" id="actor_id" name="actor_id" >
                                        <option  value="">اختر </option>
                                        @foreach ( $actors as $item )
                                         <option @if ($beneficial->actor_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                              
                              </div>
                          </div>

                    <input type="hidden" name="id" value="{{$beneficial->id}}" id="">

                    <div class="col-12">
                        <button type="submit"  class="btn btn-primary ">إضافة</button>
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
