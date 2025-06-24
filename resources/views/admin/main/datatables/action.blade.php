<div class="button-items">
    <a href="{{ route('admin.main.edit', ['id' => $id]) }}"
       class=" btn btn-primary waves-effect waves-light btn-sm">
        <i class=" ri-eye-line align-middle me-2"></i>
        تعديل
    </a>
    <a href="{{ route('admin.main.details', ['id' => $id]) }}"
       class=" btn btn-primary waves-effect waves-light btn-sm">
        <i class=" ri-eye-line align-middle me-2"></i>
        تفاصيل
    </a>

    @if ($is_approved == 2)
        <a href="{{ route('admin.main.approved', ['id' => $id,'status' => 1]) }}"
            class=" btn btn-primary waves-effect waves-light btn-sm">
            <i class=" ri-eye-line align-middle me-2"></i>
            موافقة
        </a>
     @elseif ($is_approved == 3)
     <a href="{{ route('admin.main.approved', ['id' => $id,'status' => 1]) }}"
        class=" btn btn-primary waves-effect waves-light btn-sm">
        <i class=" ri-eye-line align-middle me-2"></i>
        موافقة
    </a>
    @else
        <a href="{{ route('admin.main.approved', ['id' => $id,'status' => 3]) }}"
            class=" btn btn-primary waves-effect waves-light btn-sm">
            <i class=" ri-eye-line align-middle me-2"></i>
            رفض
        </a>
    @endif

    <a href="{{ route('admin.main.dis-active', ['id' => $id]) }}"
       class=" btn btn-primary waves-effect waves-light btn-sm">
        <i class=" ri-eye-line align-middle me-2"></i>
            تعطيل
    </a>

    <a href="javascript:void(0)" class=" btn btn-danger waves-effect waves-light btn-sm " onclick="DeleteItem('{{$id}}')">
        <i class=" ri-delete-bin-line align-middle me-2"></i>
        حذف
    </a>
</div>
