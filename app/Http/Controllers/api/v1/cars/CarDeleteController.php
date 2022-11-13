<?php

namespace App\Http\Controllers\api\v1\cars;

use App\Http\Controllers\Controller;
use App\Models\api\v1\car;
use Illuminate\Http\Request;

class CarDeleteController extends Controller
{
    public function delete(Request $request) {
        if(!$request->get('id')) {
            $response_code = 404;
            $response = [
                'status' => false,
                'message' => 'Entry Car Id',
            ];
        }else {
            $car = car::where('id', $request->get('id'))
                ->first();

            if(!$car) {
                $response_code = 404;
                $response = [
                    'status' => false,
                    'message' => 'Car ID '.$request->get('id').' not found',
                ];
            }else {
                if($car->userid) {
                    $response_code = 403;
                    $response = [
                        'status' => false,
                        'message' => 'Error, Car ID '.$request->get('id').' - busy userid '.$car->userid,
                    ];
                }else {
                    $car->delete();
                    $response_code = 200;
                    $response = [
                        'status' => true,
                        'message' => 'Car ID '.$request->get('id').' delete',
                    ];
                }
            }

        }

        return response()->json($response, $response_code);
    }
}
