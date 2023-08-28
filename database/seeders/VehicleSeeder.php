<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 19:53
 */
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Core\Transaction\Entity\Model\Vehicle;
use Core\Transaction\Entity\Model\Motorcycle;
use Core\Transaction\Entity\Model\Car;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use Faker\Factory as Faker;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            if ($faker->boolean(50)) { // 70% chance of creating a Car
                $type = 'Car';
            } else {
                $type = 'Motorcycle';
            }
            
            $attributes = [
                'type' => $type,
                'year' => $faker->year,
                'color' => $faker->colorName,
                'price' => $faker->numberBetween(5000, 50000),
                'stock' => $faker->numberBetween(500, 5000),
                'brand' => $faker->company,
                'created_at' => new UTCDateTime(now()),
                'updated_at' => new UTCDateTime(now())
            ];
    
            if ($type === 'Car') {
                $attributes['details'] = [
                    'machine' => $faker->randomElement(['V6', 'V8']),
                    'type' => $faker->randomElement(['Sedan', 'SUV']),
                    'capacity_people' => $faker->numberBetween(4, 7),
                ];
            } else {
                $attributes['details'] = [
                    'machine' => $faker->randomElement(['Inline-4', 'V-Twin']),
                    'suspension_type' => $faker->randomElement(['Front Fork', 'Rear Mono']),
                    'transmission_type' => $faker->randomElement(['Manual', 'Automatic']),
                ];
            }
            Vehicle::create($attributes);
        }
    }
}
