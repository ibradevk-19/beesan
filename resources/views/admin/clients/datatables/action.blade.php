<div class="button-items">
    <a href="{{ route('clients.edit', ['client' => $id]) }}"
       class=" btn btn-primary waves-effect waves-light btn-sm">
        <i class=" ri-eye-line align-middle me-2"></i>
        تعديل
    </a>
    <a href="javascript:void(0)" class=" btn btn-danger waves-effect waves-light btn-sm " onclick="DeleteItem('{{$id}}')">
        <i class=" ri-delete-bin-line align-middle me-2"></i>
        حذف
    </a>
</div>
