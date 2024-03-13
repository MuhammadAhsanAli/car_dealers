<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarImageRequest;
use App\Http\Services\CarImageService;
use Illuminate\Http\JsonResponse;

class CarImageController extends Controller
{
    protected CarImageService $carImageService;

    public function __construct(CarImageService $carImageService)
    {
        $this->carImageService = $carImageService;
    }

    /**
     * Store car images.
     *
     * @param CarImageRequest $request
     * @return JsonResponse
     */
    public function store(CarImageRequest $request): JsonResponse
    {
        $data = $this->carImageService->uploadImages($request->validated());
        return response()->json(['data' => $data, 'message' => 'Images uploaded successfully']);
    }

    /**
     * Delete a car image by name.
     *
     * @param string $name
     * @return JsonResponse
     */
    public function destroy(string $name): JsonResponse
    {
        try {
            $this->carImageService->deleteImage($name);
            return response()->json(['message' => 'Image deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
