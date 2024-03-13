<?php

namespace App\Http\Repositories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarRepository
{
    /**
     * Get a list of cars.
     *
     * @param int|null $bodyId
     * @return Collection
     */
    public function getCars(?int $bodyId = null): Collection
    {
        if ($bodyId === null) {
            return Car::with('body', 'images')->get();
        } else {
            return Car::with('body', 'images')->where(['body_id' => $bodyId, 'available' => 1])->get();
        }
    }

    /**
     * Get details of a specific car by ID.
     *
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function getCarById(int $id)
    {
        try {
            return Car::with('body', 'make', 'images')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Car not found');
        }
    }

    /**
     * Create a new car.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Car::create($data);
    }

    /**
     * Update details of a car.
     *
     * @param int   $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        try {
            $car = Car::findOrFail($id);
            $car->update($data);
            return $car;
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Car not found');
        }
    }

    /**
     * Delete a car by ID.
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        try {
            Car::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            throw new \Exception('Car not found');
        }
    }
}
