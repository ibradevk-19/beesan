                @if($status=='inactive')
                <span class="btn btn-success ms-2">مسودة</span>
                @elseif($status == 'active')
                <span class="btn btn-success ms-2">تم النشر </span>
              
               @endif