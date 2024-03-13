<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\BodyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodyController extends Controller
{
    protected BodyService $bodyService;

    public function __construct(BodyService $bodyService)
    {
        $this->bodyService = $bodyService;
    }

    /**
     * Get all bodies.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $data = $this->bodyService->getAll();
        return response()->json($data);
    }
}
