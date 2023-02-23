<?php

namespace App\Http\Controllers\Api;

use App\Services\ApiMealsService;
use App\Http\Controllers\Controller;

class MealsController extends Controller
{
    public function index(ApiMealsService $apiMealsService)
    {
        $response = [
            'success' => true, 
            'categories' => $apiMealsService->get()
        ];

        return response()->json($response);
    }
}
