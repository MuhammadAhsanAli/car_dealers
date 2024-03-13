<?php

namespace App\Http\Services;

use App\Http\Repositories\MakeRepository;
use Illuminate\Database\Eloquent\Collection;

class MakeService
{
    protected MakeRepository $makeRepository;

    public function __construct(MakeRepository $makeRepository)
    {
        $this->makeRepository = $makeRepository;
    }

    /**
     * Get all makes.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->makeRepository->getAll();
    }
}
