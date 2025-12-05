<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorldCity;

class WorldCitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['location_id' => 1, 'city' => 'New York', 'country' => 'United States', 'region' => 'New York', 'latitude' => 40.7128, 'longitude' => -74.0060],
            ['location_id' => 2, 'city' => 'London', 'country' => 'United Kingdom', 'region' => 'England', 'latitude' => 51.5074, 'longitude' => -0.1278],
            ['location_id' => 3, 'city' => 'Paris', 'country' => 'France', 'region' => 'Île-de-France', 'latitude' => 48.8566, 'longitude' => 2.3522],
            ['location_id' => 4, 'city' => 'Tokyo', 'country' => 'Japan', 'region' => 'Kanto', 'latitude' => 35.6762, 'longitude' => 139.6503],
            ['location_id' => 5, 'city' => 'Sydney', 'country' => 'Australia', 'region' => 'New South Wales', 'latitude' => -33.8688, 'longitude' => 151.2093],
            ['location_id' => 6, 'city' => 'Dubai', 'country' => 'United Arab Emirates', 'region' => 'Dubai', 'latitude' => 25.2048, 'longitude' => 55.2708],
            ['location_id' => 7, 'city' => 'Singapore', 'country' => 'Singapore', 'region' => 'Central Region', 'latitude' => 1.3521, 'longitude' => 103.8198],
            ['location_id' => 8, 'city' => 'Mumbai', 'country' => 'India', 'region' => 'Maharashtra', 'latitude' => 19.0760, 'longitude' => 72.8777],
            ['location_id' => 9, 'city' => 'São Paulo', 'country' => 'Brazil', 'region' => 'São Paulo', 'latitude' => -23.5505, 'longitude' => -46.6333],
            ['location_id' => 10, 'city' => 'Cairo', 'country' => 'Egypt', 'region' => 'Cairo', 'latitude' => 30.0444, 'longitude' => 31.2357],
        ];

        foreach ($cities as $city) {
            WorldCity::firstOrCreate(
                ['location_id' => $city['location_id']],
                $city
            );
        }
    }
}









