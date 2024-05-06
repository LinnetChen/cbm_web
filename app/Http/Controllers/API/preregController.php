<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prereg_user;
use Carbon\Carbon;

class preregController extends Controller
{
    //
    public function index(Request $request)
    {
        //活動時間判斷
        if (date('YmdHis') > '20240513120000') {
            return response()->json([
                'status' => -90,
            ]);
        }

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        $phone = $request->phone;
        if ($request->phone == '' || $request->phone == null) {
            return response()->json([
                'status' => -98,
                'msg' => '未輸入正確格式',
            ]);
        }
        $checkPhone = prereg_user::where('phone', $phone)->count();
        if ($checkPhone != 0) {
            return response()->json([
                'status' => -99,
                'msg' => '此號碼已預約過',
            ]);
        }

        $time = Carbon::now()->subHours(1);
        $checkIp = prereg_user::where('ip', $real_ip)->where('created_at', '>=', $time)->count();
        if ($checkIp >= 3) {
            return response()->json([
                'status' => -97,
                'msg' => '同一個IP，一小時內只能預約三次',
            ]);
        } else {
            $createLog = new prereg_user();
            $createLog->phone = $phone;
            $createLog->type = $request->phone_type;
            $createLog->ip = $real_ip;
            $createLog->save();
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}
