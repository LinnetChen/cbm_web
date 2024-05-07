<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>《黑色契約MOBILE》購買成功</title>
    <link rel="icon" sizes="192x192" href="/img/footer/favicon.ico">
    <link href="{{ mix('css/event/gameMall/style.css') }}" rel="stylesheet">


    <meta property="og:title" content="《黑色契約MOBILE》遊戲商城">
    <meta property="og:type" content="website">
    <meta property="og:description" content="經典IP移植手遊《黑色契約MOBILE》事前預約進行中！一鍵開啟遊戲，隨時隨地創造屬於你的史詩冒險。">
    <meta property="og:url" content="《黑色契約MOBILE》遊戲商城">
    <meta property="og:image" content="img/20240403_joinAct/share.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta name="author" content="DiGeam">
    <meta name="Resource-type" content="Document">
    <meta name="description" content="《黑色契約MOBILE》遊戲商城">
</head>

<body>
    <div class="purchaseSuccessBg">
        <div class="purchaseSuccess">
            <div class="title"></div>
            <a href="https://cbm.digeam.com/gameMall" class="backHomeBtn">返回商城</a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var url = location.href.split("?");
            var name = decodeURIComponent(url[url.length - 1]);
            document.querySelector('.title').textContent = name;
        });
    </script>
</body>

</html>
