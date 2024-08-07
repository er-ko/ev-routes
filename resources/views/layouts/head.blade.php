<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ isset($meta_title) ? $meta_title .' | '. config('app.name', 'ev-routes.com') : config('app.name', 'ev-routes.com') }}</title>
<meta name="description" content="{{ isset($meta_desc) ? $meta_desc : '' }}">
<meta name="keywords" content="{{ isset($meta_keywords) ? $meta_keywords : '' }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="icon" type="image/x-icon" href="favicon.ico">

<!-- Styles -->
@vite(['resources/css/app.css', 'resources/js/app.js'])