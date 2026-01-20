<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Services\SaleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CreateSaleRequest;
use App\Http\Requests\UpdateStatusRequest;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index() {
        $sales = $this->saleService->getSales();
        return ApiResponse::success($sales, "Success", Response::HTTP_OK);
    }

    public function createSale(CreateSaleRequest $request) {
        $values = $request->all();
        $sale = $this->saleService->createSale($values);
        return ApiResponse::success($sale, "sale created", Response::HTTP_CREATED);
    }
    public function updateStatus(UpdateStatusRequest $request) {
        
        $update = $this->saleService->updateStatus($request);
        return ApiResponse::success($update, "Success", Response::HTTP_OK);

        
    }
}
