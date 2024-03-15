<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>聯動頁</title>
    <link href="{{ mix('css/event/20240403_jointAct/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrap" id="app">
        <v-joint-act></v-joint-act> 
    </div>

</body>
<script src="{{ mix('js/app.js') }}"></script>

</html>