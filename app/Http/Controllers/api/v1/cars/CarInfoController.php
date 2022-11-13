<?php

namespace App\Http\Controllers\api\v1\cars;

use App\Http\Controllers\Controller;
use App\Models\api\v1\car;
use App\Models\api\v1\user;
use Illuminate\Http\Request;

class CarInfoController extends Controller
{
    public function getInfoCar(Request $request) {
        $api = $request->get('apikey');

        $user_info = user::where('api_key', $api)
            ->first();

        $car = car::where('userid', $user_info->id)
            ->first();

        if(!isset($car)) {
            $response_code = 200;
            $response = [
                'status' => false,
                'message' => 'Car not found'
            ];
        }else {
            $response_code = 200;
            $response = $car;
        }

        return response()->json($response, $response_code);

    }
}
