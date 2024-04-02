<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="《黑色契約MOBILE》事前預約">
    <meta property="og:type" content="website">
    <meta property="og:description" content="經典IP移植手遊《黑色契約MOBILE》事前預約進行中！一鍵開啟遊戲，隨時隨地創造屬於你的史詩冒險。">
    <meta property="og:url" content="《黑色契約MOBILE》事前預約">
    <meta property="og:image" content="img/prereg/share.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta name="author" content="DiGeam">
    <meta name="Resource-type" content="Document">
    <link rel="icon" sizes="192x192" href="img/favicon.ico">
    <meta name="description" content="《黑色契約MOBILE》事前預約">
    <title>《黑色契約MOBILE》事前預約</title>
    <link href="{{ mix('css/event/prereg/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <v-prereg></v-prereg>
    </div>

</body>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v19.0&appId=407675791678391" nonce="hWhRw8gS">
</script>

<script src="{{ mix('js/event/prereg.js') }}"></script>

</html>
