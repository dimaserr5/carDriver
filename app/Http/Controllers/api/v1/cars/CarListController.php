<?php

namespace App\Http\Controllers\api\v1\cars;

use App\Http\Controllers\Controller;
use App\Models\api\v1\car;
use Illuminate\Http\Request;

class CarListController extends Controller
{
    public function get() {

        $cars = car::all();

        return $cars;

    }

    public function getForUser(Request $request) {

        $cars = car::where('userid', null)->get();

        return $cars;

    }

}
