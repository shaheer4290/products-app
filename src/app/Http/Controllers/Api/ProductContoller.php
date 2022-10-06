<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use App\Http\Resources\ProductCollection;

class ProductContoller extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request) {
        $params = $request->all();
        $products = $this->productRepository->search($params);

        return new ProductCollection($products);
    }
}
