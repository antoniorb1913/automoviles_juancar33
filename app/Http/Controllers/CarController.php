<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Services\SaleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }
    public function index()
    {
        $cars = $this->saleService->getCars();
        return ApiResponse::success($cars, "Success", Response::HTTP_OK);
    }
}
