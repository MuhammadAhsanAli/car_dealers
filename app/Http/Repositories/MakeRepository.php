<?php

namespace App\Http\Repositories;

use App\Models\Make;
use Illuminate\Database\Eloquent\Collection;

class MakeRepository
{
    /**
     * Retrieve all makes.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Make::all();
    }
}
