<?php

namespace App\Http\Services;

use App\Http\Repositories\CarRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Services\CarImageService;

class CarService
{
    protected CarRepository $carRepository;
    protected CarImageService $imageService;

    /**
     * CarService constructor.
     *
     * @param CarRepository     $carRepository
     * @param CarImageService   $imageService
     */
    public function __construct(CarRepository $carRepository, CarImageService $imageService)
    {
        $this->carRepository = $carRepository;
        $this->imageService = $imageService;
    }

    /**
     * Get a list of cars.
     *
     * @param int|null $bodyId
     */
    public function getCars(?int $bodyId = null)
    {
        $cars = $this->carRepository->getCars($bodyId);

        return $cars->map(function ($car) {
            $firstImage = $car->images->isNotEmpty() ? $car->images->first()->image_path : null;
            return [
                'id' => $car->id,
                'title' => $car->make->name . ' ' . $car->model . ' ' . $car->year,
                'description' => $car->description,
                'price' => $car->price,
                'body' => $car->body->name,
                'image' => $firstImage
            ];
        });
    }

    /**
     * Get details of a specific car by ID.
     *
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function getCarById(int $id)
    {
        return $this->carRepository->getCarById($id);
    }

    /**
     * Create a new car.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $car = $this->carRepository->create($data);
        if (isset($data['photos'])) {
            $this->imageService->attachImages($car, $data['photos']);
        }
        return $car;
    }

    /**
     * Update details of a car.
     *
     * @param int   $id
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function update(int $id, array $data)
    {
        $car = $this->carRepository->update($id, $data);
        if (!$car) {
            throw new ModelNotFoundException('Car not found');
        }

        if (isset($data['photos'])) {
            $this->imageService->syncImages($car, $data['photos']);
        }
        return $car;
    }

    /**
     * Delete a car.
     *
     * @param int $id
     * @return void
     * @throws ModelNotFoundException
     */
    public function delete(int $id)
    {
        $car = $this->carRepository->getCarById($id);

        if (!$car) {
            throw new ModelNotFoundException("Car not found with id $id");
        }

        // Delete car images
        $this->imageService->deleteImagesByCarId($car->id);

        // Delete the car
        $this->carRepository->delete($car->id);
    }
}
