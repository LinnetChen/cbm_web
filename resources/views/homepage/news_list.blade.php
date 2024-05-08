@extends('layout.layout')
@section('title', '《黑色契約MOBILE》遊戲公告')
@section('og:title', '《黑色契約MOBILE》遊戲公告')
@section('og:url', 'https://cbm.digeam.com/newlist')
@section('css')
	<link rel="stylesheet" href="/css/homepage/page.css?v=3">
@endsection

@section('content')
	<div class="wrap">
		<div class="title"><img src="/img/homepage/news/s1Title.png"></div>
		<div class="container">
			<div id="news">
				<ul class="news_tab">
				  <li class="all"><a href="javascript:newsClick('all');">公告</a></li>
				  <li class="event"><a href="javascript:newsClick('event');">活動</a></li>
				  <li class="system"><a href="javascript:newsClick('system');">更新</a></li>
				</ul>
				<div class="news_list" id ="info_all">
					@foreach ($list as $value)
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
					{!! $list->links() !!}
					<!--<div class="pagination">
						<ul>
							<li><a href=""><</a></li>
							<li><a href="">1</a></li>
							<li class="active"><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li><a href="">5</a></li>
							<li><a href="">></a></li>
						</ul>
					</div>-->
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
        _url = window.location.href
        addActive = _url.split('newlist/').pop()
        if (addActive != 'all' && addActive != 'event' && addActive != 'system') {
            $('.all').addClass('active')
        } else {
            $('.' + addActive).addClass('active')
        }


        function newsClick(cate) {
            document.location.href = "/newlist/" + cate
        }
    </script>
@endsection