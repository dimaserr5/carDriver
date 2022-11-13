<?php

namespace App\Http\Controllers\api\v1\user;

use App\Http\Controllers\Controller;
use App\Models\api\v1\user;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function roleUser(Request $request) {

        $api = $request->get('apikey');

        $role = $request->get('role');

        $system_key = $request->get('system_key');

        if(!$role OR !$system_key) {
            $response = [
                'status' => false,
                'message' => 'Error, Empty Params'
            ];
            $response_code = 402;
        }else {

            if($system_key !== env('APP_SYSTEM_KEY')) {
                $response = [
                    'status' => false,
                    'message' => 'Error, invalid system key'
                ];
                $response_code = 403;
            }else {

                switch ($role) {

                    case 'user':

                        user::where('api_key', $api)
                            ->update(['status' => 'user']);

                        $response = [
                            'status' => true,
                            'message' => 'Grand access User'
                        ];

                        $response_code = 200;

                        break;


                    case 'admin':
                        user::where('api_key', $api)
                            ->update(['status' => 'admin']);

                        $response = [
                            'status' => true,
                            'message' => 'Grand access Admin'
                        ];
                        $response_code = 200;

                        break;

                    default:
                        $response = [
                            'status' => false,
                            'message' => 'Error, make role user or admin'
                        ];

                        $response_code = 400;


                }
            }
        }

        return response()->json($response, $response_code);

    }
}
