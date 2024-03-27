<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>聯動頁</title>
    <link rel="icon" sizes="192x192" href="/img/footer/favicon.ico">
    <link href="{{ mix('css/event/20240403_jointAct/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrap" id="app">
        <v-joint-act></v-joint-act>
    </div>

</body>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v19.0"
    nonce="2BDRMefR"></script>
<script src="{{ mix('js/event/jointAct.js') }}"></script>

</html>
