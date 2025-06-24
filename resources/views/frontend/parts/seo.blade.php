@php
    $locale = app()->getLocale();
    $title = $settings['title'][$locale] ?? '';
    $description_text = $description != null ? $description :  $settings['description'][$locale] ?? '';
    $pageTitle = $page_title ?? '';
    $ogImage = $og_image ?? asset('frontend/assets/images/logo-svg.svg');

@endphp

<!-- Basic Meta -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
<link rel="shortcut icon" href="{{ asset('frontend/assets/images/logo-svg.svg') }}" type="image/svg">

<!-- SEO Meta -->
<meta name="title" content="{{ $title . ' | ' . $pageTitle }}">
<meta name="description" content="{{ $description_text }}">

<title>{{ $title . ' | ' . $pageTitle }}</title>

<!-- Open Graph / Facebook / LinkedIn -->
<meta property="og:type" content="website" />
<meta property="og:site_name" content="KSACH" />
<meta property="og:title" content="{{ $title . ' | ' . $pageTitle }}">
<meta property="og:description" content="{{ $description_text }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:url" content="{{ url()->current() }}">
