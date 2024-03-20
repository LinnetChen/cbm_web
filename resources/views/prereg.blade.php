<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ mix('css/event/prereg/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <v-prereg></v-prereg>
    </div>

</body>
{{-- <script src="https://www.youtube.com/iframe_api"></script> --}}
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v19.0&appId=407675791678391" nonce="hWhRw8gS">
</script>

<script src="{{ mix('js/app.js') }}"></script>

</html>
