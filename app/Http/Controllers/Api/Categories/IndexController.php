<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ResponseSupport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Api\Categories
 */
class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        return ResponseSupport::success(__('Return data'), 200, CategoryResource::collection(Category::all()));
    }
}
