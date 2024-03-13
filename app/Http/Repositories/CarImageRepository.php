<?php

namespace App\Http\Repositories;

use App\Models\CarImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarImageRepository
{
    /**
     * Create a new car image.
     *
     * @param array $data
     * @return CarImage
     */
    public function create(array $data): CarImage
    {
        return CarImage::create($data);
    }

    /**
     * Find an image by name.
     *
     * @param string $image
     * @return CarImage|null
     */
    public function findImageByName(string $image): ?CarImage
    {
        return CarImage::where('image_path', $image)->first();
    }

    /**
     * Find images by car ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByCarId(int $id)
    {
        return CarImage::where('car_id', $id)->get();
    }

    /**
     * Find an image by ID.
     *
     * @param int $id
     * @return CarImage
     * @throws ModelNotFoundException
     */
    public function findImageById(int $id): CarImage
    {
        return CarImage::findOrFail($id);
    }

    /**
     * Delete an image by ID.
     *
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete(int $id): ?bool
    {
        $image = $this->findImageById($id);
        return $image->delete();
    }
}
