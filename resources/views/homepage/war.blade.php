@extends('layout.layout')

@section('css')
    <link rel="stylesheet" href="/css/homepage/page.css">
@endsection

@section('content')

@endsection

@section('js')
    <script>
        $(function () {
          /*---------War----------*/
          var str1 = $(".score").eq(0).html();
          var str2 = $(".score").eq(1).html();
          $(".score").html('');
          str1.toString().split('').forEach(function(number) {
            $(".score").eq(0).append('<img src="./images/war/score_number_'+number+'.png">');
          });
          str2.toString().split('').forEach(function(number) {
            $(".score").eq(1).append('<img src="./images/war/score_number_'+number+'.png">');
          });
        });
    </script>
@endsection