<?php

namespace App\Http\Controllers\api\v1\user;

use App\Http\Controllers\Controller;
use App\Models\api\v1\user;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserCreateController extends Controller
{
    public function createUser(Request $request) {

        if(!$request->get('username')) {
            $response_code = 400;
            $response = [
                'status' => false,
                'message' => 'Empty username'
            ];
        }else {

            $find_username = user::where('username', $request->get('username'))
                ->first();

            if($find_username) {
                $response_code = 401;
                $response = [
                    'status' => false,
                    'message' => 'Username already exists'
                ];
            }else {

                $add = new user;

                $add->username = $request->get('username');

                $add->api_key = Str::random($length = 35);

                $add->save();

                $response_code = 200;
                $response = [
                    'status' => true,
                    'user_id' => $add->id,
                    'token' => $add->api_key
                ];
            }
        }
        return response()->json($response, $response_code);
    }
}
