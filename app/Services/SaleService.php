<?php

namespace App\Services;

use App\Enums\SaleStatus;
use App\Exceptions\CarSoldException;
use App\Exceptions\NotFoundSaleException;
use App\Exceptions\StatusIsNotCreatedExceiption;
use App\Models\Car;
use App\Models\Sale;
use Symfony\Component\HttpFoundation\Response;

class SaleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }
    public function getSales() {
        $sales = Sale::with('car')->get();
        return $sales;
    }

    public function getCars() {
        return Car::orderBy('brand', 'desc')->get();
    }

    public function createSale($values) {

        $this->existSale($values['car_id']);

        $sale = new Sale();
        //Lo relleno con los valores e la peticion
        $sale->fill($values);
        $sale->status = SaleStatus::CREATED;
        //Insertamos el registro
        $sale->save();
        
        return $sale;
    }

    public function existSale($car_id) {

        $exists = Sale::where('car_id', $car_id)->exists();
        if ($exists) {
            throw new CarSoldException("Ya existe una venta de ese coche {$car_id}", Response::HTTP_PRECONDITION_FAILED);
        }
    }

    public function findSale($sale_id) {

        $sale = Sale::find($sale_id);

        if (!$sale) {
            throw new NotFoundSaleException("No existe la venta indicada", Response::HTTP_NOT_FOUND);
        }
        return $sale;
    }

    public function updateStatus($values) {

        $sale = $this->findSale($values->sale_id); 

        if ($sale->status !== SaleStatus::CREATED) {
            throw new StatusIsNotCreatedExceiption("El estado es diferente a CREATED", Response::HTTP_PRECONDITION_FAILED);
        }

        $sale->status = $values['status'];
        $sale->save();

        return $sale;
    }

}
