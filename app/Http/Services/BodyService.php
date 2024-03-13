<?php

namespace App\Http\Services;

use App\Http\Repositories\BodyRepository;
use Illuminate\Database\Eloquent\Collection;

class BodyService
{
    protected BodyRepository $bodyRepository;

    public function __construct(BodyRepository $bodyRepository)
    {
        $this->bodyRepository = $bodyRepository;
    }

    /**
     * Get all bodies.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->bodyRepository->getAll();
    }
}
