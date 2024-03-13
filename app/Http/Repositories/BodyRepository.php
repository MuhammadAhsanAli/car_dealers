<?php

namespace App\Http\Repositories;

use App\Models\Body;
use Illuminate\Database\Eloquent\Collection;

class BodyRepository
{
    /**
     * Retrieve all bodies.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Body::all();
    }
}
