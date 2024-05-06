@extends('layout.layout')
@section('title', '《黑色契約MOBILE》正式官網')
@section('og:title', '《黑色契約MOBILE》正式官網')
@section('og:url', 'https://cbm.digeam.com/index')
@section('css')
    <link rel="stylesheet" href="/css/homepage/jquery.popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.0/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.0/swiper-bundle.min.css">
@endsection

@section('content')
    <div class="video_bg"></div>
    <div class="popup effect-fade-scale" id="popup-video">
      <div class="embed-container"></div>
      <a href="#" class="popup-close"></a>
    </div>
    <header>
      <div id="lightarea"></div>
      <div class="mainVisualEffect"></div>
      <div class="wrap">
        <div class="logo"><img src="/img/homepage/main/logo.png"></div>
        <div class="store"> 
          <a href="https://play.google.com/store/apps/details?id=com.estgames.cm.tw" target="_blank"><span><i class="effect"></i></span><img src="/img/homepage/main/Google.png"></a> 
          <a href="https://apps.apple.com/TW/app/id6476968999" target="_blank"><span><i class="effect"></i></span><img src="/img/homepage/main/Ios.png"></a> 
          <a href="#" target="_blank"><span><i class="effect"></i></span><img src="/img/homepage/main/apk.png"></a> 
        </div>
      </div>
    </header>
    <section id="s1">
      <div class="wrap">
        <div class="title"><img src="/img/homepage/s1/announceTitle.png"></div>
        <div class="mainbox">
          <div class="mainBanner">
            <div class="swiper">
              <div class="swiper-wrapper">
                @foreach ($img as $value)
                    <div class="swiper-slide"><a href="{{ $value['url'] }}"><img src="https://mobileimg.digeam.com/{{ $value['file_name'] }}" style="width:100%"></a></div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="mainNews">
            <ul class="info_tab">
              <li class="active"><a href="#info_all">公告</a></li>
              <li class=""><a href="#info_event">活動</a></li>
              <li class=""><a href="#info_update">更新</a></li>
              <a class="more" href="/news_list/all">More</a>
            </ul>
            <div class="info_container">
              <div class="info_box active" id ="info_all">
                @foreach ($na as $value)
                    @if ($value['top'] == 'Y')
                        <ul class="textUITOP">
                        @elseif($value['new'] == 'Y')
                            <ul class="textUINEW">
                            @else
                                <ul class="textUInormal">
                    @endif
                    <li><a class="textbox" href="{{ route('news_content', $value['id']) }}"><span></span>
                            @if ($value['activ'] == 'Y')
                                <div class="info_title">【活動】{{ $value['title'] }}</div>
                            @elseif ($value['renew'] == 'Y')
                                <div class="info_title">【更新】{{ $value['title'] }}</div>
                            @else
                                <div class="info_title">【公告】{{ $value['title'] }}</div>
                            @endif
                            <div class="info_date">{{ date('Y/m/d', strtotime($value['created_at'])) }}</div>
                        </a></li>
                    </ul>
                @endforeach
              </div>
              <div class="info_box" id ="info_event">
                @foreach ($nb as $value)
                    @if ($value['top'] == 'Y')
                        <ul class="textUITOP">
                        @elseif($value['new'] == 'Y')
                            <ul class="textUINEW">
                            @else
                                <ul class="textUInormal">
                    @endif
                    <li><a class="textbox" href="{{ route('news_content', $value['id']) }}"><span></span>
                            @if ($value['activ'] == 'Y')
                                <div class="info_title">【活動】{{ $value['title'] }}</div>
                            @elseif ($value['renew'] == 'Y')
                                <div class="info_title">【更新】{{ $value['title'] }}</div>
                            @else
                                <div class="info_title">【公告】{{ $value['title'] }}</div>
                            @endif
                            <div class="info_date">{{ date('Y/m/d', strtotime($value['created_at'])) }}</div>
                        </a></li>
                    </ul>
                @endforeach
              </div>
              <div class="info_box" id ="info_update">
                @foreach ($nc as $value)
                    @if ($value['top'] == 'Y')
                        <ul class="textUITOP">
                        @elseif($value['new'] == 'Y')
                            <ul class="textUINEW">
                            @else
                                <ul class="textUInormal">
                    @endif
                    <li><a class="textbox" href="{{ route('news_content', $value['id']) }}"><span></span>
                            @if ($value['activ'] == 'Y')
                                <div class="info_title">【活動】{{ $value['title'] }}</div>
                            @elseif ($value['renew'] == 'Y')
                                <div class="info_title">【更新】{{ $value['title'] }}</div>
                            @else
                                <div class="info_title">【公告】{{ $value['title'] }}</div>
                            @endif
                            <div class="info_date">{{ date('Y/m/d', strtotime($value['created_at'])) }}</div>
                        </a></li>
                    </ul>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="s2">
      <div class="wrap">
        <div class="title"><img src="/img/homepage/s2/warTitle.png"></div>
        <div class="title"><img src="/img/homepage/s2/warConsequenceTitle.png"></div>
        <div class="warbox">
          <div class="warBlue">
            <div class="warIcon"><img src="/img/homepage/s2/warBlueIconBling.png"></div>
            <div class="warText"><img src="/img/homepage/s2/warBlueTitle.png"></div>
          </div>
          <div class="warScore">
            @if ($result->data->warResult == null)
            <div class="score blueScore">00</div>
            @else
                @if ($result->data->warResult->capella < 10)
                <div class="score blueScore">0{{ $result->data->warResult->capella }}</div>
                @else
                <div class="score blueScore">{{ $result->data->warResult->capella }}</div>
                @endif
            @endif
            <div class="textDeco"><img src="/img/homepage/s2/wartextDeco.png"></div>
            @if ($result->data->warResult == null)
            <div class="score redScore">00</div>
            @else
                @if ($result->data->warResult->procyon < 10)
                <div class="score redScore">0{{ $result->data->warResult->procyon }}</div>
                @else
                <div class="score redScore">{{ $result->data->warResult->procyon }}</div>
                @endif 
            @endif    
        </div>
          <div class="warRed">
            <div class="warIcon"><img src="/img/homepage/s2/warRedIconBling.png"></div>
            <div class="warText"><img src="/img/homepage/s2/warRedTitle.png"></div>
          </div>    
        </div>
      <div class="text">(僅統計最近三個月)</div>  
      <div class="war_btn"><a href="/war">更多國家戰爭數據</a></div>
      </div>
    </section>
    <section id="s3">
      <div class="wrap">
        <div class="title"><img src="/img/homepage/s3/occupationTitle.png"></div>   
          <div class="job_info">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char01.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char01_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char01_tit.png"></div>
                    <div class="charVideo charVideo01"> <a href="https://www.youtube.com/embed/9nolxJjTmZQ" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char01_text.png"></div>
                  <div class="charText">
                    <p>狂劍士先天就具備強壯的體格，崇尚強大的力量而不是技巧與速度，鍛鍊目標是為了徹底掌控身體，因此不需要培養魔力的理解能力，每次攻擊都帶來極強的破壞力，讓敵人不得不退避三舍。</p>
                  </div>
                </div>
          </div>
              </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char02.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char02_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char02_tit.png"></div>
                    <div class="charVideo charVideo02"> <a href="https://www.youtube.com/embed/5sYIlYpAQNU" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char02_text.png"></div>
                  <div class="charText">
                    <p>雙劍士追求精湛的技巧與敏捷的速度，有著超乎常人的反應能力，利用極高的敏捷特性在戰場上迅速穿梭，極快的速度讓他們能夠產生分身幻象擾亂敵人視線，讓敵人難以抓住他的身影，創造絕佳的攻擊機會。</p>
                  </div>
                </div>
          </div>
              </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char03.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char03_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char03_tit.png"></div>
                    <div class="charVideo charVideo03"> <a href="https://www.youtube.com/embed/Gm1DfYKWVqU" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char03_text.png"></div>
                  <div class="charText">
                    <p>盾劍士渴望極強的防禦能力，不滿足於穿戴防禦力較高的重型盔甲，他們嘗試將魔力運用在防禦上，讓武器轉變為星之盾，開創出新的魔力運用方式。成為擁有絕對防禦能力的戰士。</p>
                  </div>
                </div>
          </div>
              </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char04.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char04_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char04_tit.png"></div>
                    <div class="charVideo charVideo04"> <a href="https://www.youtube.com/embed/p7ucdOrt-4I" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char04_text.png"></div>
                  <div class="charText">
                    <p>魔劍士在一次次研究中，成功將魔法與劍術結合，發展出高超的戰鬥方式，每次攻擊帶來強大的破壞力，但由於需要同時使用兩種戰鬥方式的力量，因此在培養訓練上需要花費較多心力。</p>
                  </div>
                </div>
              </div>
          </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char05.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char05_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char05_tit.png"></div>
                    <div class="charVideo charVideo05"> <a href="https://www.youtube.com/embed/z9gSAcgYDbA" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char05_text.png"></div>
                  <div class="charText">
                    <p>角鬥士有著與生俱來的戰鬥本能，透過控制對敵人產生的憤怒情緒，來激發自身的戰鬥能力。為了能夠最大程度的運用飛輪施展技能，同時負擔盔甲重量，他們需要不斷的磨練自身的力量和靈活性來達成目的。</p>
                  </div>
                </div>
              </div>
          </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char06.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char06_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char06_tit.png"></div>
                    <div class="charVideo charVideo06"> <a href="https://www.youtube.com/embed/czCbTzStADw" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char06_text.png"></div>
                  <div class="charText">
                    <p>魔導師是掌握著魔法、爆發力和超級強大破壞力的絕對強者。他們可以隨心所欲地操控體內魔力與自然之力共鳴，甚至於同時施展多種魔法，將其化為毀滅性的魔法攻擊，破壞力足以令敵人望而生畏。</p>
                  </div>
                </div>
              </div>
          </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char07.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char07_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char07_tit.png"></div>
                    <div class="charVideo charVideo07"> <a href="https://www.youtube.com/embed/tyS3vfKZ39U" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char07_text.png"></div>
                  <div class="charText">
                    <p>弓箭手起源於魔導師，將魔力轉化為箭矢造成巨大的破壞力，而靈活性是他們最大的優勢之一，在戰場上輕鬆改變位置和躲避敵人的攻擊，憑藉著靈活的身手和卓越的射擊技巧，強大的遠程支援成為戰場上勝利的關鍵。</p>
                  </div>
                </div>
              </div>
          </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char08.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char08_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char08_tit.png"></div>
                    <div class="charVideo charVideo08"> <a href="https://www.youtube.com/embed/Roj1W0_Fvgk" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char08_text.png"></div>
                  <div class="charText">
                    <p>銃槍手繼承了賢者之塔秘密部隊的戰鬥模式，將武器轉變為槍械的多種型態，訓練著重於提高準確度和快速反應能力，使得他們能夠在高壓環境下保持冷靜，以精準的射擊給予敵人致命的打擊，成為了遠距離射擊專家。</p>
                  </div>
                </div>
              </div>
          </div>
              <div class="swiper-slide">
          <div class="jobBox">
                <div class="charImg">
                  <div class="char"><img src="/img/homepage/s3/char09.png"></div>
                  <div class="charBg"><img src="/img/homepage/s3/char09_bg.png"></div>
                </div>
                <div class="charInfo">
                  <div class="charTop">
                    <div class="charTitle"><img src="/img/homepage/s3/char09_tit.png"></div>
                    <div class="charVideo charVideo09"> <a href="https://www.youtube.com/embed/5OeeBapc4Tg" data-action="watch-video"></a></div>
                  </div>
                  <div class="charTextImg"><img src="/img/homepage/s3/char09_text.png"></div>
                  <div class="charText">
                    <p>咒術師行為舉止透露出神秘和邪惡的氛圍，他們通過將魔力與靈魂結合，形成強大的禁忌力量來提升自己的魔力，擅長施展恐怖且極具摧毀力的黑暗魔法，對敵人造成極大的破壞和混亂，成為戰場上讓敵人心生畏懼的存在。</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
            
          </div>
        <div class="job_button">
              <div class="prev-job"><img src="/img/homepage/s3/occupationArrowL.png"></div>
          <div thumbsSlider="" class="job_thumbs">
          <div class="swiper-wrapper">
          <div class="swiper-slide job_tab1">     
          </div>
          <div class="swiper-slide job_tab2">     
          </div>
          <div class="swiper-slide job_tab3">     
          </div>
          <div class="swiper-slide job_tab4">
          </div>
          <div class="swiper-slide job_tab5">     
          </div>
          <div class="swiper-slide job_tab6">     
          </div>
          <div class="swiper-slide job_tab7">     
          </div>
          <div class="swiper-slide job_tab8">     
          </div>
          <div class="swiper-slide job_tab9">     
          </div>
          </div>
          </div>
              <div class="next-job"><img src="/img/homepage/s3/occupationArrowR.png"></div>
            </div>
        
      </div>
    </section>
    <section id="s4">
      <div class="wrap">
        <div class="title"><img src="/img/homepage/s4/featureTitle.png"></div>
        <div class="mainFeature">
          <div class="feature-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="/img/homepage/s4/featurePhoto01.png"></div>
              <div class="swiper-slide"><img src="/img/homepage/s4/featurePhoto02.png"></div>
              <div class="swiper-slide"><img src="/img/homepage/s4/featurePhoto03.png"></div>
              <div class="swiper-slide"><img src="/img/homepage/s4/featurePhoto04.png"></div>
              <div class="swiper-slide"><img src="/img/homepage/s4/featurePhoto05.png"></div>
            </div>
            <div class="prev-btn"><img src="/img/homepage/s4/featureArrowL.png"></div>
            <div class="next-btn"><img src="/img/homepage/s4/featureArrowR.png"></div>
            <div class="feature-pagination"></div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('js')
    <script src="/js/homepage/jquery.popup.js"></script> 
    <script src="/js/homepage/lightrise.js"></script> 
    <script>
      $(function () {
        /*=====Video=====*/
          $(document).ready(function () {
              $('.video_bg').hide();
              (function ($) {
                  $(function () {
                      $('[data-dialog]').on('click', function (e) {
                          var $this = $(e.target);
                          $($this.data('dialog')).attr('class', 'popup ' + $this.data('effect'));
                      });
                  });
              })(jQuery);
              $(document).ready(function () {
                  $('.popup').popup({
                      close: function () {
                          $(this).find('.embed-container').empty();
                      }
                  });

                  $(document).on('click', '[data-action="watch-video"]', function (e) {
                      e.preventDefault();
                      var plugin = $('#popup-video.popup').data('popup');
                      $('#popup-video.popup .embed-container').html(
                          '<iframe src="'
                          + e.currentTarget.href
                          + '?autoplay=1" frameborder="0" allowfullscreen allow="autoplay" />'
                      );
                      plugin.open();
                  });
              });
          });
        /*---------War----------*/
        var str1 = $(".score").eq(0).html();
        var str2 = $(".score").eq(1).html();
        $(".score").html('');
        str1.toString().split('').forEach(function(number) {
          $(".score").eq(0).append('<img src="/img/homepage/war/score_number_'+number+'.png">');
        });
        str2.toString().split('').forEach(function(number) {
          $(".score").eq(1).append('<img src="/img/homepage/war/score_number_'+number+'.png">');
        });
      });
    </script>
@endsection