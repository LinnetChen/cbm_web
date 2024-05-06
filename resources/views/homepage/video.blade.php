@extends('layout.layout')
@section('title', '《黑色契約MOBILE》影片展示')
@section('og:title', '《黑色契約MOBILE》影片展示')
@section('og:url', 'https://cbm.digeam.com/video')
@section('css')
	<link rel="stylesheet" href="/css/homepage/jquery.popup.css">
	<link rel="stylesheet" href="/css/homepage/page.css">
@endsection

@section('content')
	<div class="video_bg"></div>
	<div class="popup effect-fade-scale" id="popup-video">
	  <div class="embed-container"></div>
	  <a href="#" class="popup-close"></a>
	</div>
	<div class="wrap">
		<div class="title"><img src="/img/homepage/video/videoTitle.png"></div>
		<div class="container">
			<div id="video">
				@foreach ($list as $value)
					<div class="videoBox">
						<div class="videoThumb"><a href="{{ $value['url'] }}" data-action="watch-video"><img src="https://mobileimg.digeam.com/{{ $value['cover_photo'] }}" style="max-width: 460px;"></a></div>
						<div class="videoTitle"><img src="/img/homepage/video/videpDecoL.png">{{ $value['title'] }}<img src="/img/homepage/video/videpDecoR.png"></div>			
					</div>
                @endforeach
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="/js/homepage/jquery.popup.js"></script> 
	<script>
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
	</script>
@endsection