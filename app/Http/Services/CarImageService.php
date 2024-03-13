<?php

namespace App\Http\Services;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\CarRepository;
use App\Http\Repositories\CarImageRepository;

class CarImageService
{
    protected CarImageRepository $carImageRepository;
    protected CarRepository $carRepository;

    public function __construct(CarImageRepository $carImageRepository, CarRepository $carRepository)
    {
        $this->carImageRepository = $carImageRepository;
        $this->carRepository = $carRepository;
    }

    /**
     * Attach images to a car.
     *
     * @param Car $car
     * @param array $imageUrls
     * @return void
     */
    public function attachImages(Car $car, array $imageUrls): void
    {
        foreach ($imageUrls as $imageUrl) {
            $image = new CarImage();
            $image->image_path = $imageUrl['new_name'][0] ?? $this->parseImageNameFromUrl($imageUrl['url']);
            $car->images()->save($image);
        }
    }

    /**
     * Sync images with a car.
     *
     * @param Car $car
     * @param array $imageUrls
     * @return void
     */
    public function syncImages(Car $car, array $imageUrls): void
    {
        $car->images()->delete();
        $this->attachImages($car, $imageUrls);
    }

    /**
     * Upload images.
     *
     * @param array $imageUrls
     * @return array
     */
    public function uploadImages(array $imageUrls): array
    {
        $newImageIds = [];
        foreach ($imageUrls as $imageUrl) {
            try {
                $uploadedFile = Storage::disk('public')->putFile( getenv('CAR_IMAGE'), new File($imageUrl));
                $newImageIds[] = basename($uploadedFile);
            } catch (\Exception $e) {
                throw new \Exception('Failed to upload image');
            }
        }
        return $newImageIds;
    }

    /**
     * Delete an image by name.
     *
     * @param string $imageName
     * @return void
     */
    public function deleteImage(string $imageName): void
    {
        $image = $this->carImageRepository->findImageByName($this->parseImageNameFromUrl($imageName));
        if ($image) {
            $this->carImageRepository->delete($image->id);
        }
        $imagePath = getenv('CAR_IMAGE') . $imageName;
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    /**
     * Delete all images associated with a car.
     *
     * @param int $carId
     * @return void
     */
    public function deleteImagesByCarId(int $carId): void
    {
        $images = $this->carImageRepository->findByCarId($carId);
        foreach ($images as $image) {
            $this->deleteImage($image->image_path);
        }
    }

    /**
     * Parse image name from URL.
     *
     * @param string $imageUrl
     * @return string
     * @throws \Exception
     */
    protected function parseImageNameFromUrl(string $imageUrl): string
    {
        $urlParts = parse_url($imageUrl);
        if (!$urlParts || !isset($urlParts['path'])) {
            throw new \Exception('Invalid image URL');
        }
        $pathParts = pathinfo($urlParts['path']);
        if (!isset($pathParts['basename'])) {
            throw new \Exception('Invalid image URL');
        }
        return $pathParts['basename'];
    }
}

