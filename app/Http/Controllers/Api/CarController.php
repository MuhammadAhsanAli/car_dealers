<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CarRequest;
use App\Http\Services\BodyService;
use App\Http\Services\CarService;
use App\Http\Services\MakeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    protected CarService $carService;
    protected BodyService $bodyService;
    protected MakeService $makeService;

    /**
     * CarController constructor.
     *
     * @param CarService  $carService
     * @param BodyService $bodyService
     * @param MakeService $makeService
     */
    public function __construct(CarService $carService, BodyService $bodyService, MakeService $makeService)
    {
        $this->carService = $carService;
        $this->bodyService = $bodyService;
        $this->makeService = $makeService;
    }

    /**
     * Get a list of cars.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $bodyId = $request->get('body_id');
        $cars = $this->carService->getCars($bodyId);
        return response()->json($cars);
    }

    /**
     * Get dropdown options for makes and bodies.
     *
     * @return JsonResponse
     */
    public function dropdown(): JsonResponse
    {
        $makes = $this->makeService->getAll();
        $bodies = $this->bodyService->getAll();
        return response()->json(['makes' => $makes, 'bodies' => $bodies]);
    }

    /**
     * Get details of a specific car.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $car = $this->carService->getCarById($id);
            return response()->json($car);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Store a new car.
     *
     * @param CarRequest $request
     * @return JsonResponse
     */
    public function store(CarRequest $request): JsonResponse
    {
        $car = $this->carService->create($request->validated());
        return response()->json($car);
    }

    /**
     * Update details of a car.
     *
     * @param CarRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CarRequest $request, $id): JsonResponse
    {
        try {
            $car = $this->carService->update($id, $request->validated());
            return response()->json($car);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete a car.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $this->carService->delete($id);
            return response()->json(['message' => 'Car deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
