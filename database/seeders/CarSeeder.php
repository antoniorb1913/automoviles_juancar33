<?php

namespace Database\Seeders;

use App\Enums\SaleStatus;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
        'license' => '1234TRE', 
        'model' => 'Ibiza',
        'brand' => 'Seat',
        'used' => true
        ]);
        Car::create([
            'license' => '1223VFG', 
            'model' => 'Juke',
            'brand' => 'Nissan',
            'used' => false
        ]);
        Car::create([
            'license' => '1234TTR', 
            'model' => 'Corola',
            'brand' => 'Toyota',
            'used' => true
        ]);
        Car::create([
            'license' => '5476GGB', 
            'model' => '500',
            'brand' => 'Fiat',
            'used' => false
        ]);
    }
}
