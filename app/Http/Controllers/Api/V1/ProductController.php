<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller as BaseController;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * Display a paginated list of products.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->input('per_page', 15); // Default to 15 items per page
        $products = Product::paginate($perPage);
        
        return response()->json([
            'status' => 'success',
            'data' => $products->items(),
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem()
            ]
        ]);
    }
}
