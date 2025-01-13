<?php

namespace Database\Seeders;

use App\Models\VehicleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleCategory::insert([
            [
                'name' => 'Car',
                'min_price' => 3000,
                'max_price' => 5000,
            ],
            [
                'name' => 'Motorcycle',
                'min_price' => 1000,
                'max_price' => 2000,
            ],
            [
                'name' => 'Truck',
                'min_price' => 5000,
                'max_price' => 10000,
            ],
            [
                'name' => 'Bus',
                'min_price' => 10000,
                'max_price' => 20000,
            ],
            [
                'name' => 'Bicycle',
                'min_price' => 100,
                'max_price' => 500,
            ],
        ]);
    }
}
