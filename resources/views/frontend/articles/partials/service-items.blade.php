@foreach($services as $service)
<div class="col-lg-4 col-sm-6">
    <div class="service-item text-end">
        <a  class="service-item-image">
        <img
            class="img-full"
           src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->TranslatedTitle }}"
        />
        </a>
        <div class="service-item-content ">
        <h4>  {{ $service->TranslatedTitle  }}</h4>
        <p>
          {{ Str::words(strip_tags(html_entity_decode($service->TranslatedBody)), 20, '...') }}
        </p>
        </div>
    </div>
</div>
@endforeach

