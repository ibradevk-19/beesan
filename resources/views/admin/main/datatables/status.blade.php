@if($is_approved == 1 )
 <span class="btn btn-success ms-2">معتمد </span>
@elseif($is_approved == 3 )
 <span class="btn btn-danger  ms-2">مرفوض </span>
@elseif($is_approved == 4 )
 <span class="btn btn-danger  ms-2">خطاء في البيانات </span>
@else
 <span class="btn btn-warning ms-2">قيد المراجعة </span>
@endif

