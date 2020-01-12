<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ResponseSupport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class ShowController
 * @package App\Http\Controllers\Api\Categories
 */
class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Category $category
     * @return JsonResponse|Response
     */
    public function __invoke(Category $category)
    {
        return ResponseSupport::success(__('Record show'), 200, new CategoryResource($category));
    }
}
