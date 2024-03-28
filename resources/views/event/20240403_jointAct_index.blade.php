<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>《黑色契約MOBILE X Online》聯動特別活動</title>
    <link rel="icon" sizes="192x192" href="/img/footer/favicon.ico">
    <link href="{{ mix('css/event/20240403_jointAct/style.css') }}" rel="stylesheet">


    <meta property="og:title" content="《黑色契約MOBILE》聯動">
    <meta property="og:type" content="website">
    <meta property="og:description" content="經典IP移植手遊《黑色契約MOBILE》事前預約進行中！一鍵開啟遊戲，隨時隨地創造屬於你的史詩冒險。">
    <meta property="og:url" content="《黑色契約MOBILE》聯動">
    <meta property="og:image" content="img/jointAct/share.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta name="author" content="DiGeam">
    <meta name="Resource-type" content="Document">
    <meta name="description" content="《黑色契約MOBILE》聯動">
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
