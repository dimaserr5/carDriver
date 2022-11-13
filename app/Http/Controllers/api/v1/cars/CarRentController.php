<?php

namespace App\Http\Controllers\api\v1\cars;

use App\Http\Controllers\Controller;
use App\Models\api\v1\car;
use App\Models\api\v1\user;
use Illuminate\Http\Request;

class CarRentController extends Controller
{
    public function rentCar(Request $request) {

        $api = $request->get('apikey');

        $user_info = user::where('api_key', $api)
            ->first();

        if(!$request->get('id')) {
            $response_code = 404;
            $response = [
                'status' => false,
                'message' => "Error, car not found",
            ];
        }else {
            $car = car::where('id', $request->get('id'))
                ->first();

            if(!isset($car->id)) {
                $response_code = 404;
                $response = [
                    'status' => false,
                    'message' => "Error, car not found",
                ];
            }else {
                if($car->userid) {
                    $response_code = 403;
                    $response = [
                        'status' => false,
                        'message' => 'The car is already rented',
                    ];
                }else {
                    $check_access_rent = car::where('userid', $user_info->id)
                        ->first();

                    if($check_access_rent) {
                        $response_code = 402;
                        $response = [
                            'status' => false,
                            'message' => 'Error, car limit 1 in user',
                        ];
                    }else {

                        $car->userid = $user_info->id;

                        $car->save();

                        $response_code = 200;
                        $response = [
                            'status' => true,
                            'car_id' => $car->id,
                        ];
                    }
                }
            }
        }

        return response()->json($response, $response_code);

    }
}
