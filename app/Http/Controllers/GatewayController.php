<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use Illuminate\Http\Request;

class GatewayController extends Controller
{
    /**
        @OA\Get(
     *      path="/api/v1/gateways",
     *      summary="Get list of gateways",
     *      tags={"Gateways"},
     *      @OA\Response(
     *          response=200,
     *          description="A list of gateways"
     *      )
     * )
     */
    public function index()
    {
        try {
            return response()->json([
                "data" => [
                    "gateways" => Gateway::all()
                ],
                "message" => "Gateway list"
            ]);
        }catch (\Exception $e) {
            Log::error("Error to fetch gateways: " . $e->getMessage());
            return response()->json([
                "data" => [],
                "message" => "Something went wrong"
            ], 500);
        }
    }
}
