<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Make;

class MakeSeeder extends Seeder
{
    public function run()
    {
        $modelNames = [
            'Jeep',
            'RAM',
            'Ford',
            'Chevrolet',
        ];

        foreach ($modelNames as $modelName) {
            Make::create([
                'name' => $modelName
            ]);
        }
    }
}
