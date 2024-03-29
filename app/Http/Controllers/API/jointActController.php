<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\joinActUser;
use Illuminate\Http\Request;

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
                'serve' => $user['serve'],
                'serial_num' => $user['cbm_serial_number'],
            ]);
        }
    }
    private function reward_cb($request)
    {

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
                'status' => -99,
            ]);
        } else {
            $user->cbo_reward_get = 'y';
            $user->cbo_reward_server = $request->serve;
            $user->save();
            return response()->json([
                'status' => 1,
            ]);
        }

    }
    private function reward_m($request)
    {

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
            $user->cbm_serial_number = 'aaa';
            $user->save();
            return response()->json([
                'status' => 1,
            ]);
        }

    }

}
