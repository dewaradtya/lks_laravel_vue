<?php

namespace App\Http\Controllers\api;

use App\Models\Regional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegionalResource;

class RegionalController extends Controller
{
    public function index()
    {
        $query = Regional::get();

        return response()->json([
            'message' => 'Data regional di temukan',
            'data' => RegionalResource::collection($query)
        ]);
    }
}