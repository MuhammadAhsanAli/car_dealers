<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        $carsData = [
            [
                'body_id' => 1,
                'make_id' => 1,
                'model' => 'Wrangler Unlimited',
                'model_number' => 'JLJP74',
                'vin' => '1C4HJXEN2LW172786',
                'year' => 2020,
                'price' => 26750,
                'description' => '2020 Jeep Wrangler Unlimited Sahara Clean CARFAX.Whether you are looking to get into a brand new or pre-owned vehicle, we can customize everything to fit into your budget and make it affordable for you. We specialize in financing. If you have perfect credit or are looking to establish or rebuild your credit, we will help you find the best financing rates possible. We have even have first time buyer programs! Even if this is you first vehicle, you can trust our team at Foster’s to help you find the perfect vehicle to fit your needs. We look forward to working with you!Please call (888) 476-6169 if you have any questions!',
                'available' => 1,
            ],
            [
                'body_id' => 2,
                'make_id' => 2,
                'model' => '1500',
                'model_number' => 'JLJP74',
                'vin' => '1C6SRFBT7MN793354',
                'year' => 2020,
                'price' => 31500,
                'description' => '2021 Ram 1500 Big Horn/Lone Star CARFAX One-Owner. Priced below KBB Fair Purchase Price!Whether you are looking to get into a brand new or pre-owned vehicle, we can customize everything to fit into your budget and make it affordable for you. We specialize in financing. If you have perfect credit or are looking to establish or rebuild your credit, we will help you find the best financing rates possible. We have even have first time buyer programs! Even if this is you first vehicle, you can trust our team at Foster’s to help you find the perfect vehicle to fit your needs. We look forward to working with you!Please call (888) 476-6169 if you have any questions!',
                'available' => 1,
            ],
            [
                'body_id' => 3,
                'make_id' => 3,
                'model' => 'Focus',
                'model_number' => 'P3F',
                'vin' => '1FADP3F21DL130841',
                'year' => 2013,
                'price' => 5955,
                'description' => '2013 Ford Focus SEWhether you are looking to get into a brand new or pre-owned vehicle, we can customize everything to fit into your budget and make it affordable for you. We specialize in financing. If you have perfect credit or are looking to establish or rebuild your credit, we will help you find the best financing rates possible. We have even have first time buyer programs! Even if this is you first vehicle, you can trust our team at Foster’s to help you find the perfect vehicle to fit your needs. We look forward to working with you!Awards:  * Car and Driver 10 Best Cars   * 2013 IIHS Top Safety Pick   * 2013 KBB.com 10 Coolest New Cars Under $18,000   * 2013 KBB.com Brand Image AwardsCar and Driver, January 2017.Reviews:  * Nimble handling; refined and quiet ride; stylish and well-made interior; lively engine; abundant list of upscale and high-tech options. Source: EdmundsPlease call (888) 476-6169 if you have any questions!',
                'available' => 1,
            ],
            [
                'body_id' => 4,
                'make_id' => 4,
                'model' => 'Camaro',
                'model_number' => '1AG37',
                'vin' => '1G1FB1RX8P0143050',
                'year' => 2023,
                'price' => 29750,
                'description' => '2023 Chevrolet Camaro 1LT CARFAX One-Owner. Priced below KBB Fair Purchase Price! 22/30 City/Highway MPGWhether you are looking to get into a brand new or pre-owned vehicle, we can customize everything to fit into your budget and make it affordable for you. We specialize in financing. If you have perfect credit or are looking to establish or rebuild your credit, we will help you find the best financing rates possible. We have even have first time buyer programs! Even if this is you first vehicle, you can trust our team at Foster’s to help you find the perfect vehicle to fit your needs. We look forward to working with you!Please call (888) 476-6169 if you have any questions!',
                 'available' => 1,
            ],
            [
                'body_id' => 5,
                'make_id' => 4,
                'model' => 'Bolt EV',
                'model_number' => '1FB48',
                'vin' => '1G1FW6S06P4205469',
                'year' => 2023,
                'price' => 0,
                'description' => '2023 Mosaic Black Metallic Chevrolet Bolt EV 1LT 1-Speed Automatic Electric Drive Unit 131/109 City/Highway MPGWe can find any vehicle with any option...such as Navigation, Leather, Heated & Cooled Seats, Sunroof, Moonroof, 4WD, AWD, Back Up Camera, Bluetooth, Premium Audio, Premium Wheels, Tow Package, Trailer Hitch, Lift Kits, Power Windows & Locks, DVD and more! Call (419)625-1313 anytime to start your personalized experience.Pricing subject to change without notice.',
                'available' => 1,
            ],
        ];

        foreach ($carsData as $carData) {
            Car::create($carData);
        }
    }
}
