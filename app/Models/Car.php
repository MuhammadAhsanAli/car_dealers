<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['body_id', 'make_id', 'model', 'model_number', 'vin', 'year', 'price', 'description', 'available'];

    public function body()
    {
        return $this->belongsTo(Body::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}

