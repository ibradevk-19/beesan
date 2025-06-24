                @if($status=='draft')
                <span class="btn btn-success ms-2">مسودة</span>
                @elseif($status == 'published')
                <span class="btn btn-success ms-2">تم النشر </span>
                @elseif($status == 'archived')
               <span class="btn btn-danger ms-2">مؤرشف </span>
               @endif