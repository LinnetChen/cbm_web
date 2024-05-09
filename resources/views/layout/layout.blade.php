<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=800, user-scalable=no">
    <meta name="keywords" content=@yield('title')>
    <meta name="description" content="經典IP移植手遊《黑色契約MOBILE》事前預約進行中！一鍵開啟遊戲，隨時隨地創造屬於你的史詩冒險。">
    <meta property="og:type" content="website">
    <meta property="og:title" content=@yield('og:title')>
    <meta property="og:site_name" content="《黑色契約MOBILE》官方正式網站">
    <meta property="og:description" content="經典IP移植手遊《黑色契約MOBILE》事前預約進行中！一鍵開啟遊戲，隨時隨地創造屬於你的史詩冒險。">
    <meta property="og:url" content=@yield('og:url')>
    <meta property="og:image" content="/img/prereg/share.png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/homepage/normalize.css">
    <link rel="stylesheet" href="/css/homepage/common.css?v=9">
    @yield('css')
    <link rel="stylesheet" href="/css/homepage/mobile.css?v=10">
    <link rel="icon" href="/img/homepage/favicon.ico">

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PB8RXNM');
    </script>
  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PB8RXNM" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="gotop" alt="TOP"></div>
    
    <div class="depth">	
      <div class="wrap"> 
        <div class="game_ui"> <a class="logo" href="/index"></a> </div>
        <div class="game_link"> 
          <a class="btn_fb" href="https://www.facebook.com/DiGeamCabalM" target="_blank" title="facebook"><img src="/img/homepage/main/fbIcon.png"></a> 
          <a class="btn_yt" href="https://youtube.com/playlist?list=PL4diK25VNyLOzTPqRwjFEWi1cSTFRx3yN&si=wQc7tHutrTQoJv8a" target="_blank" title="Youtube"><img src="/img/homepage/main/ytIcon.png"></a> 
          <a class="btn_dc" href="https://discord.gg/YyPkJrwqvs" target="_blank" title="Discord"><img src="/img/homepage/main/dcIcon.png"></a> 
          <a class="btn_gm" href="https://forum.gamer.com.tw/A.php?bsn=36485" target="_blank" title="巴哈姆特"><img src="/img/homepage/main/bahaIcon.png"></a> 
        </div>
      </div>
    </div>
    <a class="open_menu" href="javascript:void(0);"> <span class="btn"> <span></span> <span></span> <span></span> </span> </a>
    <nav>
      <div class="logo"><img src="/img/homepage/main/logo.png"></div>
      <div class="nav_bg"></div>
      <ul>
        <li><a href="/newlist">最新消息</a></li>
        <!--<li><a href="/war">國家戰爭</a></li>-->
        <li><a href="javascript:alert('敬請期待');">國家戰爭</a></li>
        <li><a href="/video">影片展示</a></li>
        <li><a href="/gameMall" target="_blank">儲值商店</a></li>
        <li><a href="https://www.digeam.com/cs/cs_mobile" target="_blank">聯繫客服</a></li>
      </ul>
      <div class="game_link"> 
        <a class="btn_fb" href="https://www.facebook.com/DiGeamCabalM" target="_blank" title="facebook"><img src="/img/homepage/main/fbIcon.png"></a> 
        <a class="btn_yt" href="https://youtube.com/playlist?list=PL4diK25VNyLOzTPqRwjFEWi1cSTFRx3yN&si=wQc7tHutrTQoJv8a" target="_blank" title="Youtube"><img src="/img/homepage/main/ytIcon.png"></a> 
        <a class="btn_dc" href="https://discord.gg/YyPkJrwqvs" target="_blank" title="Discord"><img src="/img/homepage/main/dcIcon.png"></a> 
        <a class="btn_gm" href="https://forum.gamer.com.tw/A.php?bsn=36485" target="_blank" title="巴哈姆特"><img src="/img/homepage/main/bahaIcon.png"></a> 
      </div>
      <div class="logo_area"><img src="/img/homepage/main/nav_logo.png"></div>
    	<div class="store_m">
        <a href="https://apps.apple.com/TW/app/id6476968999" target="_blank" id="ios_m"><img src="/img/homepage/main/Ios.png"></a>
        <a href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw" target="_blank" id="aos_m"><img src="/img/homepage/main/Google.png"></a>
      </div>
    </nav>
    @yield('content')
    <footer>
    	<div class="wrap">
    		<div class="footerbox">
    			<div class="footer_logo"><a href="https://www.digeam.com/index"><img src="/img/homepage/footer/logo_digeam.png"></a>
    			<img src="/img/homepage/footer/est.png"></div>
    			<div class="copyright">
    				<a href="https://www.digeam.com/terms" target="_blank">會員服務條款</a>
    				<a href="https://www.digeam.com/terms2" target="_blank">隱私條款</a>
    				<a href="https://www.digeam.com/cs/cs_mobile" target="_blank">客服中心</a>
    				<p> Copyright © ESTgames Corp. All rights reserved. 2024 Licensed and published for Taiwan, Hong Kong and Macau by DiGeam Co.,Ltd CABAL Online is a registered trademark of ESTgames Corp (and the logo of ESTgames). </p>
    			</div>
    			<div class="grade">
    				<img src="/img/homepage/footer/icon_15.png">
    				<ul>
    					<li>本遊戲為免費使用，部分內容涉及暴力情節。</li>
    					<li>遊戲內另提供購買虛擬遊戲幣、物品等付費服務。</li>
    					<li>請注意遊戲時間，避免沉迷。</li>
    					<li>本遊戲服務區域包含台灣、香港、澳門。</li></ul>
    			</div>
    		</div>
    		
    		
    	</div>  
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.0/swiper-bundle.min.js"></script> 
    <script src="/js/homepage/action.js?v=21"></script>
    <script>
      $(function () {
        var userAgent = (navigator.platform).toLowerCase();

        if (userAgent.includes('iphone') || userAgent.includes('ipad')) {
          $('#aos_m').css('display','none');
        } else {
          $('#ios_m').css('display','none');
        }
      });
    </script>
    @yield('js')
  </body>
</html>
