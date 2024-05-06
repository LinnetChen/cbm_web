<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\News;
use App\Models\Videos;
use GuzzleHttp\Client;

class FrontController extends Controller
{
    public function index($serverIdx = 3)
    {
        $img = Banners::where('status', 'Y')->where('game_code', 'CMTW')->orderBy('sort', 'desc')->get();
        $na = News::where('game_code', 'CMTW')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('sort', 'desc')->limit(7)->get();
        $nb = News::where('game_code', 'CMTW')->where('activ', 'Y')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('sort', 'desc')->limit(7)->get();
        $nc = News::where('game_code', 'CMTW')->where('renew', 'Y')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('sort', 'desc')->limit(7)->get();

        $client = new Client();
        $data = [
            "serverIdx" => intval($serverIdx),
            "logIdx" => 0,
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $url = 'http://cmtwapi.global.estgames.com/event/weekly/getData';
        //$url = 'http://c1twapi.global.estgames.com/event/weekly/getData';

        $res = $client->request('POST',$url , [
            'headers' => $headers,
            'json' => $data,
        ]);
        $result = $res->getBody();
        $result = json_decode($result);

        return view('homepage.index', [
            'img' => $img,
            'na' => $na,
            'nb' => $nb,
            'nc' => $nc,
            'result' => $result,
        ]);
    }
    // 特殊字元處理
    public function escape_like_str($str)
    {
        $like_escape_char = '';

        return str_replace([$like_escape_char, '%', '_'], [
            $like_escape_char . $like_escape_char,
            $like_escape_char . '%',
            $like_escape_char . '_',
        ], $str);

    }
    public function news_list($cate = 'all')
    {
        if ($cate == 'all') {
            $list = News::where('game_code', 'CMTW')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('sort', 'desc')->paginate(10);
        } else if ($cate == 'event') {
            $list = News::where('game_code', 'CMTW')->where('activ', 'Y')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('sort', 'desc')->paginate(10);
        } else if ($cate == 'system') {
            $list = News::where('game_code', 'CMTW')->where('renew', 'Y')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('sort', 'desc')->paginate(10);
        } else {
            $list = News::where('game_code', 'CMTW')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('top', 'desc')->orderBy('new', 'desc')->orderBy('created_at', 'desc')->orderBy('sort', 'desc')->paginate(10);
        }
        return view('homepage.news_list', [
            'list' => $list,
        ]);
    }
    public function news_content($id = 0)
    {
        if ($id == 0) {
            return redirect('https://cbm.digeam.com/index');
        } else {
            if ($_SERVER['HTTP_CF_CONNECTING_IP'] == '211.23.144.219') {
                $page = News::where('id', $id)->where('game_code', 'CMTW')->first();
            } else {
                $page = News::where('id', $id)->where('game_code', 'CMTW')->where('open', 'Y')->first();
            }
            if (!$page) {
                return redirect('https://cbm.digeam.com/');
            } else {
                if ($page->activ == 'Y') {
                    $type = 'event';
                } else if ($page->renew == 'Y') {
                    $type = 'system';
                } else {
                    $type = 'all';
                }
            }

            if ($_SERVER['HTTP_CF_CONNECTING_IP'] == '211.23.144.219') {
                if ($page->activ == 'Y') {
                    $next_cnt = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('activ', 'Y')->count();
                    if($next_cnt > 0) {
                        $next = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('activ', 'Y')->orderBy('id', 'asc')->first();
                    } else {
                        $next = '';
                    }
                    $before_cnt = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('activ', 'Y')->count();
                    if($before_cnt > 0) {
                        $before = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('activ', 'Y')->orderBy('id', 'desc')->first();
                    } else {
                        $before = '';
                    }
                } else if ($page->renew == 'Y') {
                    $next_cnt = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('renew', 'Y')->count();
                    if($next_cnt > 0) {
                        $next = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('renew', 'Y')->orderBy('id', 'asc')->first();
                    } else {
                        $next = '';
                    }
                    $before_cnt = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('renew', 'Y')->count();
                    if($before_cnt > 0) {
                        $before = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('renew', 'Y')->orderBy('id', 'desc')->first();
                    } else {
                        $before = '';
                    }
                } else {
                    $next_cnt = News::where('id', '>' , $id)->where('game_code', 'CMTW')->count();
                    if($next_cnt > 0) {
                        $next = News::where('id', '>' , $id)->where('game_code', 'CMTW')->orderBy('id', 'asc')->first();
                    } else {
                        $next = '';
                    }
                    $before_cnt = News::where('id', '<' , $id)->where('game_code', 'CMTW')->count();
                    if($before_cnt > 0) {
                        $before = News::where('id', '<' , $id)->where('game_code', 'CMTW')->orderBy('id', 'desc')->first();
                    } else {
                        $before = '';
                    }
                }
            } else {
                if ($page->activ == 'Y') {
                    $next_cnt = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('activ', 'Y')->count();
                    if($next_cnt > 0) {
                        $next = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('activ', 'Y')->orderBy('id', 'asc')->first();
                    } else {
                        $next = '';
                    }
                    $before_cnt = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('activ', 'Y')->count();
                    if($before_cnt > 0) {
                        $before = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('activ', 'Y')->orderBy('id', 'desc')->first();
                    } else {
                        $before = '';
                    }
                } else if ($page->renew == 'Y') {
                    $next_cnt = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('renew', 'Y')->count();
                    if($next_cnt > 0) {
                        $next = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('renew', 'Y')->orderBy('id', 'asc')->first();
                    } else {
                        $next = '';
                    }
                    $before_cnt = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('renew', 'Y')->count();
                    if($before_cnt > 0) {
                        $before = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->where('renew', 'Y')->orderBy('id', 'desc')->first();
                    } else {
                        $before = '';
                    }
                } else {
                    $next_cnt = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->count();
                    if($next_cnt > 0) {
                        $next = News::where('id', '>' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->orderBy('id', 'asc')->first();
                    } else {
                        $next = '';
                    }
                    $before_cnt = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->count();
                    if($before_cnt > 0) {
                        $before = News::where('id', '<' , $id)->where('game_code', 'CMTW')->where('open', 'Y')->orderBy('id', 'desc')->first();
                    } else {
                        $before = '';
                    }
                }
            }
        };
        return view('homepage.news_content', [
            'page' => $page,
            'type' => $type,
            'next_cnt' => $next_cnt,
            'before_cnt' => $before_cnt,
            'next' => $next,
            'before' => $before,
        ]);
    }
    public function video()
    {
        $list = Videos::where('game_code', 'CMTW')->where('status', 'Y')->orderBy('sort', 'desc')->get();
        return view('homepage.video', [
            'list' => $list,
        ]);
    }
    public function war($serverIdx = 3)
    {
        $client = new Client();
        $data = [
            "serverIdx" => intval($serverIdx),
            "logIdx" => 0,
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        $url = 'http://cmtwapi.global.estgames.com/event/weekly/getData';
        //$url = 'http://c1twapi.global.estgames.com/event/weekly/getData';

        $res = $client->request('POST',$url , [
            'headers' => $headers,
            'json' => $data,
        ]);
        $result = $res->getBody();
        $result = json_decode($result);
        return view('homepage.war', [
            'result' => $result,
        ]);
    }

}
