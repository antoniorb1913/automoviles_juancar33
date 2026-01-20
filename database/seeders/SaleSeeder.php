<?php

namespace Database\Seeders;

use App\Enums\SaleStatus;
use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::create([
            'status' => SaleStatus::CREATED, 
            'amount' => 40.30, 
            'sale_date' => '2025-01-09', 
            'seller_id' => 1,
            'client_id' => 2,
            'car_id' => 1
        ]);
        Sale::create([
            'status' => SaleStatus::PAID, 
            'amount' => 32.20, 
            'sale_date' => '2025-01-10', 
            'seller_id' => 2,
            'client_id' => 5,
            'car_id' => 2
        ]);
        Sale::create([
            'status' => SaleStatus::CANCELLED, 
            'amount' => 20.10, 
            'sale_date' => '2025-01-12', 
            'seller_id' => 3,
            'client_id' => 6,
            'car_id' => 3
        ]);
    }
}
