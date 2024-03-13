<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Body;

class BodySeeder extends Seeder
{
    public function run()
    {
        $bodyTypes = [
            'Sport Utility',
            'Crew Cab',
            'Sedan',
            'Coupe',
            'Wagon'
        ];

        foreach ($bodyTypes as $bodyType) {
            Body::create([
                'name' => $bodyType
            ]);
        }
    }
}
