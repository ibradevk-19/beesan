@foreach($articles as $article)
<div class="col-lg-4 col-sm-6">
    <div class="service-item text-end">
        <a href="{{ route('home.show', $article->slug) }}" class="service-item-image">
        <img
            class="img-full"
           src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->TranslatedTitle }}"
        />
        </a>
        <div class="service-item-content ">
        <h4> <a href="{{ route('home.show', $article->slug) }}" style="color:#000"> {{ $article->TranslatedTitle  }}</a></h4>
        <p>
          {{ Str::words(strip_tags(html_entity_decode($article->TranslatedBody)), 20, '...') }}
        </p>
        </div>
    </div>
</div>
@endforeach

