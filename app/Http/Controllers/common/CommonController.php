<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use App\Models\Basic\Tipoid;

class CommonController extends Controller
{
    public function getTipoid()
    {
        // return [
        //     'succes' => true
        // ];
        $data = Tipoid::all();
        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $data
        ]);
    }
}
