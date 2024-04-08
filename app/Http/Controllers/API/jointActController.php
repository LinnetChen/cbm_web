<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\joinActCode;
use App\Models\joinActUser;
use App\Models\joinActGetLog;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class jointActController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'login') {
            $result = jointActController::login($request);
        } elseif ($request->type == 'reward_cb') {
            $result = jointActController::reward_cb($request);
        } elseif ($request->type == 'reward_m') {
            $result = jointActController::reward_m($request);
        } else {
            return 0;
        }

        return $result;
    }

    private function login($request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }
        if (!isset($request->user) || $request->user == '') {
            return response()->json([
                'status' => -99,
            ]);
        } else {
            $user = joinActUser::where('user', $request->user)->first();
            if (!$user) {
                $newUser = new joinActUser();
                $newUser->user = $request->user;
                $newUser->ip = $real_ip;
                $newUser->save();
                $user = joinActUser::where('user', $request->user)->first();
            }
            return response()->json([
                'status' => 1,
                'serve' => $user['cbo_reward_server'],
                'serial_num' => $user['cbm_serial_number'],
            ]);
        }
    }
    private function reward_cb($request)
    {

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }
        if (!isset($request->user) || $request->user == '') {
            return response()->json([
                'status' => -99,
            ]);
        }
        if ($request->serve != '1' && $request->serve != '2') {
            return response()->json([
                'status' => -98,
            ]);
        }

        $user = joinActUser::where('user', $request->user)->first();
        if ($user->cbo_reward_get != 'n') {
            return response()->json([
                'status' => -96,
            ]);
        } else {
            if ($request->serve == 1) {
                $server_id = 'server01';
            } else {
                $server_id = 'server02';
            }
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', 'http://c1twapi.global.estgames.com/game/character/searchByCharacterId?userId=' . $_COOKIE['StrID'] . '&serverCode=' . $server_id);
            $check_char = $res->getBody();
            $check_char = json_decode($check_char);

            if (count($check_char->data) <= 0) {
                return response()->json([
                    'status' => -96,
                ]);
            } else {
                $user->cbo_reward_get = 'y';
                $user->cbo_reward_server = $request->serve;
                $user->save();
                $item =
                    [
                    ['name'=>'貴族小菲雞(30日)','id' => 33560062, 'option' => 10, 'itemPeriod' => 17],
                    ['name'=>'GM的祝福(Lv.4)聖水 x10','id' => 33560906, 'option' => 5, 'itemPeriod' => 0],
                ];
                $client = new Client(['verify' => false]);
                $res = $client->request('GET', 'http://c1twapi.global.estgames.com/user/userNum?userId=' . $_COOKIE['StrID']);
                $reqbody = $res->getBody();
                $reqbody = json_decode($reqbody);
                foreach ($item as $value) {
                    $newLog = new joinActGetLog();
                    $newLog->user = $_COOKIE['StrID'];
                    $newLog->item = $value['name'];
                    $newLog->ip = $real_ip;
                    $newLog->save();

                    
                    $client = new Client();
                    $data = [
                        "userNum" => $reqbody->data,
                        "deliveryTime" => Carbon::now()->format('Y-m-d H:i:s'),
                        "expirationTime" => Carbon::now()->addDays(30)->format('Y-m-d H:i:s'),
                        "itemKind" => $value['id'],
                        "itemOption" => $value['option'],
                        "itemPeriod" => $value['itemPeriod'],
                        "count" => 1,
                        "title" => 'CABAL M聯動獎勵',
                        "serverIdx" => $request->serve,
                    ];

                    $headers = [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ];

                    $res = $client->request('POST', 'http://c1twapi.global.estgames.com/event/user/giveItemUserEventInventoryByUserNumAndItemInfo', [
                        'headers' => $headers,
                        'json' => $data,
                    ]);
                }
                return response()->json([
                    'status' => 1,
                ]);
            }
        }

    }
    private function reward_m($request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        if (!isset($request->user) || $request->user == '') {
            return response()->json([
                'status' => -99,
            ]);
        }

        $user = joinActUser::where('user', $request->user)->first();
        if ($user->cbm_serial_number != null) {
            return response()->json([
                'status' => -98,
            ]);
        } else {
            $getCode = joinActCode::where('user', null)->first();
            $getCode->user = $request->user;
            $getCode->ip = $real_ip;
            $getCode->save();
            $user->cbm_serial_number = $getCode->code;
            $user->save();
            return response()->json([
                'status' => 1,
                'serial_num' => $getCode->code,
            ]);
        }
    }
}
