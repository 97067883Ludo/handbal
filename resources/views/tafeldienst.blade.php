<!doctype html>
<html class="bg-gray-50 h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafel dienst</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
</head>
<body class="h-full bg-gray-100 ">

<div id="app" class="h-full">

    <App />

</div>

@vite('resources/js/app.js')

</body>
</html>
