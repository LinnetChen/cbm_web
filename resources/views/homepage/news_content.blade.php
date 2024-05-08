@extends('layout.layout')
@section('title', '《黑色契約MOBILE》遊戲公告-' . $page['title'])
@section('og:title', $page['title'])
@section('og:url', 'https://cbm.digeam.com/news_content/'.$page['id'])
@section('css')
	<link rel="stylesheet" href="/css/homepage/page.css">
@endsection

@section('content')
	<div class="wrap">
		<div class="title"><img src="/img/homepage/news/s1Title.png"></div>
		<div class="container">
			<div id="news">
				<ul class="news_tab">
					@if ($type == 'all')
					  	<li class="active">
					@else
						<li class="">
					@endif
					  		<a href="/newlist/all">公告</a>
					  	</li>
					@if ($type == 'event')
					  	<li class="active">
					@else
						<li class="">
					@endif
					  		<a href="/newlist/event">活動</a>
					  	</li>
					@if ($type == 'system')
					  	<li class="active">
					@else
						<li class="">
					@endif
					  		<a href="/newlist/system">更新</a>
					  	</li>
				</ul>
				<div class="news_content">
					<div class="newsTitle">
					<h1>
						@if ($type == 'event')
						【活動】
						@elseif ($type == 'system')
						【更新】
						@else
						【公告】
						@endif
						{{ $page->title }}
					</h1>
					<div class="date">{{ date('Y/m/d H:i', strtotime($page->created_at)) }}</div>
					</div>
					<div class="title_line"><img src="/img/homepage/news/announceLine.png"></div>
					<div class="text_box">
						{!! $page->content !!}
					</div>
					<div class="pagination">
					<ul>
						@if ($before_cnt > 0)
						<li><a href="/news_content/{{ $before->id }}">上一篇</a></li>
						@endif
						@if ($next_cnt > 0)
						<li><a href="/news_content/{{ $next->id }}">下一篇</a></li>
						@endif
					</ul>
					</div>				
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')

@endsection