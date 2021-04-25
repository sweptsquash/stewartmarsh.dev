<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @isset($meta['title']){{ $meta['title'] }} |@endisset Stewart Marsh Portfolio
        </title>

        <link rel="canonical" href="{{ URL::current() }}" />
        <meta name="description" content="{{ $meta['description'] ?? '' }}" />
		<meta name="keywords" content="{{ $meta['keywords'] ?? '' }}" />
		<meta name="robots" content="INDEX, FOLLOW">
		<meta name="author" content="Stewart Marsh" />
        <meta property="og:site_name" content="Stewart Marsh Portfolio"/>
		<meta property="og:locale" content="en_GB"/>
		<meta property="og:title" content="@isset($meta['title']){{ $meta['title'] }} |@endisset Stewart Marsh Portfolio"/>
		<meta property="og:description" content="{{ $meta['description'] ?? '' }}"/>
		<meta property="og:url" content="{{ URL::current() }}"/>
		<meta property="og:image" content="{{ $meta['image'] ?? '' }}" />
		<meta name="twitter:title" content="@isset($meta['title']){{ $meta['title'] }} |@endisset Stewart Marsh Portfolio">
		<meta name="twitter:description" content="{{ $meta['description'] ?? '' }}">
		<meta name="twitter:image" content="{{ $meta['image'] ?? '' }}">
        <meta property="og:type" content="website" />
		<meta name="twitter:card" content="summary">

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
        <script src="{{ mix('/js/manifest.js') }}" defer type="text/javascript"></script>
        <script src="{{ mix('/js/vendor.js') }}" defer type="text/javascript"></script>
        <script src="{{ mix('/js/app.js') }}" defer type="text/javascript"></script>
    </head>

    <body class="h-100">
        @inertia
    </body>
</html>
