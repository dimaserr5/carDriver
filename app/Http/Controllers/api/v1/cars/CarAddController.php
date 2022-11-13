<?php

namespace App\Http\Controllers\api\v1\cars;

use App\Http\Controllers\Controller;
use App\Models\api\v1\car;
use Illuminate\Http\Request;

class CarAddController extends Controller
{
    public function add(Request $request) {
        if(!$request->get('name')) {
            $response_code = 402;
            $response = [
                'status' => false,
                'message' => 'Entry Car Name'
            ];
        }else {
            if(!$request->get('gos')) {
                $response_code = 402;
                $response = [
                    'status' => false,
                    'message' => 'Entry Gos Number car'
                ];
            }else {
                $add = new car;

                $add->name = $request->get('name');
                $add->gos_number = $request->get('gos');

                $add->save();

                $response_code = 200;
                $response = [
                    'status' => true,
                    'car_id' => $add->id,
                ];
            }
        }
        return response()->json($response, $response_code);
    }
}
